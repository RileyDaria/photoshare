<?php
/**
 * Created by PhpStorm.
 * User: Marilyn
 * Date: 4/24/2016
 * Time: 12:45 AM
 */
include('config.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['login_user'])){
  header("location:login.php");
}

?>