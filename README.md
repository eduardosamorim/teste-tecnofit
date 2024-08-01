<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Documentação para executar o projeto

1. Pré-requisitos
Certifique-se de ter as seguintes ferramentas instaladas:

- PHP (versão 8.1 ou superior)
- Composer
- Laravel (versão 10.1 ou superior)
- MySQL/PgSQL ou outro banco de dados compatível com laravel

2. Configuração do Ambiente
   Clone o Repositório

   - Primeiro, clone o repositório para o seu ambiente local:
      - "git clone https://github.com/eduardosamorim/teste-tecnofit.git"

   - Instale as Dependências
      - "cd teste-tecnofit" para entrar na pasta do arquivo.
      - "composer install".

   - Configure o Arquivo .env
      -Copie o arquivo .env.example para .env:
      -"copy .env.example .env"
   
   - Abra o arquivo .env e configure as seguintes variáveis de ambiente de acordo com seu banco de dados:

         - DB_CONNECTION=mysql
         - DB_HOST=127.0.0.1
         - DB_PORT=3306
         - DB_DATABASE=nome_do_banco_de_dados
         - DB_USERNAME=seu_usuario
         - DB_PASSWORD=sua_senha

   - Gere a chave de aplicação do Laravel:

      - "php artisan key:generate"
   
   - Execute as Migrations (caso não tenha criado as tabelas manualmente);

      - Crie as tabelas no banco de dados usando as migrations:
         - "php artisan migrate"

   - Popule o Banco de Dados (caso não tenha inserido os dados manualmente);

      - "php artisan db:seed"
   
3. Executando o Servidor:
   - "php artisan serve"
   - O servidor estará disponível em http://localhost:8000.

4. Testando o Endpoint REST:
   - Para acessar o endpoint que retorna o ranking de um movimento específico, faça uma requisição GET para:

      - "http://localhost:8000/api/ranking/{movement_id}"
      - Substitua {movement_id} pelo ID do movimento desejado (por exemplo, 1 para "Deadlift").
      - Exemplo de execução: "http://localhost:8000/api/ranking/1"