<h1>Projeto Laravel</h1>

<h2>Rodando o projeto</h2>
<ol>
  <li>Instalar o docker no ambiente</li>
  <li>Clonar o projeto no local de preferência</li>
  <li>Rodar o comando <code>docker compose up --build</code> na pasta raiz do projeto</li>
  <li>Acessar o frontend do projeto através da URL <code>http://localhost:3000</code></li>
  <li>Registrar um usuário através da tela de registro que pode ser acessada no menu do canto superior direito</li>
  <li>Efetuar o login com esse usuário</li>
  <li>Importar o arquivo CSV entrando no terminal do container através do comando <code>docker exec -it backend bash</code></li>
  <li>No terminal do container, executar <code>php artisan import music-1.csv</code></li>
  <li>Para utilizar o endpoint de vínculo de música e usuário, usar uma ferramenta como o Postman e fazer um POST para a rota <code>http://localhost:8000/api/music/{idMusica}/user{idUsuario}</code></li>
  <li>Verificar se o registro é exibido na lista de músicas no frontend</li>
</ol>
<hr>
<p>Caso o projeto aponte o seguinte erro ao iniciar o backend e o banco de dados (<code>SQLSTATE[HY000] [2002] Connection refused (Connection: mariadb, SQL: select exists (select 1 from information_schema.tables where table_schema = 'projeto_musicas' and table_name = 'migrations' and table_type in ('BASE TABLE', 'SYSTEM VERSIONED')) as `exists`)</code>) ou (<code>ERROR 1396 (HY000) at line 11: Operation CREATE USER failed for 'root'@'%'</code>), desligue os containers e execute o comando <code>docker compose up</code></p>
<br>
<p>Se isso não resolver, o projeto pode ser rodado localmente em um ambiente com PHP 8.3, Composer, NPM/NodeJs e MariaDB, basta:</p>
<ol>
  <li>Acessar a pasta backend e executar <code>composer install && php artisan serve</code></li>
  <li>Em outro terminal, acessar a pasta frontend e executar <code>npm install && npm run dev</code></li>
  <li>Configurar a conexão com o banco de dados nos arquivos <code>backend/config/database.php</code> e <code>backend/.env</code></li>
</ol>
<hr>
<p>O projeto utiliza o template do Laravel Breeze + NextJS</p>
