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
