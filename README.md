# What is this?
This is a PHP source code that outputs a reasonably readable table when you enter a SQL statement.
I made it because it was annoying to have to export each query in phpmyadmin.

# Requirement
XAMPP (MariaDB + APACHE)

# Example usage
I built it in xampp, which is vulnerable because I don't intend to publish it as a web app.
If you put the whole folder directly under htdocs, it works just like the pictures below.

This is the first screen, where you can enter a database name to specify the database. Databases that do not exist will be created automatically.
Database update operations can be performed from a large text field. (A duplicate statement can be executed.)
SELECT statements are performed in the following screen. (Enter the number of SELECT statements you want to execute, and click "Go".)
https://user-images.githubusercontent.com/94665341/142873420-bc0145ca-0042-49c5-926f-91e1d9e850cc.png



This is the screen for entering a SELECT statement. You cannot execute a compound statement. (It will throw an error.)
https://user-images.githubusercontent.com/94665341/142873424-1079a86b-4580-4392-b400-7dc6f55c5421.png



This will output an easy-to-read screen.
https://user-images.githubusercontent.com/94665341/142873427-f6ff4e14-868b-485e-9610-53be49f16f10.png


# Other
If you want to change the look and feel, please tweak the source code yourself. (Please send me a pull request if you like.)
Also, pointing out vulnerable areas and suggestions for fixes are welcome!
