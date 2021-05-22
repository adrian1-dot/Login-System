<?php
session_start();
if($_SESSION["username"] == "Guest"){
  header('Location: login.php');
}
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="css/menustyle.css">
    <link rel="stylesheet" href="css/logout.css">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Welcome</h1>

    <?php
    include 'backend/logout.php';
    include 'backend/menu.php';
    ?> <br>
    <p>You have successfully logged in</p>


  </body>
</html>
