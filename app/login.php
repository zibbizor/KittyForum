<?php
require_once('before.php');

$pagename = "Login";
use Entity\User;

$user = new User;
$useremail = "";
$userpassword = "";

if (isset($_GET['action']))
{
  if ($_GET['action'] == "logout")
  {
    if ($userLoggedIn)
    {
      unset($_SESSION['user']);
      header('Location: threads.php');
    }
    else
    {
      $_SESSION['error'] = "You are not logged in.";
      header('Location: threads.php');
    }
  }
}
else if (isset($_POST['UserEmail']) && isset($_POST['UserPassword']))
{
    if (!$userLoggedIn)
    {
    //add user login handling

    $_SESSION['success'] = "You have been logged in.";
    header('Location: threads.php');
    }
    else
    {
    $_SESSION['success'] = "You are already logged in.";
    header('Location: threads.php');
    }
}
else
{
  include '../src/Views/Header.php';
  include '../src/Views/Login.php';
  include '../src/Views/Footer.php';
}





 ?>
