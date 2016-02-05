<?php
require_once('../bootstrap.php');
use Entity\User;
session_start();

$userLoggedIn = false;

if(isset($_SESSION['uid']))
{
  $userLoggedIn = true;
  $user = $em->getRepository('Entity\Post')->find($_SESSION['uid']);  
}
