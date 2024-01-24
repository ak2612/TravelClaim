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
</head>

<body>
    <div>
        <nav class="navbar navbar navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#" style="margin-left: 3%">
                <img src="images/logo.png" width="70%" height="40%" class="d-inline-block align-top" alt="">
            </a>
            <form class="form-inline" style="margin-right: 5%">
                <div style="color:white;"><i class="fa-regular fa-user fa-2xl"></i>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>

            </form>
        </nav>
    </div>
    <div class="container">
        Welcome <?php echo $_SESSION['empid']; ?>!
    </div>
    <div class="container">
        <div class="row  row-cols-1 row-cols-md-3 mb-3 text-center" style="padding-top:3%">
            <div class="col">
                <div class="card card1">
                    <div class="card-body card-body1">
                        <p class="display-5"><a class="nav-link text-white">Requests</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card2">
                    <div class="card-body card-body2">
                        <p class="display-5"><a class="nav-link text-white">Inbox</a></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card3">
                    <div class="card-body card-body3">
                        <p class="display-5"><a class="nav-link text-white">Reports</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>