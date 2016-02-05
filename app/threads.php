<?php
require_once('../bootstrap.php');
$pagename = "Threads";


//var_dump($posts);

if (isset($_GET['action']) && isset($_GET['id']))
{
  if ($_GET['action'] == "delete")
  {
    try
    {
      $post = $em->find('Entity\Post', intval($_GET['id']));
      $em->remove($post);
      $em->flush();

      $_SESSION['success'] = "Thread has been successfully deleted.";
      header('Location: threads.php');
    } catch (Exception $e)
    {

      $_SESSION['error'] = "Could not delete the thread.";
      header('Location: threads.php');
    }


  }
}
else
{
  $posts = $em->getRepository('Entity\Post')->findAll();

  include '../src/Views/Header.php';
  include '../src/Views/Threads.php';
  include '../src/Views/Footer.php';
}


 ?>
