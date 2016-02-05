<?php
require_once('../bootstrap.php');
use Entity\Comment;
use Entity\Post;
$pagename = "Processing";


if (!empty($_POST))
{
  if ($_POST['action'] == "addcomment")
  {
    $post = $em->find('Entity\Post', intval($_POST['comment_tid']));
    $comment = new Comment;

    $comment->setMessage($_POST['comment_message']);
    $comment->setPost($post);
    $comment->setDate(new DateTime());

    $em->persist($comment);
    $em->flush();

    $_SESSION['success'] = "Comment added.";
    header('Location: showthread.php?id=' . $_POST['comment_tid']);
  }
  else
  {
    $_SESSION['error'] = "Invalid action.";
    header('Location: threads.php');
  }
}
else
{
  $_SESSION['error'] = "Could not process request.";
  header('Location: threads.php');
}

?>
