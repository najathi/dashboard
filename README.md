<p align="center"><img src="http://slbi.lk/wp-content/uploads/2020/03/SLBI-Logo.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
    </p>

## About SLBI

SLBI is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Forms, Admin Dashboard](https://froms.slbi.lk).

SLBI is accessible, powerful, and provides tools required for large, robust applications.

## Installation

- Install Composer Dependencies <br/>
**composer install**

- Install NPM Dependencies <br/>
**npm install**

- Create a copy of your .env file <br/>
**cp .env.example .env**

- Generate an app encryption key
**php artisan key:generate**

- Create an empty database for our application

- In the .env file, add database information to allow Laravel to connect to the database

- Migrate the database <br/>
**php artisan migrate**

- [Optional]: Seed the database<br/>
**php artisan db:seed**

## If you have any problem with seed the database

- you need to run in your terminal: <br/>
**composer dump-autoload**

- Seed the database<br/>
**php artisan db:seed**
