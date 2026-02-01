# Lego-Inventor-Manager
Lego-Inventor-Manager by Edis Ahmetaj, Léonard Weber, Mateo Grgic and André De Carvalho Varela Batista

## Description

Lego-Inventor-Manager is a web application that allows users to manage the parts of the Lego Mindstorms 51515 kit, browse the available builds, and administer boxes and parts through an admin interface.

## Getting Started

### Prerequisites

- PHP version 8.4.13
- Laravel version 12.x
- PHP extensions : pdo_mariadb
- Package manager : Composer
- OS supported : Windows, Debian & Ubuntu

### Configuration

To configure the application, you'll need to set up your environment variables.

1.  Copy the example environment file:
    ```shell
    cp .env.example .env
    ```
2.  Open the `.env` file and edit the database variables to match your local setup. You can choose between SQLite, MySQL, or MariaDB by uncommenting the appropriate section.

## Deployment

### On dev environment

After cloning the repository and configuring your .env file, run the following commands from the root of the project to get everything set up.

1.  **Install PHP dependencies** using Composer:
    ```shell
    composer install
    ```
2.  **Update the autoloader** (optional, but good practice during development):
    ```shell
    composer dump-autoload
    ```
3.  **Run database migrations** to create the necessary tables:
    ```shell
    php artisan migrate
    ```
4.  **(Optional) Seed the database** with initial mock data:
    ```shell
    php artisan db:seed
    ```

### On integration environment

To deploy the project on a server like **SwissCenter**, follow these steps:

## 1. Folder Structure

/laravel      # Where the laravel code belongs
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── routes/
    └── ...

/public       # Public files
    ├── css/
    ├── js/
    ├── images/
    └── index.php

## 2. Installation

- Place the `laravel/` folder at the root of the server `/`.
- Place the `public/` folder at the root of the server `/` or where the web server points.
- Make sure `public/index.php` correctly references the Laravel application:

php
require __DIR__ . '/../laravel/vendor/autoload.php';
$app = require_once __DIR__ . '/../laravel/bootstrap/app.php';

## 3. Permissions

Ensure the storage/ and bootstrap/cache/ folders inside /laravel are writable by the web server:

chmod -R 775 laravel/storage
chmod -R 775 laravel/bootstrap/cache

4. Configuration

Copy .env.example to .env in /laravel and configure your database and other settings.

Generate the application key:

5. Web Access

The web server should point to the /public folder.

CSS, JS, and image files are accessible via /public.


## Directory structure

```shell
project/
├── app/
│   ├── Console/
│   ├── Exceptions/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Middleware/
│   │   └── Kernel.php
│   ├── Models/
│   ├── Providers/
│   └── ...
│
├── bootstrap/
│   ├── app.php
│   └── providers.php
│
├── config/
│   ├── app.php
│   ├── database.php
│   ├── mail.php
│   └── ...
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│   ├── index.php
│   └── assets...
│
├── resources/
│   ├── views/
│   ├── js/
│   └── css/
│
└── routes/
    ├── web.php
    └── console.php

```
