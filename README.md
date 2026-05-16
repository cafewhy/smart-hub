# Smart-Hub Management System

Backend REST API untuk pengelolaan peminjaman ruang kerja dan peralatan studio menggunakan Laravel 13 dan MySQL.

## Teknologi
- Laravel 13
- MySQL
- Laravel Sanctum
- REST API

## Fitur
- Login API
- Authentication Bearer Token
- CRUD Equipment
- JSON Response

## Endpoint API

### Login
POST `/api/login`

### Equipment
GET `/api/equipments`

POST `/api/equipments`

PUT `/api/equipments/{id}`

DELETE `/api/equipments/{id}`

## Instalasi

```bash
composer install
php artisan migrate
php artisan serve
