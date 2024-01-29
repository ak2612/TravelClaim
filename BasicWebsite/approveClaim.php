<?php
//include auth.php file on all secure pages
include("auth.php");
include("db.php")
?>
<!doctype html>
<html>

<head>
    <title>Dash Board</title>
    <?php include 'includes/bootstrap.php'; ?>
    <link href="stylesheet/dashboard.css" rel="stylesheet" type="text/css" />
    <style>
        #body-pd{
            background-image: linear-gradient( 64.3deg,  rgba(254,122,152,0.81) 17.7%, rgba(255,206,134,1) 64.7%, rgba(172,253,163,0.64) 112.1% );
        }
    </style>
</head>

<body id="body-pd">
    <?php include("sidebar.php");
    if (isset($_POST['submit'])) {
        $e = $_POST['claimId'];
        $q = "Select * from `travelclaim` where `claimId` = '$e';";
        $r = mysqli_query($con, $q);

        if ($r->num_rows > 0) {
            while ($row = $r->fetch_assoc()) {
                $claimId = $row['claimId'];
                $travelType = $row['travelType'];
                $startDate = $row['startDate'];
                $endDate = $row['endDate'];
                $source = $row['source'];
                $destination = $row['destination'];
                $status = $row['status'];
                $officeOrder = $row['officeOrder'];
                $travelDetails = $row['travelDetails'];
                $documents = $row['documents'];
                $empId = $row['empId'];
            }
        }
     $query = "SELECT * FROM `user` WHERE `empid`='$empId'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($numrows == 1) {
        
        $name = $row['name'];
      
    }
    }


    ?>
    <div class="container mt-5" style="padding-top: 4%;">
        <div class="card">
            <div class="container mt-3">
                <h2 style="text-align: center;">Your Claim</h2>
          
            </div>
            <div class="form-group row p-2">
                <div class="form-group col">
                    <label for="exampleInputEmail1">Claim Id</label>
                    <input type="text" class="form-control" id="startDate" name="startDate" value=<?php echo $claimId ?> disabled>
                </div>
                <div class="form-group col">
                    <label for="exampleInputEmail1">Employee ID</label>
                    <input type="text" class="form-control" id="endDate" name="endDate" value=<?php echo $empId ?> disabled>
                </div>
                <div class="form-group col">
                    <label for="exampleInputEmail1">Employee Name</label>
                    <input type="text" class="form-control" id="endDate" name="endDate" value=<?php echo $name ?> disabled>
                </div>
            </div>
            <div class="form-group p-2">
                <label for="exampleInputEmail1">Travel Type</label>
                <input type="text" class="form-control" id="travelType" name="travelType" value=<?php echo $travelType ?> disabled>
            </div>
            <div class="form-group row p-2">
                <div class="form-group col">
                    <label for="exampleInputEmail1">Start Date</label>
                    <input type="text" class="form-control" id="startDate" name="startDate" value=<?php echo $startDate ?> disabled>
                </div>
                <div class="form-group col">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="text" class="form-control" id="endDate" name="endDate" value=<?php echo $endDate ?> disabled>
                </div>
            </div>
            <div class="form-group row p-2">
                <div class="form-group col">
                    <label for="exampleInputEmail1">Source</label>
                    <input type="text" class="form-control" id="source" name="source" value=<?php echo $source ?> disabled>
                </div>
                <div class="form-group col">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" class="form-control" id="destination" name="destination" value=<?php echo $destination ?> disabled>
                </div>
            </div>
            <div class="p-2"><label for="receipt">Uploaded Office Order</label></div>
            <div class="form-group p-2 col-md-6">
                <div class="input-group mb-3 col-md-6">
                    <input type="text" class="form-control" id="officeOrder" name="officeOrder" value=<?php echo $officeOrder ?> aria-label="Recipient's username" aria-describedby="button-addon2" disabled>
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><a href="<?php echo $officeOrder ?>" target="_blank"><i class="fa-solid fa-download fa-xl"></i></a></button>
                </div>
            </div>           
            <table class="table table-striped table-bordered">
                <thead>
                    <th>Transport Type</th>
                    <th>Fare</th>
                    <th>Receipt</th>
                </thead>
                <tbody>
                    <?php
                    $totalFare = 0;
                    $decodedData = json_decode($travelDetails, true);
                    $arr = explode(';', $documents);
                    $i = 0;
                    foreach ($decodedData as $key => $value) {
                    ?>
                        <tr>
                            <td><?= substr($key, 0, -1) ?></td>
                            <td>Rs.&nbsp;&nbsp;<?php echo $value;
                                                $totalFare = $totalFare + $value;
                                                ?></td>
                            <td><a href="<?php echo $arr[$i];
                                            $i = $i + 1;
                                            ?>" target="_blank"><i class="fa-solid fa-download fa-xl"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="form-group p-2 col-md-6">
                <label for="receipt">Total Fare</label>
                <input type="text" class="form-control" id="officeOrder" name="officeOrder" value="Rs. <?php echo $totalFare ?>" disabled>
            </div>
            <div class="row p-2">
            <?php
            if ($status == 0) {


            ?>
                <div class="col-md-12">
                    <div style="float:left;">
                <form action="approve.php" method="POST">
                    <input type="hidden" value="<?php echo $claimId ?>" name="claimId" id="claimId" />
                    <button class="btn btn-success" type="submit" name="submit" id="submit"style="float: right;">Approve</button>
                </form>
                    </div>
                    <form action="reject.php" method="POST">
                    <input type="hidden" value="<?php echo $claimId ?>" name="claimId" id="claimId" />
                    <button class="btn btn-danger" type="submit" name="submit" id="submit"style="float: right;">Reject</button>
                </form>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>