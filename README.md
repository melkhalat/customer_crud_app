# customer_crud_app

# A Basic Customer CRUD Application

This is a basic CRUD (Create, Read, Update, Delete) application developed using PHP. It demonstrates fundamental operations through a database connection for managing customer data through a web interface and database interactions.

## Features

- **Create**: Add new customer records with different reward program tiers.
- **Read**: Retrieve and display customer records.
- **Update**: Modify existing customer records.
- **Delete**: Remove customer records.

## Prerequisites

- PHP 7.4 or higher
- MySQL
- A web server (Apache)

## Installation

1. **Clone the repository**:

   bash
   git clone [REPOSITORY_URL]
   cd [REPOSITORY_DIRECTORY]

2. **Set up the database**:

- Create a new database in MySQL.
- Import the provided SQL schema from the sql file into your database.

3. **Configure database connection**:

- Edit the includes/db.php file to update the database connection settings with your credentials: $databaseConnection = new DatabaseConnection('localhost', 'customer_crud_app', 'root', '');

4. **Set up the project**:

- Ensure all PHP files are correctly placed in your web server's document root.

- Adjust file permissions if necessary to ensure web server access.

5. **Run and test the application**:

- Use the provided test case scripts for each CRUD operation to ensure they function as expected.
