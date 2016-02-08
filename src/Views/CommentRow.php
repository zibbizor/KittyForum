<tr>
  <tr>
    Message #<?= $comment->getId() ?>, Posted by <?= $comment->getAuthor()->getFirstname() ?> on <?= $comment->getDateString() ?> <?= '<a href="process.php?action=deletecomment&id=' . $comment->getId() . '&tid=' . $_GET['id'] . '"><i class="fa fa-trash"></i></a>' ?>
    <br>
    <?= $comment->getMessage(); ?>
  </tr>
</tr>
<br><br>
