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
   Place the project files in your web server's root directory (e.g., `c:\wamp64\www\devweb-php\DashboardEnterprise`).

2. **Database Setup**:
   - Import the database schema from [`subjects/entreprise.sql`](subjects/entreprise.sql) into your MySQL server.
   - Update [`connexiondb.php`](connexiondb.php) with your database credentials (host, username, password, database name).

3. **Configuration**:
   - Ensure the constants `PHP_ROOT` and `WEB_ROOT` in [`functions.php`](functions.php) match your server setup.
   - The project assumes a relative directory path `/devweb-php/DashboardEnterprise`.

4. **Run the Application**:
   - Start your web server (e.g., WAMP).
   - Access the application via `http://localhost/devweb-php/DashboardEnterprise/index.php`.

## Usage

- **Home Page**: [`index.php`](index.php) displays a summary (total employee count).
- **Employee Management**:
  - List employees: [`employe/list-employe.php`](employe/list-employe.php)
  - Add employee: [`employe/add-employe.php`](employe/add-employe.php)
  - Edit employee: [`employe/edit-employe.php`](employe/edit-employe.php)
  - Delete employee: [`employe/del-employe.php`](employe/del-employe.php)
- Use the navigation bar to switch between pages.

## File Structure

- `index.php`: Main dashboard page.
- `functions.php`: Utility functions and database operations.
- `connexiondb.php`: Database connection.
- `employe/`: Employee management scripts.
- `views/`: HTML templates and partials.
- `assets/`: CSS stylesheets.
- `subjects/`: Database schema and additional documentation.

## Validation

Employee data is validated in [`employe/validation-employe.php`](employe/validation-employe.php) to ensure:
- Names: 2-30 characters.
- Sex: 'm' or 'f'.
- Service: Not empty.
- Hire date: Valid date in YYYY-MM-DD format.
- Salary: Numeric value.

## License

This project is for educational purposes. No specific license is provided.