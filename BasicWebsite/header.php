<div>
  <nav class="navbar navbar navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="margin-left: 3%">
      <img src="images/logo.png" width="8%" class="d-inline-block align-top" alt="">
    </a>
    <form class="form-inline" style="margin-right: 5%">
      <div class="dropdown">
        <div class="dropdown-toggle" style="color:white;">
          <i class="fa-regular fa-user fa-2xl"></i><?php echo $_SESSION['name']; ?>
        </div>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          <li><a class="dropdown-item" onclick="changePassword()" href="#">Change Password</a></li>
          <li><a class="dropdown-item" href="#">Something else here</a></li>
        </ul>
      </div>
    </form>
  </nav>
</div>