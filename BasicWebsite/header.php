<style>
        .dropdown:hover>.dropdown-menu {
            display: block;
        }

        .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
            pointer-events: none;
        }
    </style>
    <script>
        function changePassword() {
            $('#modalChangePasswordManual').modal('show');
        }
        function checkPass(){
            var old1 = '<?php echo $_SESSION['pass'];?>';
            var old2 = document.getElementById('oldPassword').value;
            var new1 = document.getElementById('newPassword').value;
            var new2 = document.getElementById('reNewPassword').value;
            if(old1 !== old2){
                alert("Old password doesn't match!");
            }
            if(new1 !== new2){
                alert("Both New passwords don't match!");
            }
        }
    </script>
<div>
  <nav class="navbar navbar navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="dashboard.php" style="margin-left: 3%">
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
<div class="modal" tabindex="-1" role="dialog" id="modalChangePasswordManual">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-5 pt-0">
                    <form id="changePassword" action="changePassword.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="oldPassword" name="oldPassword" placeholder="Old Password" required>
                            <label for="floatingInput">Old Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="newPassword" name="newPassword" placeholder="New Password" required>
                            <label for="floatingPassword">New Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control rounded-3" id="reNewPassword" name="reNewPassword" placeholder="Re-Type New Password" required>
                            <label for="floatingPassword">Re-Type New Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" onclick="checkPass()">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>