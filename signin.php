
<?php

include("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
  // username and password sent from form

  $myusername = mysqli_real_escape_string($db,$_POST['username']);
  $mypassword = mysqli_real_escape_string($db,$_POST['password']);

  $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $active = $row['active'];

  $count = mysqli_num_rows($result);

  // If result matched $myusername and $mypassword, table row must be 1 row

  if($count == 1) {
    $_SESSION['myusername'];
    $_SESSION['login_user'] = $myusername;

    header("location: welcome.php");
  }else {
    $error = "Your Login Name or Password is invalid";
  }
}


?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <form action="" enctype="" method="post">

    <div class="">
      <label for="username">Your username:</label><br />
      <input name="username" size="25" type="text" />
    </div>

    <div class="articlePara">
      <label for="password">Your password:</label><br />
      <input name="password" size="25" type="password" />
    </div>

    <div class="articlePara">
      <input name="submit" type="submit" value="Login" />
    </div>
  </form>

</body>
</html>
