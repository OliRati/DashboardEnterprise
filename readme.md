# Dashboard Enterprise

A simple PHP-based web application for managing employees in an enterprise. It provides CRUD (Create, Read, Update, Delete) operations for employee records, stored in a MySQL database.

## Features

- View a list of all employees
- Add new employees
- Edit existing employee details
- Delete employees
- Form validation for employee data
- Responsive UI using Pico CSS framework

## Technologies Used

- **Backend**: PHP 7+
- **Database**: MySQL
- **Frontend**: HTML, CSS (Pico CSS)
- **Server**: WAMP or similar (for local development)

## Installation and Setup

1. **Clone or Download the Project**:
   Place the project files in your web server's root directory (e.g., `c:\wamp64\www\DashboardEnterprise`).

2. **Database Setup**:
   - Import the database schema from [`subjects/entreprise.sql`](subjects/entreprise.sql) into your MySQL server.
   - Copy [`env-example.php`](env-example.php) to `env.php` and update with your database credentials (host, username,
     password, database name).

3. **Configuration**:
   - Ensure the constants `PHP_ROOT` and `WEB_ROOT` in [`env.php`](env.php) match your server setup.
   - The project assumes a default relative directory path `/DashboardEnterprise`.

4. **Run the Application**:
   - Start your web server (e.g., WAMP).
   - Access the application via `http://localhost/devweb-php/DashboardEnterprise/index.php`.

## Usage

- **Home Page**: [`index.php`](index.php) displays a summary (total employee count, total services, mean salaries, ...).
- **Employee Management**:
  - List employees: [`employe/list-employe.php`](employe/list-employe.php)
  - Add employee: [`employe/add-employe.php`](employe/add-employe.php)
  - Edit employee: [`employe/edit-employe.php`](employe/edit-employe.php)
  - Delete employee: [`employe/del-employe.php`](employe/del-employe.php)
- Use the navigation bar to switch between pages.

## File Structure

- `.gitignore`: Setup to keep your local config `env.php` out of github repos.
- `connexiondb.php`: Database connection management.
- `env-example.php`: Example Server and Database configuration.
- `functions.php`: Utility functions and database operations.
- `home.php`: Main dashboard statistics view.
- `includes.php`: Main include file for dependencies
- `index.php`: Main dashboard page.
- `routes.php`: Catalog of valid routes to sub pages.
- `employe/`: Employee management scripts.
- `views/`: HTML templates and partials.
- `assets/`: CSS stylesheets.
- `datas/`: Database schema and additional documentation.

## Validation

Employee data is validated in [`employe/validation-employe.php`](employe/validation-employe.php) to ensure:
- Names: 2-30 characters.
- Sex: 'm' or 'f'.
- Service: Not empty, Numeric value id from services table.
- Hire date: Valid date in YYYY-MM-DD format.
- Salary: Numeric value 0-100000 €.

## License

This project is for educational purposes. No specific license is provided.