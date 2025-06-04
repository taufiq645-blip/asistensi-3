# Inventory Management System

Welcome to the Inventory Management System project! This application is designed to help manage inventory efficiently and effectively. Below you will find an overview of the project structure, features, and how to get started.

## Project Structure

- **app/**: Contains the core application logic.
  - **Console/**: Console commands for the application.
  - **Exceptions/**: Custom exception classes for error handling.
  - **Http/**: Controllers and middleware for handling requests.
    - **Controllers/**: Classes that manage incoming requests and responses.
    - **Middleware/**: Classes that filter HTTP requests.
  - **Models/**: Eloquent models representing database tables.
  - **Providers/**: Service providers that bootstrap application services.

- **bootstrap/**: Contains files for initializing the Laravel application.
  - **app.php**: The main application bootstrap file.

- **config/**: Configuration settings for the application.
  - **app.php**: Application configuration settings.

- **database/**: Database-related files.
  - **factories/**: Model factories for generating fake data.
  - **migrations/**: Migration files for database schema changes.
  - **seeders/**: Seeder classes for populating the database.

- **public/**: Publicly accessible files.
  - **index.php**: The entry point for the web application.

- **resources/**: Resources for the application.
  - **lang/**: Language files for localization.
  - **views/**: Blade template files for rendering views.

- **routes/**: Defines the web routes for the application.
  - **web.php**: Web routes configuration.

- **storage/**: Storage for application files.
  - **app/**: Application files.
  - **framework/**: Framework-generated files.
  - **logs/**: Log files for the application.

- **tests/**: Contains test classes.
  - **Feature/**: Feature test classes.
  - **Unit/**: Unit test classes.

- **.env.example**: Example environment configuration file.

- **artisan**: Command-line interface for the Laravel application.

- **composer.json**: Composer dependencies configuration file.

- **package.json**: npm dependencies and scripts configuration file.

- **themes/**: Contains theme files for the application.
  - **StockTrack/**: Theme files for StockTrack.
  - **InvManage/**: Theme files for InvManage.
  - **GudangKu/**: Theme files for GudangKu.
  - **Inventra/**: Theme files for Inventra.
  - **BarangPanel/**: Theme files for BarangPanel.
  - **StoreCRUD/**: Theme files for StoreCRUD.

## Getting Started

1. **Clone the repository**:
   ```
   git clone <repository-url>
   ```

2. **Install dependencies**:
   ```
   composer install
   npm install
   ```

3. **Set up the environment**:
   Copy the `.env.example` to `.env` and configure your database and other settings.

4. **Run migrations**:
   ```
   php artisan migrate
   ```

5. **Start the application**:
   ```
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser to access the application.

## Features

- User-friendly interface for managing inventory.
- Support for multiple themes.
- Robust error handling and logging.
- Easy database migrations and seeders for initial data setup.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any suggestions or improvements.

## License

This project is licensed under the MIT License. See the LICENSE file for more details.