<?php
session_start();
if (!isset($_SESSION["username"])) {
  $_SESSION["username"] = "Guest";
}
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Login</title>
  </head>
  <body>

    <?php
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] =="POST") {
      $name = $_POST["name"];
      $pw = $_POST["password"];
      /*server connection*/
      include 'backend/servercon.php';
      $sql = "SELECT * FROM user";
      $res = $con->query($sql);

      while($i = $res->fetch_assoc()){
        if ($i["Name"]==$name && password_verify($pw, $i['Password'])){
          /*Session start after login*/
          $_SESSION["username"] = $name;
          $_SESSION["uid"] = $i["ID"];
          $error = " ";
          header ( 'Location: welcome.php' );
          }
        elseif($i["Name"]==$name){
          $error = "Password wrong";}
        }
        if($error == "")
        {$error = "This name is not registered";}
      $con->close();
    }
?>

<h1>Login</h1>

<form class="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?> login" action="login.php" method="post">
  What is your username? <br>
  <input class="loginitem" type="text" placeholder="Name" name="name">
  <br>
  Please, insert your password.
  <br>
  <input class="loginitem" type="password" placeholder="Password" name="password">
  <br>
  <?php echo '<font color="red">'.$error.'</font>' ?>
  <br>
  <input type="submit" class="loginitem" value="Login"> <br>
  <a href="register.php">Not registered now?</a> <br>
</form>

  </body>
</html>
