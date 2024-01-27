<?php include 'includes/sidebar.php' ?>
<link href="stylesheet/sidebar.css" rel="stylesheet" type="text/css" />
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
</script>
<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i>
        <a class="navbar-brand" href="dashboard.php" style="margin-left: 3%">
            <img src="images/logo.png" width="8%" class="d-inline-block align-top" alt="">
        </a>
    </div>
    <div class="header_img"> <img src="https://i.imgur.com/hczKIze.jpg" alt=""></div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class="fa-solid fa-plane-departure nav_logo-icon"></i><span class="nav_logo-name">Travel Claim</span> </a>
            <div class="nav_list"> <a href="dashboard.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> <a href="requestClaim.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Create Claim</span> </a> <a href="viewClaims.php" class="nav_link"> <i class='bx bx-list-ul nav_icon' ></i> <span class="nav_name">View Claims</span> </a> <a href="pendingApprovals.php" class="nav_link"> <i class='bx bxs-like bx-spin-hover nav_icon'></i> <span class="nav_name">Pending Approvals</span> </a> <a href="approvedClaims.php" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Approved Claims</span> </a> <a href="rejectedClaims.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Rejected Claims</span> </a> </div>
        </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>
<!-- Container Main start
<div class="height-100 bg-light">
    <h4>Main Components</h4>
</div> -->