<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>All threads</h1>
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
                <form method="get" action="<?=$_SERVER['PHP_SELF'];?>">
                <div class="input-group">
                  <input type="hidden" name="action" value="search">
                  <input type="text" name="keyword" class="form-control" placeholder="Search for..." value="<?= $keyword ?>">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Go!</button>
                  </span>
                </div>
                </form>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Topic</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <?php foreach ($posts as $key => $post): ?>
                    <?php include 'PostRow.php'; ?>
                  <?php endforeach; ?>
                </table>

            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
