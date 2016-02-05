<tr>
  <td><?= $post->getId(); ?></td>
  <td><?= '<a href="showthread.php?id=' . $post->getId() . '">' . $post->getSubject() . '</a>' ?></td>
  <td><?= $post->getDateString(); ?></td>
  <td><?= '<a href="newthread.php?action=edit&id=' . $post->getId() . '"><i class="fa fa-pencil"></i></a>' ?> <?= '<a href="threads.php?action=delete&id=' . $post->getId() . '"><i class="fa fa-trash"></i></a>' ?></td>
</tr>
