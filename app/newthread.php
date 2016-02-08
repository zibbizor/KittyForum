<?php
require_once('before.php');

$pagename = "New Thread";
$op = "Post Thread";
use Entity\Post;

$post = new Post;
$postname = "";
$postmessage = "";
$display = false;

if (isset($_GET['action']) && isset($_GET['id']))
{
  if ($_GET['action'] == "edit")
  {
    if ($userLoggedIn)
    {
      $post = $em->getRepository('Entity\Post')->find($_GET['id']);
      $postname = $post->getSubject();
      $postmessage = $post->getMessage();
      $display = true;
      $pagename = "Edit Thread";
      $op = "Edit Thread";
    }
    else
    {
      $_SESSION['error'] = "You are not allowed to edit posts as anonymous.";
      header('Location: threads.php');
    }

    //var_dump($postname);
    //var_dump($postmessage);
  }
}
else if (isset($_POST['ThreadName']) && isset($_POST['ThreadContent']) && isset($_POST['action']))
{
  if ($_POST['action'] == 'editthread')
  {
    if ($userLoggedIn)
    {
    $post = $em->getRepository('Entity\Post')->find($_POST['ThreadID']);
    $post->setSubject(htmlentities($_POST['ThreadName']));
    $post->setMessage(htmlentities($_POST['ThreadContent']));

    $em->persist($post);
    $em->flush();

    $_SESSION['success'] = "Thread has been successfully edited.";
    header('Location: threads.php');
    }
    else
    {
        $_SESSION['error'] = "You are not allowed to edit posts as anonymous.";
        header('Location: threads.php');
    }
  }
  else if ($_POST['action'] == 'newthread')
  {
    if (!empty($_POST['ThreadName']) && !empty($_POST['ThreadContent']))
    {
      $post->setSubject(htmlentities($_POST['ThreadName']));
      $post->setDate(new DateTime());
      $post->setMessage(htmlentities($_POST['ThreadContent']));

      if ($userLoggedIn)
      {
        $post->setAuthor($user);
      }
      else
      {
        $anon = $em->getRepository('Entity\User')->find(1);
        $post->setAuthor($anon);
      }

      $em->persist($post);
      $em->flush();

      //var_dump($post);
      $_SESSION['success'] = "Thread has been successfully created.";
      header('Location: threads.php');
    }
    else
    {
      $_SESSION['error'] = "Failed to create thread.";
      $display = true;
    }
  }
}
else {
  $display = true;
}


if ($display === true)
{
  include '../src/Views/Header.php';
  include '../src/Views/NewThread.php';
  include '../src/Views/Footer.php';
}

 ?>
