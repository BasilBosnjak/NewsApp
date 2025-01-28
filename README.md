News App
News App is a web application that aggregates news articles from various sources and categories. It allows users to view, search, and comment on news articles. Administrators can manage articles by adding, editing, and deleting them. The application is built using HTML, CSS, JavaScript, jQuery, PHP, FlightPHP framework, SQL, and integrates with TheNewsAPI for fetching world news.

Features
User registration and login
View news articles by category
Search for news articles
Comment on articles
Admin panel for managing articles
Fetch world news from TheNewsAPI
Technologies Used
Frontend: HTML, CSS, JavaScript, jQuery, Bootstrap
Backend: PHP, FlightPHP framework
Database: MySQL
API: TheNewsAPI
Routing: SPAPP library
Installation
Prerequisites
XAMPP or any other web server with PHP and MySQL support
Composer for PHP dependency management
Steps
Clone the repository:

git clone https://github.com/yourusername/NewsApp.git

Navigate to the project directory:

cd NewsApp

Install PHP dependencies:

composer install

Set up the database:

Create a MySQL database named newsapp.
Import the database schema from database/schema.sql.
Configure the application:

Rename config.example.php to config.php in the backend directory.
Update the database configuration in config.php.
Start the web server:

If using XAMPP, place the project in the htdocs directory and start Apache and MySQL.
Access the application at http://localhost/NewsApp.
Usage
User Registration and Login
Navigate to the registration page to create a new account.
Use the login page to access your account.
Viewing and Searching Articles
Use the sidebar to navigate between different news categories.
Use the search bar to find specific articles.
Commenting on Articles
Open an article to view its details and add comments.
Admin Panel
Admin users can access the admin panel to manage articles.
Add, edit, or delete articles as needed.

NewsApp/
├── backend/
│   ├── config.php
│   ├── rest/
│   │   ├── dao/
│   │   │   └── BaseDao.class.php
│   │   ├── services/
│   │   │   └── ArticleService.class.php
│   │   └── routes.php
│   └── index.php
├── client/
│   ├── css/
│   │   ├── styles.css
│   │   └── spapp.css
│   ├── js/
│   │   ├── scripts.js
│   │   ├── jquery.spapp.js
│   │   ├── jquery.spapp.min.js
│   │   └── utils/
│   │       ├── constants.js
│   │       └── rest_client.js
│   ├── views/
│   │   ├── homeView.html
│   │   ├── politicsView.html
│   │   ├── sportsView.html
│   │   ├── businessView.html
│   │   ├── techView.html
│   │   ├── entertainmentView.html
│   │   ├── articleView.html
│   │   ├── adminView.html
│   │   ├── searchView.html
│   │   └── worldNewsView.html
│   └── index.html
└── database/
    └── schema.sql

Acknowledgements
TheNewsAPI for providing news data
FlightPHP for the backend framework
SPAPP for the SPA routing library
