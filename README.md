# What is this?
This is a PHP source code that outputs a reasonably readable table when you enter a SQL statement.
I made it because it was annoying to have to export each query in phpmyadmin.

# Requirement
XAMPP (MariaDB + APACHE)

# Example usage
I built it in xampp. This source code is vulnerable because I don't intend to publish it as a web app.
If you put the whole folder directly under htdocs, it works just like the pictures below.

This is the first screen, where you can enter a database name to specify the database. Databases that do not exist will be created automatically.
Database update operations can be performed from a large text field. (A duplicate statement can be executed.)
SELECT statements are performed in the following screen. (Enter the number of SELECT statements you want to execute, and click "Go".)

![スクリーンショット (300)](https://user-images.githubusercontent.com/94665341/142876269-bc594e13-f79f-42e0-b6b8-51def18ffa78.png)



This is the screen for entering a SELECT statement. You cannot execute a compound statement. (It will throw an error.)

![スクリーンショット (302)](https://user-images.githubusercontent.com/94665341/142876276-0811d243-038e-4863-b5f0-118b253e1999.png)

This will output an easy-to-read screen.

![スクリーンショット (301)](https://user-images.githubusercontent.com/94665341/142876278-2205d88c-6423-4f74-97ca-b2bcfac912bf.png)


# Author
heabi(my twitter account: https://mobile.twitter.com/heabictf)

# Other
If you want to change the look and feel, please tweak the source code yourself. (Please send me a pull request if you like.)
Also, pointing out vulnerable areas and suggestions for fixes are welcome!
