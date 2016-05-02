<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 4/23/2016
 * Time: 10:22 PM
 */

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 07a448505e0a0a2c4f4247a5a9dc90977c524b92
  $server = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $connection = new mysqli($server, $username, $password);

  // Check connection
  if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
  }
  echo "Connected successfully";
<<<<<<< HEAD
=======
=======
  mysqli_connect("localhost",
    "root", "")
  or die("<p>Error connecting to database: " .
    mysqli_error() . "</p>");
>>>>>>> 6229a0b6cd1298c7c6b84c26b1eca12c7f081d79
>>>>>>> 07a448505e0a0a2c4f4247a5a9dc90977c524b92

  echo "<p>Connected to MySQL!</p>";

  mysqli_select_db("photoshare_430")
  or die("<p>Error selecting the database your-database-name: " .
    mysqli_error() . "</p>");

  echo "<p>Connected to MySQL, using database your-database-name.</p>";

  $result = mysqli_query("SHOW TABLES;");

  if (!$result) {
    die("<p>Error in listing tables: " . mysqli_error() . "</p>");
  }

  echo "<p>Tables in database:</p>";
  echo "<ul>";
  while ($row = mysqli_fetch_row($result)) {
    echo "<li>Table: {$row[0]}</li>";
  }
  echo "</ul>";
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 07a448505e0a0a2c4f4247a5a9dc90977c524b92
?>

<html>
<head>
  <link href="" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header"><h1>PHP & MySQL: The Missing Manual</h1></div>
<div id="example">Example 5-1</div>

<div id="content">
  <h1>SQL Connection test</h1>
  <form action="scripts/connect.php" method="POST">
    <fieldset class="center">
      <input type="submit" value="Connect to MySQL" />
    </fieldset>
  </form>
</div>

<div id="footer"></div>
</body>
</html>
<<<<<<< HEAD
=======
=======
?>
>>>>>>> 6229a0b6cd1298c7c6b84c26b1eca12c7f081d79
>>>>>>> 07a448505e0a0a2c4f4247a5a9dc90977c524b92
