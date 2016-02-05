<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                KittyForum
            </a>
            <br>
            <p>

            </p>
        </li>
        <li class="sidebar-userinfo">Welcome, <i id="name"><?php
        if ($userLoggedIn)
        {
            echo $user->getFirstname();
        }
        else
        {
          echo "Guest";
        }
          ?></i></li>
          <li><?php
            if ($userLoggedIn)
            {
              echo '<li><a href="login.php?action=logout">Log Out</a></li>';
              echo '<li><a href="account.php">My Account</a></li>';
            }
            else
            {
              echo '<li><a href="login.php">Login</a></li>';
              echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
          </li>
        <li>
            <a href="newthread.php">New Thread</a>
        </li>
        <li>
            <a href="threads.php">Thread List</a>
        </li>
        <li>
            <a href="#">Overview</a>
        </li>
    </ul>
</div>
<!-- /#sidebar-wrapper -->
