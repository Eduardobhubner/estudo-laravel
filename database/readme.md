## Banco de dados 

O laravel já tem um controle de banco de dados, podemso configurar ela dentro do arquivo chamado /env, é nela que fica senha de banco,nome, etc... e rodando o comando "php artisan migrate, ele vai gerar algumas tabelas pré definidas na tabela Migrations para te auxiliar com novos usuários por exemplo.

Dentro do conceito de banco de dados do laravel, a gente tem o nosso querido Migration, ele funciona como um versionador de códigos, com ele podemos avançar ou retroceder no bd da forma que quisermos, caso a gente cria uma tabela errada, podemos fazer a famoso 'hollback', inibindo qualquer erro que se foi criado, ele também nos permite fazer todas essas funções com colunas e linhas. Para visualizar a migration, temos a função migrate:status

Para fazer a padronização das migrations, quando se criar uma nova, rodar o comando 'php artisan make:migration nome_do_arquivo_table

