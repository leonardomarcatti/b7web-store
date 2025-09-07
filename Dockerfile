FROM leonardomarcatti/lamp

RUN apt-get update && apt-get install -y \
   php-cli php-mbstring php-xml php-bcmath php-curl unzip curl git composer \
   && apt-get clean \
   && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . .

# Instala dependências PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Ajusta permissões das pastas necessárias (ajuste o caminho se for diferente)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copia scripts auxiliares
COPY wait-for-it.sh /wait-for-it.sh
COPY start.sh /start.sh

RUN chmod +x /wait-for-it.sh /start.sh

# Expõe portas Laravel (3000) e MariaDB (3305)
EXPOSE 3000 3305

# Comando inicial
CMD ["/start.sh"]