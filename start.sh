#!/bin/bash
set -e

DB_USER="admin"
DB_PASS="9x*UwARA5@"
DB_NAME="b7web_store"

CONFIG_FILE="/etc/mysql/mariadb.conf.d/50-server.cnf"

# Ajustar bind-address
if grep -q "^bind-address" "$CONFIG_FILE"; then
    sed -i 's/^bind-address.*/bind-address = 0.0.0.0/' "$CONFIG_FILE"
else
    echo "bind-address = 0.0.0.0" >> "$CONFIG_FILE"
fi

echo "🚀 Iniciando MariaDB..."
service mariadb start

until mysqladmin ping -uroot -p'Aa101985$' --silent; do
  echo "Esperando MariaDB iniciar..."
  sleep 5
done

echo "✔ MariaDB iniciado!"

mysql -uroot -p'Aa101985$' -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;"
mysql -uroot -p'Aa101985$' -e "CREATE USER IF NOT EXISTS '$DB_USER'@'%' IDENTIFIED BY '$DB_PASS';"
mysql -uroot -p'Aa101985$' -e "GRANT ALL PRIVILEGES ON *.* TO '$DB_USER'@'%';"
mysql -uroot -p'Aa101985$' -e "FLUSH PRIVILEGES;"

php artisan migrate --force

php artisan db:seed

echo "🚀 Iniciando Laravel na porta 3000..."
exec php artisan serve --host=0.0.0.0 --port=3000