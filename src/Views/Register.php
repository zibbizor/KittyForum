<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>Registration</h1>
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
                          <label for="inputUserEmail" class="col-sm-2 control-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="UserEmail" id="inputUserEmail" placeholder="Email..." value="<?= $useremail ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserPassword" class="col-sm-2 control-label">Password</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="UserPassword" id="inputUserPassword" placeholder="Password..." value="<?= $userpassword ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserDescription" class="col-sm-2 control-label">Description</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="UserDescription" id="inputUserDescription" placeholder="Say something about you..." value="<?= $userdescription ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserFirstname" class="col-sm-2 control-label">First Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="UserFirstname" id="inputUserFirstname" placeholder="First Name" value="<?= $userfirstname ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserLastname" class="col-sm-2 control-label">Last Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="UserLastname" id="inputUserLastname" placeholder="Last name" value="<?= $userlastname ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputUserDate" class="col-sm-2 control-label">Date of Birth</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="UserDate" id="inputUserDate">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-info">Register</button>
                          </div>
                        </div>
                        </form>

            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->
