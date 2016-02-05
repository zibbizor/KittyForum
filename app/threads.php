<?php
require_once('../bootstrap.php');
use Entity\Post;
$pagename = "Threads";
$keyword = "";

//var_dump($posts);

if (isset($_GET['action']))
{
  if ($_GET['action'] == "delete" && isset($_GET['id']))
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

  if ($_GET['action'] == "search" && isset($_GET['keyword']))
  {
    $keyword = htmlentities($_GET['keyword']);

    $query = $em->createQueryBuilder();
    $query
        ->select('p')
        ->from('Entity\Post', 'p')
        ->where('p.subject LIKE :word')
        ->orderBy('p.date', 'DESC')
        ->setParameter('word', '%'.$keyword.'%')
    ;

    $posts = $query->getQuery()->getResult();

    include '../src/Views/Header.php';
    include '../src/Views/Threads.php';
    include '../src/Views/Footer.php';
  }
  else
  {
    $_SESSION['error'] = "Invalid action";
    header('Location: threads.php');
  }
}
else
{
  $query = $em->createQueryBuilder();
  $query
      ->select('p')
      ->from('Entity\Post', 'p')
      ->orderBy('p.date', 'DESC')
  ;

  $posts = $query->getQuery()->getResult();

  include '../src/Views/Header.php';
  include '../src/Views/Threads.php';
  include '../src/Views/Footer.php';
}


 ?>
