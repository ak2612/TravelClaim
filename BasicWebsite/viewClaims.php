<?php
//include auth.php file on all secure pages
include("auth.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/bootstrap.php'; ?>
    <?php include 'includes/datatables.php'; ?>
</head>

<body id="body-pd">
    <?php include 'sidebar.php' ?>
    <div class="container pt-3 p-2">
        <div class="row g-3">
            <div class="col-md-2">
                <input class="form-control me-2" type="text" id="searchNoReport" placeholder="Search Request No" aria-label="Search">
            </div>
            <div class="col-md-2">
                <input class="form-control me-2" type="text" id="searchCaseReport" placeholder="Search Case No" aria-label="Search">
            </div>
            <div class="col-md-2">
                <select id="projectListReport" class="form-select" name="projectListReport">
                    <option value="">Select Project</option>
                    <option value="@p.Key">@p.Value</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" id="min" name="min" class="form-control" placeholder="receivedOnFrom" required />
            </div>
            <div class="col-md-2">
                <input type="text" id="max" name="max" class="form-control" placeholder="receivedOnTo" required />
            </div>
        </div>
        <br />
        <table class="table table-striped table-hover" id="view" style="width:100%">
            <thead>
                <tr>
                    <th hidden="hidden"></th>
                    <th style="min-width:65px">Claim Id</th>
                    <th>Travel Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Status</th>
                    <th>Submitted On</th>
                    <th>Approved On</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $e = $_SESSION['empid'];
                $q = "Select * from `travelclaim` where `empId` = '$e';";
                $r = mysqli_query($con, $q);
           
                if ($r->num_rows > 0) {
                    while ($row = $r->fetch_assoc()) {?>
                        <!-- $c = $row['id']; -->
                        <tr>
                            <td hidden="hidden"><?php echo $row['id'];?></td>
                    <td><?php echo $row['claimId'];?></td>
                    <td><?php echo $row['travelType'];?></td>
                    <td><?php echo $row['startDate'];?></td>
                    <td><?php echo $row['endDate'];?></td>
                    <td><?php echo $row['source'];?></td>
                    <td><?php echo $row['destination'];?></td>
                    <td><?php $s= $row['status'];
                            if($s==0){
                                echo "Pending for Approval";
                            }
                            else if($s==1) {
                                echo "Approved";
                            }
                            else{
                                echo "Rejected";
                            }
                        ?></td>
                    <td><?php echo $row['createdOn'];?></td>
                    <td><?php echo $row['approvedOn'];?></td>
                    <td><div class="row">
                        <div class="col-md-3">
                        <?php 
                        $s= $row['status'];
                        if($s==0){?>
                            <form action="editClaim.php" method="POST">
                                <input type="hidden" id="claimId" name="claimId" value=<?php echo $row['claimId']?> />
                                <button class="btn btn-link" type="submit" name="submit" id="submit"><i class="fa-regular fa-pen-to-square"></i></button>
                            </form>
                        <?php } ?>
                        </div>
                        <div class="col-md-3">
                        <form action="previewClaim.php" method="POST">
                        <input type="hidden" id="claimId" name="claimId" value=<?php echo $row['claimId']?> />
                        <button class="btn btn-link" type="submit" name="submit" id="submit"><i class="fa-regular fa-eye"></i></button>
                        </div>
                    
                        
                    </form>
                    </div>
                    </td>
                </tr>
                   <?php }
                }
                ?>
               

            </tbody>
        </table>
    </div>
    <script>
        new DataTable('#view', {
    order: [[0, 'desc']]
});
    </script>
</body>

</html>