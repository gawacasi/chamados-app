# Kanban Laravel

Um Kanban simples desenvolvido em Laravel, utilizando Docker e MySQL.  
Inclui seeds para popular o banco automaticamente com chamados de exemplo.

## Tecnologias

- Laravel 10
- Docker
- MySQL
- Composer

## Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- Docker
- Docker Compose

## Como rodar o projeto

### Build dos containers:

```
docker compose up -d --build
```
Acesse o container do Laravel:

```
docker exec -it laravel-app bash
```
Instale as dependências:
```
composer install
```
Configure o arquivo .env:

```
cp .env.example .env
```
```
php artisan key:generate
```
Ajuste as variáveis de conexão com MySQL:

A .env.example já está pronta para ser copiada


```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306 -> no docker-compose.yml está configurado com a 3307
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```
Altere também:

SESSION_DRIVER=file
Rode as migrations com seed:
```
php artisan migrate
php artisan db:seed --class=UsersTableSeeder
```

Isso criará as tabelas e já populará o banco com chamados de exemplo.

Acesse o projeto em: http://localhost:8000

Estrutura Kanban
O sistema possui três colunas principais:

Pendentes

Em Desenvolvimento

Finalizados

Cada chamado pode ser criado, editado, movido entre colunas e deletado.

Usuários de teste
Para logar use um dos usuários de teste:
```
'username'   => 'teste1@teste.com', 
'password'   =>  bcrypt('123123'),

'username'   => 'teste2@teste.com',
'password'   =>  bcrypt('123123'),
```
