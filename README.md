# 2QTest - Company Management System

A simple Laravel-based application for managing company information, including CRUD functionality and user authentication.

## Features

-   **Company Management**: Create, Read, Update, and Delete company records.
-   **User Authentication**: Secure login and registration system.
-   **Logo Uploads**: Ability to upload and display company logos.
-   **SweetAlert2 Notifications**: User-friendly notifications for CRUD actions.
-   **Custom Validation**: Server-side validation for image dimensions.

## Technology Stack

-   **Backend**: PHP 8.2 / Laravel 12
-   **Frontend**: Bootstrap 5, Blade
-   **JavaScript**: SweetAlert2
-   **Database**: MySQL (or your preferred database)
-   **Development Environment**: Laragon (recommended) or any other environment that supports the stack.

## Local Development Setup

Follow these instructions to set up the project on your local machine for development and testing purposes.

### 1. Prerequisites

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   A local database server (e.g., MySQL, MariaDB)

### 2. Clone the Repository

First, clone the project from GitHub to your local machine.

```bash
git clone https://github.com/your-username/2QTest.git
cd 2QTest
```

### 3. Install Dependencies

Install the PHP and JavaScript dependencies using Composer and NPM.

```bash
composer install
npm install
npm run build # Compiles front-end assets for authentication pages
```

### 4. Environment Configuration

Create a copy of the `.env.example` file and name it `.env`. This file will hold your application's environment-specific settings.

For Windows:
```bash
copy .env.example .env
```

For macOS / Linux:
```bash
cp .env.example .env
```

Next, open the `.env` file and configure your database connection.

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=2qtest
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Generate Application Key

Every Laravel application requires an application key, which is used for encryption. Generate one with the following command:

```bash
php artisan key:generate
```

### 6. Run Database Migrations

Set up the database schema by running the migrations. This will create all the necessary tables.

```bash
php artisan migrate
```

### 7. Seed the Database

Run the database seeder to populate the database with an initial user and other sample data.

```bash
php artisan db:seed --class=AdminUserSeeder
```

### 8. Create a Symbolic Link

To ensure that uploaded logos are publicly accessible, create a symbolic link from `public/storage` to `storage/app/public`.

```bash
php artisan storage:link
```

### 9. Run the Application

You are now ready to run the application. Use the following Artisan command to start the local development server:

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`.

## Usage

-   **Login**: Navigate to `http://127.0.0.1:8000/login` to access the login page.
-   **Default Credentials**: After running the seeder, you can log in with the following credentials:
    -   **Email**: `admin@admin.com`
    -   **Password**: `password`
-   **Companies Dashboard**: After logging in, you will be redirected to the companies dashboard where you can manage company records.