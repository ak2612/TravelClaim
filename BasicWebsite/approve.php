<?php

include 'db.php';
include 'auth.php';
if (isset($_POST['submit'])) {
    $claimId = $_POST["claimId"];
    $query = "UPDATE `travelclaim` SET `status` = '1',`approvedOn` = CURRENT_DATE WHERE `claimId` = '$claimId';";
    $result = mysqli_query($con, $query);
    if ($result) {
        ?>
        <script>
            alert("Approved");
            window.location.replace('pendingApprovals.php');
        </script>
    <?php

    } else {
        ?>
        <script>
            alert("Network Issue!");
        </script>
    <?php

    }
}
?>
