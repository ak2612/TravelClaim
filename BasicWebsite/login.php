<?php

include('db.php');
session_start();
if (isset($_POST['empid'])) {
    $empid = $_POST['empid'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `user` WHERE `empid`='$empid' and `password`='$password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($numrows == 1) {
        $_SESSION['empid'] = $empid;
        $_SESSION['name'] = $row['name'];
        $_SESSION['pass'] = $row['password'];
        $_SESSION['region'] = $row['region'];
        header('Location: dashboard.php');
    } else {
        $_SESSION['error'] = 'Invalid Login Attempt!';
        header('Location: index.php');
    }
} else {
    ?>
    <script>
       
        window.history.back();
    </script>
<?php }

?>