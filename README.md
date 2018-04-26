# Project 5 Openclassrooms - My blog 

## Parcours développeur d'application - PHP/Symfony 

### Theme 

To realize the visual part of the blog, I decided to use the theme "Freelancer" available on the website www.startbootstrap.com.
To see the blog code on github : https://github.com/HDoumali/project5_My_blog.

### Installation

For the realization of the blog, I used WAMP wich you can download at the following adress : www.wampserver.com

Step 1 : Open the file app/Config/dev.ini and insert the following parameters : 
- dsn : 'mysql: host=localhost;dbname=project5_blog;charset=utf8'(dbname= project5_blog by default, you can choose name for the database)
- login : Enter your username for access to the mysql databse ("root" by default)
- mdp : Enter your password for access to the mysql database ("root" or "" by default)

Step 2 : Creation of the database :
- Create a new database on phpmyadmin (link : localhost/phpmyadmin on WAMP) withe the name saved in the file app/Config/dev.ini
- Import the file "project5_blog.sql" in the database

You can now connect to the blog at the following URL and enjoy its features : 

http:localhost/project_my_blog

