<?php
include_once("db.php");
if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM `user` WHERE `region`='$id' and `isro` = 1";
    $result = mysqli_query($con, $query);
    $row = mysqli_num_rows($result);
    echo "<script>console.log('Debug Objects: " . $row  . "' );</script>";
    if ($result->num_rows > 0) {
        echo '<option value="">Select Reporting Officer</option>';
        while ($row = mysqli_fetch_assoc($result)) {

            echo '<option value="' . $row['reportingofficer'] . '">' . $row['reportingofficer'] . '</option>';
        }
    }
}
?>