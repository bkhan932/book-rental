# Book Rental Application

This is a Laravel-based Book Rental application.

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL or any other supported database

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/bkhan932/book-rental.git
    ```

2. Navigate to the project directory:

    ```bash
    cd book-rental
    ```

3. Install PHP dependencies:

    ```bash
    composer install
    ```

4. Copy the `.env.example` file to `.env`:

    ```bash
    cp .env.example .env
    ```

5. Configure the database in the `.env` file.

6. Generate the application key:

    ```bash
    php artisan key:generate
    ```

7. Run the database migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

## Usage

1. Start the development server:

    ```bash
    php artisan serve
    ```

2. Access the application in your web browser at `http://localhost:8000`.

3. Login with test user:

   Email: test@gmail.com
   Password: 123456
