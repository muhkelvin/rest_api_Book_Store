# Book Store REST API

## About The Project

Book Store REST API is a Laravel-based application that provides API endpoints for book store management. This project includes Swagger documentation to make API exploration and testing easier.

## Live Documentation

The API documentation is available at: [https://rest-book-store-api.netlify.app/])

## Installation

Follow these steps to set up the project locally:

1. Clone the repository
```bash
git clone [repository-url]
```

2. Install PHP dependencies
```bash
composer install
```

3. Create environment file
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Configure your database in the `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run database migrations
```bash
php artisan migrate
```

7. Start the development server
```bash
php artisan serve
```

The application will be available at `http://localhost:8000`.

## API Documentation

This project uses Swagger for API documentation. To access the API documentation:

1. Run the development server
```bash
php artisan serve
```

2. Visit `http://localhost:8000/api/documentation` in your browser

Alternatively, you can view the deployed documentation at [https://rest-book-store-api.netlify.app/])

## Features

- RESTful API endpoints for book store management
- Swagger documentation for API exploration
- Laravel-based architecture for robust application development

## Technologies Used

- [Laravel](https://laravel.com/) - PHP framework
- [Swagger](https://swagger.io/) - API documentation
- [Netlify](https://www.netlify.com/) - Documentation deployment

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing)
- [Powerful dependency injection container](https://laravel.com/docs/container)
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent)
- Database agnostic [schema migrations](https://laravel.com/docs/migrations)
- [Robust background job processing](https://laravel.com/docs/queues)
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).