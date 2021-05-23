<?php
session_start();
if($_SESSION["username"] == "Guest"){
  header('Location: login.php');
}
?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/stylesheet.css">
    <link rel="stylesheet" href="style/welcome.css">
    <link rel="stylesheet" href="style/menustyle.css">
    <link rel="stylesheet" href="style/logout.css">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Welcome</h1>

    <?php
    include 'includes/logout.php';
    include 'includes/menu.php';
    ?> <br>
    <p>You have successfully logged in</p>


  </body>
</html>
