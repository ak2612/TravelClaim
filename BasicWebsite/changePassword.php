<?php
include ('db.php');
session_start();
if (isset($_POST['newPassword'])) {
    $empid = $_SESSION['empid'];
    $pass = $_POST['newPassword'];
    $query = "UPDATE `user` set `password` = '$pass' where `empid` = '$empid'";
    $result = mysqli_query($con, $query);
    if ($result) {?>
        <script>
            // window.location.replace('dashboard.php');
            alert('Password updated successfully!');
            <?php header('Location: dashboard.php'); ?>
            
        </script>
 <?php   }
} else {
    
    ?>
    <script>
        window.location.replace('dashboard.php');
         alert('Password could not be changed!');
    </script>
<?php } ?>