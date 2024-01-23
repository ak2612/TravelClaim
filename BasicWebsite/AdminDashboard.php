<!doctype html>
<html>
    <head>
        <title>Dash Board</title>
         <?php include 'includes/bootstrap.php'; ?>
    </head>
    <body>
        <div>
            <nav class="navbar navbar navbar navbar-dark bg-dark">
                <a class="navbar-brand" href="#" style="margin-left: 3%">
                    <img src="images/logo.png" width="70%" height="40%" class="d-inline-block align-top" alt="">
                </a>
                <form class="form-inline" style="margin-right: 5%">
                    <div style="color:white;"><i class="fa-regular fa-user fa-2xl"></i></div>
                </form>
            </nav>
        </div>
        <div class="container">
            Welcome $session["user"]
        </div>
    </body>
</html>