# What is this?
This is a PHP source code that outputs a reasonably readable table when you enter a SQL statement.
I made it because it was annoying to have to export each query in phpmyadmin.

# Requirement
MariaDB

APACHE

# Example usage
I built it in xampp. This source code is vulnerable because I don't intend to publish it as a web app.(I've taken some simple measures to prevent XSS.)

If you put the whole folder directly under htdocs, it works just like the pictures below.


![スクリーンショット (304)](https://user-images.githubusercontent.com/94665341/142980961-63f0a182-2de4-454b-865d-e07454a72ff4.png)

This is the first screen, where you can enter a database name to specify. Databases that do not exist will be created automatically.
You can execute any query such as CREATE TABLE, INSERT, UPDATE, DELETE, SELECT, etc. against the database you have created.

![スクリーンショット (305)](https://user-images.githubusercontent.com/94665341/142980954-69eb4490-80ed-4fa5-b6eb-dd5bde2b837b.png)

The result of the SELECT statement will be output in an easy-to-read format as shown above.



# Author
heabi(my twitter account: https://mobile.twitter.com/heabictf)

# Other
If you want to change the look and feel, please tweak the source code yourself. 
Also, pointing out vulnerable areas and suggestions for fixes are welcome!

Created on November 23, 2021.