<?php

include('db.php');
session_start();
if (isset($_POST['empid'])) {
    $empid = $_POST['empid'];
    $password = $_POST['password'];
    $query = "SELECT * FROM `user` WHERE `empid`='$empid' and `password`='$password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['empid'] = $empid;
        header('Location: dashboard.php');
    } else {
?>
        <script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Something went wrong!",
                footer: '<a href="#">Why do I have this issue?</a>'
            });
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.history.back();
    </script>
<?php }

?>