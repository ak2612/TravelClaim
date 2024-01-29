<?php include 'includes/sidebar.php' ?>
<link href="stylesheet/sidebar.css" rel="stylesheet" type="text/css" />
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
    document.addEventListener("DOMContentLoaded", function(event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId)
            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener('click', () => {
                    // show navbar
                    nav.classList.toggle('show')
                    // change icon
                    toggle.classList.toggle('bx-x')
                    // add padding to body
                    bodypd.classList.toggle('body-pd')
                    // add padding to header
                    headerpd.classList.toggle('body-pd')
                })
            }
        }

        showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll('.nav_link')

        function colorLink() {
            if (linkColor) {
                linkColor.forEach(l => l.classList.remove('active'))
                this.classList.add('active')
            }
        }
        linkColor.forEach(l => l.addEventListener('click', colorLink))

        // Your code to run since DOM is loaded and ready

    });

    function showChangePassword() {
        // $('#modalChangePasswordManual').modal('show');
        document.getElementById('modalChangePasswordManual').style.display = 'block';
    }

    function hideChangePassword() {
        // $('#modalChangePasswordManual').modal('show');
        document.getElementById('modalChangePasswordManual').style.display = 'none';
    }

    function checkPass() {
        var old1 = '<?php echo $_SESSION['pass']; ?>';
        var old2 = document.getElementById('oldPassword').value;
        var new1 = document.getElementById('newPassword').value;
        var new2 = document.getElementById('reNewPassword').value;
        if (old1 !== old2) {
            alert("Old password doesn't match!");
        }
        if (new1 !== new2) {
            alert("Both New passwords don't match!");
        }
    }
</script>
<div>
    <header class="header box-shadow" id="header">
        <div class="header_toggle"> <i class='bx bx-menu nav_icon' id="header-toggle"></i>
            <a class="navbar-brand" href="dashboard.php" style="margin-left: 3%">
                <img src="images/logo.png" width="8%" class="d-inline-block align-top" alt="">
            </a>
        </div>
        <form class="form-inline" style="margin-right: 5%">
            <div class="dropdown">
                <div class="dropdown-toggle">
                    <i class="fa-regular fa-user fa-2xl"></i><?php echo $_SESSION['name']; ?>
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    <li><a class="dropdown-item" onclick="showChangePassword()" href="#">Change Password</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </form>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class="fa-solid fa-plane-departure nav_logo-icon"></i><span class="nav_logo-name">Travel Claim</span> </a>
                <div class="nav_list"> <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="requestClaim.php" class="nav_link"> <i class='bx bx-add-to-queue nav_icon'></i> <span class="nav_name">Create Claim</span> </a> <a href="viewClaims.php" class="nav_link"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">View Claims</span> </a><?php if($_SESSION['isro']==1){ ?> <a href="pendingApprovals.php" class="nav_link"> <i class='bx bx-loader-circle bx-spin nav_icon'></i> <span class="nav_name">Pending Approvals</span> </a> <a href="approvedClaims.php" class="nav_link"> <i class='bx bx-list-check nav_icon'></i><span class="nav_name">Approved Claims</span> </a> <a href="rejectedClaims.php" class="nav_link"> <i class='bx bx-task-x bx-flashing nav_icon'></i> <span class="nav_name">Rejected Claims</span> </a> <?php } ?></div>
            </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
</div>
<div class="container">
    <div class="modal" tabindex="-1" role="dialog" id="modalChangePasswordManual">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="hideChangePassword()"></button>
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
</div>

<!-- Container Main start
<div class="height-100 bg-light">
    <h4>Main Components</h4>
</div> -->