<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cinerama task app with Laravel

## Installation

### clone this repo

```shell
git clone https://github.com/khamdullaevuz/cinerama-task.git
```

### install composer dependencies

```shell
composer install
```

### install npm dependencies

```shell
npm install
```

### create .env file

```shell
cp .env.example .env
```

### generate application key

```shell
php artisan key:generate
```

### create database and add credentials to .env file

### run migrations

```shell
php artisan migrate
```

### run seeders

```shell
php artisan db:seed
```

### create user

```shell
php artisan db:seed --class=UserSeeder
```

### run npm

```shell
npm run dev
```

### run server

```shell
php artisan serve
```

### login

```shell
username: admin
password: password
```

### [Api documentation](https://documenter.getpostman.com/view/19487478/2s93Jxt2j7)
