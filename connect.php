<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 4/23/2016
 * Time: 10:22 PM
 */

  mysqli_connect("root@euca.192.168.83.174",
    "root", "root")
  or die("<p>Error connecting to database: " .
    mysqli_error() . "</p>");

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
?>