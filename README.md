
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Laravel Database Setup

## Steps to Run Migrations and Seed Data

Follow these steps to set up your Laravel application's database.

### 1. Run Migrations

Migrations are used to create the database tables for your application. To run the migrations, use the following command in your terminal:

```bash
php artisan migrate
```

### 2. Seed the Database

After running the migrations, you can seed the database with default values using:

```bash
php artisan db:seed
```

Alternatively, you can run both the migration and seeding in one command:

```bash
php artisan migrate --seed
```

## Constants

These constants are used to control visibility and other options:

- `isCopyright` (must have id `copyright` in the footer tag)

## About Admin Panel

This is a customized admin panel that can be used in every dynamic project. It includes features to:

- Manage Profile
- Manage Super Admin (sudo admin)
- Manage Users
- Manage Roles
- Manage Rights
- Manage Menus