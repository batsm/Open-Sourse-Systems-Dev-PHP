# bnu-php-example

This script is for students at Bucks New Uni learning PHP in the "Open Source Systems" module. It is also a good starter project for anyone who is looking to learn PHP and MySQL.

## Installation Instructions

1. Run the SQL commands on your database from "_sql/college.dump" to setup the database tables and initial data
2. Download a copy of the repository files and upload them to your FTP server space in a new folder
3. Update "_includes/dbconnect.inc" with your database login credentials
4. Visit the your project folder in a browser and you should see a login screen

## Default Login

The database is initialised with the following user setup:

- Student ID: 20000000
- Password: test

## What does this web app demonstrate?

- how to use mysqli_ functions to connect to MySQL database
- how you can organise your files and folders in your project (there is no one correct way, but this is one way!)
- how to implement user authentication (login) using the PHP password_verify() function
- how to generate a secure hash of a password (see password_hash.php)
- how to implement a basic templating system (this, in turn, demonstrates how to separate business logic from the presentation layer)
- how to use the \<\<\<EOD notation to allow building of a multi-line string (see details.php)
- how to perform redirects using the PHP header() function
- how to implement $_SESSION and check that a user is logged in
- how to use PHP functions and how to properly document your functions using PHP comments (see _includes/functions.inc)

## How can this web app be improved?

This is a very basic web app and there are many things that would likely be enhanced if it was to be used in a production (live environment). Some of these are listed below:

- protect your SQL queries against SQL injection (pretty important!)
- use bootstrap to improve the UI
- use jQuery for on-page behaviour, unobtrustive validation, etc...
- the potential use of an MVC framework such as CodeIgniter (good) or Laravel (better)
- create a simple installation script which checks whether the tables are already created in the database and if they are not, it runs the table creation and data seeding SQL commands.
