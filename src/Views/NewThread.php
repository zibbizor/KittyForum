<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>New Thread</h1>
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
                       ?>
                        <form class="form-horizontal" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                          <label for="inputThreadName" class="col-sm-2 control-label">Thread Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="ThreadName" id="inputThreadName" placeholder="Thread Name">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputThreadContent" class="col-sm-2 control-label">Message</label>
                          <div class="col-sm-10">
                            <textarea cols="40" rows="10" id="inputThreadContent" name="ThreadContent" class="form-control" placeholder="Write something here..."></textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Post Thread</button>
                          </div>
                        </div>
                        </form>

            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
