# News App

News App is a web application that aggregates news articles from various sources and categories. It allows users to view, search, and comment on news articles. Administrators can manage articles.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
  - [Prerequisites](#prerequisites)
  - [Steps](#steps)
- [Usage](#usage)
  - [User Registration and Login](#user-registration-and-login)
  - [Viewing and Searching Articles](#viewing-and-searching-articles)
  - [Commenting on Articles](#commenting-on-articles)
  - [Admin Panel](#admin-panel)
- [Project Structure](#project-structure)
- [Acknowledgements](#acknowledgements)

## Features
- User registration and login
- View news articles by category
- Search for news articles
- Comment on articles
- Admin panel for managing articles
- Fetch world news from TheNewsAPI

## Technologies Used
- **Frontend**: HTML, CSS, JavaScript, jQuery, Bootstrap
- **Backend**: PHP, FlightPHP framework
- **Database**: MySQL
- **API**: TheNewsAPI
- **Routing**: SPAPP library

## Installation

### Prerequisites
- XAMPP or any other web server with PHP and MySQL support
- Composer for PHP dependency management

### Steps
1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/NewsApp.git
    ```
2. Navigate to the project directory:
    ```bash
    cd NewsApp
    ```
3. Install PHP dependencies:
    ```bash
    composer install
    ```
4. Set up the database:
    - Create a MySQL database named `newsapp`.
    - Import the database schema from `database/schema.sql`.
5. Configure the application:
    - Rename `config.example.php` to `config.php` in the `backend` directory.
    - Update the database configuration in `config.php`.
6. Start the web server:
    - If using XAMPP, place the project in the `htdocs` directory and start Apache and MySQL.
    - Access the application at `http://localhost/NewsApp`.

## Usage

### User Registration and Login
- Navigate to the registration page to create a new account.
- Use the login page to access your account.

### Viewing and Searching Articles
- Use the sidebar to navigate between different news categories.
- Use the search bar to find specific articles.

### Commenting on Articles
- Open an article to view its details and add comments.

### Admin Panel
- Admin users can access the admin panel to manage articles.
- Add, edit, or delete articles as needed.

## Acknowledgements
- TheNewsAPI for providing news data
- FlightPHP for the backend framework
- SPAPP for the SPA routing library
