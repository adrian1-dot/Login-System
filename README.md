# Login-System
This is a simple login, register and logout system written in PHP. 
It will start a session if successfully logged in, therefore nobody can see the welcome page without having registered.

# How to setup
First of all you will need a Database with the name "mydb" and a table in it named "user". I used XAMPP (https://www.apachefriends.org/download.html) to have one.

## Table structure
1. Name -> ID, Typ -> Int, Auto_Increment, Primary 
1. Name -> Name, Typ -> VarChar(255)
1. Name -> EMail, Typ -> VarChar(255)
1. Name -> Password, Typ -> VarChar(255)

If you use phpMyAdmin it should look like: 

![phpMyAdmin](https://user-images.githubusercontent.com/51023444/119255359-ad8e6180-bbbb-11eb-9164-62ef58bf09e9.png)

# How to use
Now we can use it if we have started the server. Open your browser and write http://localhost/LoginSystem/login.php. 
Now you will see the login.php page, but you are not registered. Click on the "Not registered now?" button on the bottom. 
Next to do is to register in the database. Therefore, choose a name, email and password. If you click the button below your registration is saved in the database
and you can see the welcome.php page. This page contains a "MENU" on the left upper corner, 
if you hover you will see 3 example buttons for building furthermore, the 
3 buttons below will direct you to the pages. On the right upper corner you can see your username and a default picture, 
also you can hover, only the last button does something. This button will destroy your session and redirect you to the login.php page.



