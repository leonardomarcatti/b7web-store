<h1>🛒 Projeto E-commerce - Laravel 12 + MySQL + Docker</h1>

<h2>🎯 Sobre o projeto</h2>
<p>Este é um projeto pessoal feito com Laravel rodando dentro de um container Docker com imagem LAMP personalizada.</p> 
<p>Este repositório contém um projeto de e-commerce desenvolvido com <strong>Laravel 12</strong>, utilizando <strong>MySQL</strong> como banco de dados e rodando dentro de um único container <strong>Docker</strong>.</p>

<h2>🚀 Tecnologias utilizadas</h2>
<ul>
  <li>PHP 8.x</li>
  <li>Laravel 12</li>
  <li>MySQL (porta <code>3305</code>)</li>
  <li>Docker</li>
</ul>

<p>O container inclui:</p>
<ul>
   <li>🐳 Apache + PHP</li>
   <li><strong>Usuário:</strong> <code>admin</code></li>
   <li><strong>Senha:</strong> <code>9x*UwARA5@</code></li>
   <li><strong>Porta:</strong> <code>3305</code></li>
   <li>⚙️ Script para aguardar o banco iniciar antes do Laravel subir</li>
   <li>🧑‍💻 Fácil manipulação do código via VSCode usando Dev Containers</li>
   <li>🔄 Migrations e Seeds rodando automaticamente no start</li>
</ul>

<h2>▶️ Como usar</h2>
<ol>
   <li>Clonar o projeto e entrar dentro da pasta</li>
   <li>Realizar o build com : docker image build -t sua_tag .</li>
   <li>Rodar o container: docker run -d --name nome_container -h nome_container -p 3000:3000 -p 3305:3306 -v pasta_do_projeto:/var/www/html sua_tag</li>
   <li>Acessar a aplicação: http://ip:3000</li>
</ol>

<h2>🛠️ Variáveis de ambiente Laravel (.env)</h2>
<p>
Certifique-se de configurar corretamente o arquivo <code>.env</code>:
</p>
<pre>
   <code>
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3305
   DB_DATABASE=laravel
   DB_USERNAME=admin
   DB_PASSWORD=9x*UwARA5@
   </code>
</pre>

<h2>📜 Estrutura importante</h2>
<p>start.sh — script que configura e inicia MariaDB + Laravel</p>
<p>wait-for-it.sh — script que aguarda o banco iniciar</p>
<p>.dockerignore — ignora arquivos como node_modules, vendor, .env para builds limpos</p>

<h2>❤️ Contribuição</h2>
<p>Contribuições são bem-vindas! Faça um fork, crie uma branch e envie seu pull request.</p>

<h2>📄 Licença</h2>
<p>MIT License — veja o arquivo LICENSE para detalhes.</p>