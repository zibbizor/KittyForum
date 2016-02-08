<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $pagename ?></h1>
                <br>
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

                      if (!$userLoggedIn)
                      {
                        echo '<div class="alert alert-danger">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Attention!</strong> You are not logged in and will post as anonymous.
                        </div>';
                      }
                       ?>
                        <form class="form-horizontal" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                          <?php
                          if(isset($_GET['action']) && $_GET['action'] == 'edit')
                          {
                            echo '<input type="hidden" name="ThreadID" value="' . $post->getId() . '">';
                            echo '<input type="hidden" name="action" value="editthread">';
                          }
                          else
                          {
                            echo '<input type="hidden" name="action" value="newthread">';
                          }
                          ?>
                          <label for="inputThreadName" class="col-sm-2 control-label">Thread Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="ThreadName" id="inputThreadName" placeholder="Thread Name" value="<?= $postname ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputThreadContent" class="col-sm-2 control-label">Message</label>
                          <div class="col-sm-10">
                            <textarea cols="40" rows="10" id="inputThreadContent" name="ThreadContent" class="form-control" placeholder="Write something here..."><?= $postmessage ?></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info"><?= $op ?></button>
                          </div>
                        </div>
                        </form>

            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
