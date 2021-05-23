<?php
session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/registerstyle.css">
    <link rel="stylesheet" href="style/stylesheet.css">
    <link rel="stylesheet" href="style/menustyle.css">
    <link rel="stylesheet" href="style/logout.css">
    <title>Registration</title>
  </head>
  <body>

    <?php
    $error = "";
    if ($_SERVER["REQUEST_METHOD"] =="POST") {
      $name = $_POST["name"];
      $email = $_POST["email"];
      $pw = $_POST["password"];
      $pw2 = $_POST["password2"];

      if (empty(htmlspecialchars(stripslashes(trim($name))))) {
        $error = "You have to choose a name.";}
      elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Not a valid EMail";}
      elseif(strlen($pw) < 8){
        $error = "The password should have a minimum of 8 Characters";}
      elseif ($pw2 != $pw) {
        $error = "Not the same passwords";}
      /*everything right? -> enter user to DB*/
      else {
        include 'includes/servercon.php';
        $pw = password_hash($pw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user(Name, EMail, Password) VALUES('$name', '$email', '$pw')";
        $con->query($sql);
        $con->close();
        $_SESSION["username"] = $name;
        header ( 'Location: welcome.php' );}
    }
    ?>

    <h1>Registration</h1>

    <form class="<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?> register" action="register.php" method="post">
      Your name? <br>
      <input class="regitem" type="text" placeholder="Name" name="name">
      <br>
      Insert your E-Mail address.
      <br>
      <input class="regitem" type="email" placeholder="E-Mail" name="email">
      <br>
      Choose a strong Passwort.
      <br>
      <input class="regitem" type="password" placeholder="Password" name="password">
      <br>
      Repeat your Passwort.
      <br>
      <input class="regitem" type="password" placeholder="Password" name="password2">
      <br>
      <?php echo '<font color="red">'.$error.'</font>' ?>
      <br>
      <input type="submit" value="Registration">
    </form>

  </body>
</html>
