# PHP CRUD Model 
---- What is CRUD ?
CRUD basically stands for create, read, update and delete operations on database. In our case, we are handling the backend part of this project with PHP scripts and MySQL as a database system. 
# What Will We Do ? 
1. Create a database 'notesdb' on MySQL phpmyadmin
2. Inside the 'notesdb' database, we will create a 'Notes' table, which contains 4 different columns:
------------------------------
    COLUMN_NAME  DATA_TYPE
    S.N         --> INT
    Title       --> VARCHAR(200)
    Description --> TEXT
    Timestamp   --> DATETIME 

------------------------------
# How Does This Project Work ?

---- MySQL Database Setup

We have a file named 'db_config.php' that contains our inital MySQL database setup and we test its connection to PHP. 
We are using PHP in-built 'mysqli' extension for this project, which is not required to install explicitly. We have two ways of working with PHP and MySQL together: 
1. Functional or Prodecural Way
2. Object Oriented Programming Way
For simplicity, we are doing in the first way i.e. functional way. 

---- PHP Project File Setup 
We are hosting this project in XAMPP development server which is okay for now, later we will host this website to a production ready server with our own domain name and custom configuration. 
Inside root folder of htdocs, we create a new folder named PHP_CRUD_APP. 

# Project Directory Structure 
    PHP_CRUD_APP/
          crud_operations.php ==> (CRUD Logics)
          db_config.php
          index.js 
          index.php ==> (Home page)
          README.md 


# What Frameworks Are We Using ?
We have used following listed frameworks in our project: 
1. Bootstrap v.5.3 (HTML,CSS and JS Framework)
2. Jquery ( King of JS Framework) 
3. Jquery DataTables (Interactive DataTable to display data)

# Key Concepts 
1.  PHP Syntax <?php ... ?>
2.  PHP Variables and Constants
3.  PHP Statements (Combination of keyword,variables, operators, datatype, comments)
4.  PHP Conditional Statements(if..else, if..else if...else)
5.  PHP Control Flow Statments(for loop, while loop, do..while loop, foreach loop)
7.  PHP Arrays
8.  PHP Super Global Variables
10. PHP Form Handling ($_GET and $_POST)
11. PHP Functions 
12. PHP and  MySQL  
13. MySQL CREATE ...            (C)
17. MYSQL SELECT FROM TABLE ... (R)
14. MySQL UPDATE TABLE ...      (U)
15. MySQL DELETE FROM TABLE ... (D)

