# Smart Hub Management System

## Deskripsi
Smart Hub Management System merupakan pengembangan lanjutan dari project UTS yang sebelumnya telah dibuat. Pada tahap UAS, sistem dikembangkan dengan menambahkan frontend services berbasis Laravel 13 dan Inertia JS yang terintegrasi dengan backend API.

Aplikasi ini digunakan untuk mengelola proses peminjaman peralatan dengan fitur autentikasi, pengelolaan data equipment, transaksi booking, dan proses check-in peralatan.

## Teknologi

- Laravel 13
- Inertia JS
- Vue.js
- Laravel Sanctum API
- Supabase PostgreSQL
- Git & GitHub

## Fitur Utama

- Login Authentication
- Manage Equipment (List, Create, Update, Delete)
- Manage Booking (Create, Update, Delete)
- Check-in Equipment
- Integrasi Frontend dengan Laravel API

## Database

Database menggunakan Supabase PostgreSQL.

Tabel utama:
- users
- equipments
- bookings
- checkins

## Menjalankan Project

Install dependency:

```bash
composer install
npm install