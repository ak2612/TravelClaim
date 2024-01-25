<?php
include ('db.php');
if (isset($_POST['empid'])) {
    $empid = $_POST['empid'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $region = $_POST['region'];
    $reportingofficer = $_POST['reportingofficer'];
    $query = "INSERT INTO `user`(`empid`, `name`, `gender`, `mobile`, `email`, `password`, `region`, `reportingofficer`) VALUES ('$empid','$name','$gender','$mobile','$email','$password','$region','$reportingofficer')";
    
    $result = mysqli_query($con, $query);
    if ($result) {?>
        <script>
        
        window.location.replace('index.php');
        </script>
 <?php   }
} else {
    
    ?>
    <script>
        window.history.back();
    </script>
<?php } ?>

