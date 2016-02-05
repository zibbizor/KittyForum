<?php
require_once('before.php');

if (!isset($_GET) || empty($_GET['id']))
{
  header('Location: threads.php');
}

$post = $em->getRepository('Entity\Post')->find($_GET['id']);
$comments = $post->getComments();
$pagename = $post->getSubject();
include '../src/Views/Header.php';
include '../src/Views/ShowThread.php';
include '../src/Views/Footer.php';
 ?>
