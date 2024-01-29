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
        .btn-link {
    --bs-btn-color: red;
    --bs-btn-hover-color: tomato;
    --bs-btn-active-color: red;
        }
        #body-pd {
            background-image: linear-gradient( 58.2deg,  rgba(40,91,212,0.73) -3%, rgba(171,53,163,0.45) 49.3%, rgba(255,204,112,0.37) 97.7% );
            height: 100% !important;
        }
    </style>
</head>

<body id="body-pd">
    <?php include("sidebar.php") ?>
    <div class="container mb-5" style="margin-top:8%">
        <div class="card">
            <div class="container mt-3">
                <h2 style="text-align: center;">Edit your claim <b> Claim ID : <?php echo $_POST["claimId"] ?></b></h2>
            </div>
            <?php
            $e =$_POST["claimId"];
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
            }
        }
            ?>
            <form class="container p-5" method="POST" action="editSubmit.php" enctype="multipart/form-data">
            <input type="hidden" value ="<?php echo $e; ?>" id ="claimid" name="claimid">    
            <div class="form-group p-2">
                    <label for="exampleInputEmail1">Travel Type</label>
                    <select name="travelType" class="form-control" id="travelType">
                        <option value=""> Select Your Travel Type</option>
                        <option value="Domestic trip" <?php if($travelType=="Domestic trip") echo "selected"; ?>>Domestic trip</option>
                        <option value="Foreign Trip" <?php if($travelType=="Foreign Trip") echo "selected"; ?>>Foreign Trip</option>
                        <option value="Medical" <?php if($travelType=="Medical") echo "selected"; ?>>Medical</option>
                        <option value="Relocation / Transfer" <?php if($travelType=="Relocation / Transfer") echo "selected"; ?>>Relocation / Transfer</option>
                    </select>
                </div>
                <div class="form-group row p-2">
                    <div class="form-group col">
                        <label for="exampleInputEmail1" >Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start date" max="<?php echo date('Y-m-d') ?>" value = "<?php echo $startDate; ?>">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Enter email" max="<?php echo date('Y-m-d') ?>" value = "<?php echo $endDate; ?>">
                    </div>
                </div>
                <!-- <div class="form-group row p-2">
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Source</label>
                        <input type="text" class="form-control" id="source" name="source" placeholder="Start date" value = "<?php echo $source; ?>">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" placeholder="End date" value = "<?php echo $destination; ?>">
                    </div>
                </div> -->
                <div class="form-group row p-2">
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Source</label>
                        <select class="form-control" id="source" name="source">
                            <option values=''>Select Source</option>
                        <?php
                           $e = $_SESSION['empid'];
                           $q = "Select `name` from `projectlist` order by `name`;";
                           $r = mysqli_query($con, $q);
                      
                           if ($r->num_rows > 0) {
                               while ($row = $r->fetch_assoc()) {
                                ?> 
                                    <option values='<?php if($source==$row['name']) echo "selected";?>'><?php echo $row['name']?></option>
                                    <!-- <?php if($travelType=="Domestic trip") echo "selected"; ?> -->
                                <?php
                               }
                           }
                        ?>
                            
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Destination</label>
                        <select class="form-control" id="destination" name="destination">
                            <option values=''>Select Destination</option>
                        <?php
                           $e = $_SESSION['empid'];
                           $q = "Select `name` from `projectlist` order by `name`;";
                           $r = mysqli_query($con, $q);
                      
                           if ($r->num_rows > 0) {
                               while ($row = $r->fetch_assoc()) {
                                ?> 
                                    <option values='<?php echo $row['name']?>'><?php echo $row['name']?></option>
                                <?php
                               }
                           }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group p-2">
                    <label for="receipt">Upload office order</label>
                    <?php $parts = explode("/", $officeOrder); ?>
                    <input type="file" class="form-control-file" id="document" name="officeOrder" accept=".pdf" value = "http://localhost/BasicWebsite/<?php echo $officeOrder; ?>">
                    <a href="<?php echo $officeOrder ?>" target="_blank"> <?php echo $parts[1]; ?> </a>
                </div>
                <div id="request">
                    <div class="form-group row p-2">
                        <div class="col">
                            <h3>Travel Details</h3>
                        </div>
                        <div class="form-group col">
                            <button type="button" name="add" id="add" class="btn btn-success" style="float: right;">Add More</button>
                        </div>
                    </div>
                    <div class="item">
                        <?php 
                            $decodedData = json_decode($travelDetails, true);
                            $arr = explode(';', $documents);
                            $i = 0;
                            $j=1;
                            foreach ($decodedData as $key => $value) {
                                $tt = substr($key, 0, -1);
                        ?>
                        <div class="item<?= $i ?>">
                        <div class="form-group p-2">
                            <label for="transportType">Transport type</label>
                            <select name="transportType[]" class="form-control" id="travelType">
                                <option value=""> Select Your Transport Type</option>
                                <option value="Auto" <?php if($tt == "Auto") echo "selected"; ?>>Auto</option>
                                <option value="train" <?php if($tt == "train") echo "selected"; ?>>Railway</option>
                                <option value="airplane" <?php if($tt == "airplane") echo "selected"; ?>>Airplane</option>
                            </select>
                        </div>

                        <div class="form-group row p-2">
                            <div class="form-group col">
                                <label for="fare">Fare</label>
                                <input type="text" class="form-control" id="fare" name="fare[]" placeholder="fare" value="<?php echo $value; ?>">
                            </div>
                            <?php
                             $arr = explode(';', $documents); ?>
                            <div class="form-group col p-4">
                                <label for="receipt">Upload Document</label>
                                <input type="file" class="form-control-file" id="document" name="document[]" value ="C:/xampp/htdocs/BasicWebsite/<?= $documents[$i];?>" accept=".pdf">
                            </div>
                            
                             <a href="<?php echo $arr[$i];?>">
                             <?php
                             $parts = explode("/", $arr[$i]);
                             echo $parts["1"]; 
                              ?>
                             </a>
                            
                        </div>
                        <button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-link ubtn_remove col-sm-2 m-3"><i class="fa-solid fa-circle-minus fa-xl"></i></button>
                        <?php $i++; } ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit" style="float: right;">Submit</button>
                    </div>
                </div>
                
            </form>
            
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        var i = <?php echo $i ; ?> ;
        $('#add').click(function() {
            i++;
            //$('#request').append('<tr id="row' + i + '"><td> <select name="transportType[]" class="form-control" id="travelType"><option value=""> Select Your Transport Type</option><option value="Auto">Auto</option><option value="train">Railway</option><option value="airplane">Airplane</option></select><input type="text" name="fare[]" placeholder="Enter fare" class="form-control name_list" /></td><td> <input type="file" class="form-control-file" id="document" name ="document[]" accept=".pdf"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            $('#request').append('<div class="item' + i +'"><div class="form-group p-2"><label for="transportType">Transport type</label><select name="transportType[]" class="form-control" id="travelType"><option value=""> Select Your Transport Type</option><option value="Auto">Auto</option><option value="train">Railway</option><option value="airplane">Airplane</option></select></div><div class="form-group row p-2"><div class="form-group col"><label for="fare">Fare</label><input type="text" class="form-control" id="fare" name="fare[]" placeholder="fare"></div><div class="form-group col p-4"><label for="receipt">Upload document</label><input type="file" class="form-control-file" id="document" name="document[]" accept=".pdf"></div><button type="button" name="remove" id="' + i + '" class="btn btn-link btn_remove col-sm-2 m-3"><i class="fa-solid fa-circle-minus fa-xl"></i></button></div></div>');
        });

        $(document).on('click', '.ubtn_remove', function() {       
            $('.item'+i+'').remove();
            i--;
        });

        $(document).on('click', '.btn_remove', function() {       
            var button_id = $(this).attr("id");
            $('.item' + button_id + '').remove();
        });
    });
</script>

</html>