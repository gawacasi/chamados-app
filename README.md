Kanban Laravel

Um Kanban simples desenvolvido em Laravel, utilizando Docker e MySQL.
Inclui seeds para popular o banco automaticamente com chamados de exemplo.

Tecnologias

Laravel 10
Docker
MySQL
Composer
Node.js / NPM

Pré-requisitos

Antes de começar, certifique-se de ter instalado:

Docker
Docker Compose

Como rodar o projeto

Build dos containers:

docker compose up -d --build

Acesse o container do Laravel:

docker exec -it laravel-app bash

Instale as dependências:

composer install
npm install && npm run build

Configure o arquivo .env:

cp .env.example .env
php artisan key:generate

Ajuste as variáveis de conexão com MySQL:

# A .env.example ja esta pronta para ser copiada

#Copia do meu projeto
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306 -> no docker-compose.yml esta configurado com a 3307
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

#Alterar SESSION_DRIVER para file

Rode as migrations com seed:

php artisan make:seeder ChamadosTableSeeder

Isso criará as tabelas e já populará o banco com chamados de exemplo.

Acesse o projeto em:

http://localhost:8000

Estrutura Kanban

O sistema possui três colunas principais:

Pendentes

Em Desenvolvimento

Finalizados

Cada chamado pode ser criado, editado, movido entre colunas e deletado.
