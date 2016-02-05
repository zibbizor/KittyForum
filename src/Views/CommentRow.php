<tr>
  <tr>
    Message #<?= $comment->getId() ?>, Posted by <?= $comment->getAuthor()->getFirstname() ?> on <?= $comment->getDateString() ?>
    <br>
    <?= $comment->getMessage(); ?>
  </tr>
</tr>
<br><br>
