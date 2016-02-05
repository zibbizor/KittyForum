<?php
require_once('../bootstrap.php');

$pagename = "New Thread";
use Entity\Post;

$postname = "";
$postmessage = "";

if (isset($_GET['action']) && isset($_GET['id']))
{
  if ($_GET['action'] == "edit")
  {
    $post = $em->getRepository('Entity\Post')->find($_GET['id']);
    $postname = $post->getSubject();
    $postmessage = $post->getMessage();

    //var_dump($postname);
    //var_dump($postmessage);
  }
}
else if (isset($_POST['ThreadName']) && isset($_POST['ThreadContent']) && isset($_POST['action']))
{
  if ($_POST['action'] == 'editthread')
  {
    $post = $em->getRepository('Entity\Post')->find($_POST['ThreadID']);
    $post->setSubject(htmlentities($_POST['ThreadName']));
    $post->setMessage(htmlentities($_POST['ThreadContent']));

    $em->persist($post);
    $em->flush();

    $_SESSION['success'] = "Thread has been successfully edited.";
  }
  else if ($_POST['action'] == 'newthread')
  {
    if (!empty($_POST['ThreadName']) && !empty($_POST['ThreadContent']))
    {
      $post = new Post;
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
}



include '../src/Views/Header.php';
include '../src/Views/NewThread.php';
include '../src/Views/Footer.php';

 ?>
