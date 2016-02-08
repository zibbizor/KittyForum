<?php
require_once('../bootstrap.php');
use Entity\User;
session_start();

$userLoggedIn = false;
$user = new User;

if(isset($_SESSION['uid']))
{
  $userLoggedIn = true;
  $user = $em->getRepository('Entity\User')->find($_SESSION['uid']);
}
