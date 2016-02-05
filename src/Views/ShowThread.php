<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <?php if(isset($_SESSION['success']))
                    {
                      include 'SuccessNotification.php';
                      unset($_SESSION['success']);
                    }
                    else if(isset($_SESSION['error']))
                    {
                      include 'ErrorNotification.php';
                      unset($_SESSION['error']);
                    }
                    ?>
                <h1><?= $post->getSubject(); ?></h1>
                <p>
                  <?= $post->getMessage(); ?>
                </p>
                <br><br>
                <hr>
                <h3>Comments</h3>
                <table class="table table-striped table-hover">
                  <?php foreach ($comments as $comment): ?>
                    <?php include 'CommentRow.php' ?>
                  <?php endforeach; ?>
                </table>
                <h3>Add a comment</h3>
                <form class="form-horizontal" method="post" action="process.php">
                <div class="form-group">
                  <input type="hidden" name="action" value="addcomment">
                  <input type="hidden" name="comment_tid" value=<?= '"' . $post->getId() . '"' ?>>
                  <label for="inputCommentContent" class="col-sm-2 control-label">Message</label>
                  <div class="col-sm-10">
                    <textarea cols="40" rows="5" id="inputCommentContent" name="comment_message" class="form-control" placeholder="Write something here..."></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-info">Add Comment</button>
                  </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
