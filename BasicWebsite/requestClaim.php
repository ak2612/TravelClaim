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
            background-image: radial-gradient(circle 311px at 8.6% 27.9%, rgba(62, 147, 252, 0.57) 12.9%, rgba(239, 183, 192, 0.44) 91.2%);
        }
    </style>
</head>

<body id="body-pd">
    <?php include("sidebar.php") ?>
    <div class="container" style="margin-top:8%">
        <div class="card">
            <div class="container mt-3">
                <h2 style="text-align: center;">Create your Claim</h2>
            </div>
            <form class="container p-5" method="POST" action="claimSubmit.php" enctype="multipart/form-data">
                <div class="form-group p-2">
                    <label for="exampleInputEmail1">Travel Type</label>
                    <select name="travelType" class="form-control" id="travelType">
                        <option value=""> Select Your Travel Type</option>
                        <option value="Domestic trip">Domestic trip</option>
                        <option value="Foreign Trip">Foreign Trip</option>
                        <option value="Medical">Medical</option>
                        <option value="Relocation / Transfer">Relocation / Transfer</option>
                    </select>
                </div>
                <div class="form-group row p-2">
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start date" max="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" placeholder="Enter email" max="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
                <!-- <div class="form-group row p-2">
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Source</label>
                        <input type="text" class="form-control" id="source" name="source" placeholder="Start date">
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputEmail1">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" placeholder="End date">
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
                                    <option values='<?php echo $row['name']?>'><?php echo $row['name']?></option>
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
                    <input type="file" class="form-control-file" id="document" name="officeOrder" accept=".pdf">
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
                        <div class="form-group p-2">
                            <label for="transportType">Transport type</label>
                            <select name="transportType[]" class="form-control" id="travelType">
                                <option value=""> Select Your Transport Type</option>
                                <option value="Auto">Auto</option>
                                <option value="train">Railway</option>
                                <option value="airplane">Airplane</option>
                            </select>
                        </div>

                        <div class="form-group row p-2">
                            <div class="form-group col">
                                <label for="fare">Fare</label>
                                <input type="text" class="form-control" id="fare" name="fare[]" placeholder="fare">
                            </div>
                            <div class="form-group col p-4">
                                <label for="receipt">Upload Document</label>
                                <input type="file" class="form-control-file" id="document" name="document[]" accept=".pdf">
                            </div>
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
        var i = 1;
        $('#add').click(function() {
            i++;
            //$('#request').append('<tr id="row' + i + '"><td> <select name="transportType[]" class="form-control" id="travelType"><option value=""> Select Your Transport Type</option><option value="Auto">Auto</option><option value="train">Railway</option><option value="airplane">Airplane</option></select><input type="text" name="fare[]" placeholder="Enter fare" class="form-control name_list" /></td><td> <input type="file" class="form-control-file" id="document" name ="document[]" accept=".pdf"></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            $('#request').append('<div class="item' + i + '"><div class="form-group p-2"><label for="transportType">Transport type</label><select name="transportType[]" class="form-control" id="travelType"><option value=""> Select Your Transport Type</option><option value="Auto">Auto</option><option value="train">Railway</option><option value="airplane">Airplane</option></select></div><div class="form-group row p-2"><div class="form-group col"><label for="fare">Fare</label><input type="text" class="form-control" id="fare" name="fare[]" placeholder="fare"></div><div class="form-group col p-4"><label for="receipt">Upload document</label><input type="file" class="form-control-file" id="document" name="document[]" accept=".pdf"></div><button type="button" name="remove" id="' + i + '" class="btn btn-link btn_remove col-sm-2 m-3"><i class="fa-solid fa-circle-minus fa-xl"></i></button></div></div>');
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('.item' + button_id + '').remove();
        });
    });
</script>

</html>