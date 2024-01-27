<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype html>
<html>

<head>
    <title>Dash Board</title>
    <?php include 'includes/bootstrap.php'; ?>
    <link href="stylesheet/dashboard.css" rel="stylesheet" type="text/css" />
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
    </script>
</head>

<body id="body-pd">
    <?php include 'sidebar.php' ?>
    <div class="container mt-5">
        <h2 style="text-align: center;"><b>Welcome <?php echo $_SESSION['name']; ?>!</b></h2>
    </div>
    <div class="container">
        <div class="row  row-cols-1 row-cols-md-3 mb-3 text-center" style="padding-top:3%">
            <div class="col">
                <div class="card card1">
                    <div class="card-body">
                    </div>
                    <div class="card-footer text-muted" style="border: none;">
                        <a class="nav-link text-white" href="requestClaim.php">Create Claim</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card2">
                    <div class="card-body">
                    </div>
                    <div class="card-footer text-muted" style="border: none;">
                        <a class="nav-link text-white" href="viewClaims.php">View Claims</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card3">
                    <div class="card-body">
                    </div>
                    <div class="card-footer text-muted" style="border: none;">
                        <a class="nav-link text-white" href="pendingApprovals.php">Pending Approvals</a>
                    </div>
                </div>
            </div>
        </div>
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
    <script>
        $(document).ready(function() {
            $(".card1").hover(function() {
                $(this).addClass('animate__animated animate__pulse');
            });
            $(".card1").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function() {
                $(this).removeClass('animate__animated animate__pulse');
            });
            $(".card2").hover(function() {
                $(this).addClass('animate__animated animate__pulse');
            });
            $(".card2").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function() {
                $(this).removeClass('animate__animated animate__pulse');
            });
            $(".card3").hover(function() {
                $(this).addClass('animate__animated animate__pulse');
            });
            $(".card3").bind("animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd", function() {
                $(this).removeClass('animate__animated animate__pulse');
            });
        });
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
</body>

</html>