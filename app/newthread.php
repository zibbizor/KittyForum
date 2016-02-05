<?php
require_once('../bootstrap.php');

$pagename = "New Thread";
use Entity\Post;
$post = new Post;

if (isset($_POST) && isset($_POST['ThreadName']) && isset($_POST['ThreadContent']))
{
  //var_dump($_POST);

  if (!empty($_POST['ThreadName']) && !empty($_POST['ThreadContent']))
  {
    $post->setSubject(htmlentities($_POST['ThreadName']));
    $post->setDate(new DateTime());
    $post->setMessage(htmlentities($_POST['ThreadContent']));

    $em->persist($post);
    $em->flush();

    //var_dump($post);
    $_SESSION['success'] = "Thread has been successfully created.";
  }
  else
  {
    $_SESSION['error'] = "Failed to create thread.";
  }


}



include '../src/Views/Header.php';
include '../src/Views/NewThread.php';
include '../src/Views/Footer.php';

 ?>
