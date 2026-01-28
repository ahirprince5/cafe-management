# Café Aroma - Cafe Management System

A complete cafe management system built with Laravel PHP framework. This project allows customers to view menu, make table reservations, and leave ratings. Administrators can manage menu items, categories, tables, and reservations.

## Features

### Customer Features
- View home page with featured items
- Browse menu with category filters
- View menu item details
- Make table reservations
- Leave ratings and reviews
- User registration and login

### Admin Features
- Dashboard with statistics
- Add/Edit/Delete menu items
- Manage categories
- Manage cafe tables
- View and manage reservations
- View and moderate ratings

## Requirements

- PHP 8.1 or higher
- MySQL 5.7 or higher
- Composer
- Laragon (recommended) or XAMPP/WAMP

## Installation Steps

### Step 1: Clone or Copy Project
Copy the project folder to your web server directory:
- For Laragon: `C:\laragon\www\cafe-management`
- For XAMPP: `C:\xampp\htdocs\cafe-management`

### Step 2: Install Dependencies
Open terminal in project folder and run:
```bash
composer install
```

### Step 3: Setup Environment
Copy `.env.example` to `.env`:
```bash
copy .env.example .env
```

Edit `.env` file and set database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cafe_management
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Generate App Key
```bash
php artisan key:generate
```

### Step 5: Create Database
Create a database named `cafe_management` in MySQL (using phpMyAdmin or HeidiSQL).

### Step 6: Run Migrations
```bash
php artisan migrate --seed
```

This will create all tables and add sample data.

### Step 7: Start Server
For Laragon: Start Laragon and visit http://cafe-management.test
For artisan: Run `php artisan serve` and visit http://localhost:8000

## Login Credentials

| User Type | Email | Password |
|-----------|-------|----------|
| Admin | admin@cafearoma.com | password123 |
| Customer | user@cafearoma.com | password123 |


## Database Tables

| Table | Description |
|-------|-------------|
| users | User accounts with admin flag |
| categories | Menu categories (Beverages, Snacks, etc) |
| menu_items | Menu items with price and image |
| cafe_tables | Tables available for reservation |
| reservations | Customer table bookings |
| ratings | Customer reviews and ratings |

## Routes

### Public Routes
- `/` - Home page
- `/menu` - Menu listing
- `/menu/{id}` - Menu item details
- `/reservations` - Make reservation
- `/ratings` - View/Add ratings
- `/login` - Login page
- `/register` - Registration page

### Admin Routes (requires login as admin)
- `/admin` - Dashboard
- `/admin/menu-items` - Manage menu items
- `/admin/categories` - Manage categories
- `/admin/tables` - Manage tables
- `/admin/reservations` - View reservations
- `/admin/ratings` - View ratings

## How It Works

### User Authentication
The `AuthController` handles login and registration. Passwords are hashed using Laravel's `Hash::make()`. The `is_admin` field in users table determines admin access.

### Admin Access
The `AdminMiddleware` checks if user is logged in and has `is_admin = true`. If not, redirects to home page.

### Menu Display
`MenuController` fetches menu items from database. Items can be filtered by category. Featured items are shown on homepage.

### Reservations
Customers fill a form with name, phone, date, time, and number of guests. The reservation is saved with status "pending". Admin can change status to "confirmed" or "completed".

### Ratings
Customers can submit ratings (1-5 stars) with optional review text. Average rating is calculated and displayed.

## Technologies Used

- **Backend**: Laravel 10, PHP 8.3
- **Database**: MySQL
- **Frontend**: Bootstrap 5, Font Awesome
- **Server**: Laragon

### Permission Denied
Check file permissions on storage and bootstrap/cache folders.

## Contact

For any questions about this project, please refer to the code comments or Laravel documentation at https://laravel.com/docs
