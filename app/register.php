<?php
require_once('before.php');

$pagename = "Registration";
use Entity\User;

$user = new User;
$useremail = "";
$userpassword = "";

if (isset($_POST['UserEmail']) && isset($_POST['UserPassword']))
{
    if (!$userLoggedIn)
    {
    //add user registration and handle errors

    $_SESSION['success'] = "You have been registered";
    header('Location: threads.php');
    }
    else
    {
    $_SESSION['success'] = "You are logged in.";
    header('Location: threads.php');
    }
}
else
{
  include '../src/Views/Header.php';
  include '../src/Views/Register.php';
  include '../src/Views/Footer.php';
}








 ?>
