<?php
require_once('before.php');

$pagename = "Login";
use Entity\User;

if (isset($_GET['action']))
{
  if ($_GET['action'] == "logout")
  {
    if ($userLoggedIn)
    {
      unset($_SESSION['uid']);
      $_SESSION['success'] = "You have been logged out.";
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
      $usertest = $em->getRepository('Entity\User')->findOneBy(array('email' => $_POST['UserEmail']));

      if ($usertest === null)
      {
        $_SESSION['error'] = "Invalid Username";
        header('Location: login.php');
      }
      else if ($usertest->getPassword() != $_POST['UserPassword'])
      {
        $_SESSION['error'] = "Invalid Password";
        header('Location: login.php');
      }
      else
      {
        $_SESSION['uid'] = $usertest->getId();
        $_SESSION['success'] = "You have been logged in.";
        header('Location: threads.php');
      }
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
