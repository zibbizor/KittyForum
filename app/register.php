<?php
require_once('before.php');
use Entity\User;
$pagename = "Registration";

$useremail = "";
$userpassword = "";
$userdescription = "";
$userfirstname = "";
$userlastname = "";
$userdate = "";

if (isset($_POST['UserEmail']) && isset($_POST['UserPassword']) && isset($_POST['UserDescription']) && isset($_POST['UserFirstname']) && isset($_POST['UserLastname']) && isset($_POST['UserDate']))
{
    if (!$userLoggedIn)
    {
    //add user registration and handle errors
    $newuser = new User;

    $newuser->setEmail(htmlentities($_POST['UserEmail']));
    $newuser->setPassword(htmlentities($_POST['UserPassword']));
    $newuser->setDescription(htmlentities($_POST['UserDescription']));
    $newuser->setFirstname(htmlentities($_POST['UserFirstname']));
    $newuser->setLastname(htmlentities($_POST['UserLastname']));

    $date = DateTime::createFromFormat('Y-m-d', $_POST['UserDate']);
    $newuser->setBirthDate($date);
    $em->persist($newuser);
    $em->flush($newuser);


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
