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
    </head>
    <body>
        <?php include("header.php") ?>
        <div class="container">
            <h2 style="text-align: center;">Create your Claim</h2>
        </div>
        <form class="container" method="POST" action="claimSubmit.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Travel Type</label>
                <select name="travelType" class="form-control" id="travelType">
                    <option value=""> Select Your Travel Type</option>
                    <option value="Domestic trip">Domestic trip</option>
                    <option value="Foreign Trip">Foreign Trip</option>
                    <option value="Medical">Medical</option>
                    <option value="Relocation / Transfer">Relocation / Transfer</option>
                </select>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="exampleInputEmail1">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" placeholder="Start date">
                </div>
                <div class="form-group col">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="endDate"  placeholder="Enter email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="exampleInputEmail1">Source</label>
                    <input type="text" class="form-control" id="source" name="source" placeholder="Start date">
                </div>
                <div class="form-group col">
                    <label for="exampleInputEmail1">Destination</label>
                    <input type="text" class="form-control" id="destination" name="destination"  placeholder="End date">
                </div>
            </div>
            <div class="form-group">
                    <label for="receipt">Enter office order</label>
                    <input type="file" class="form-control-file" id="document" name ="officeOrder" accept=".pdf">
                </div>
            <div id="request">
            <div class="row">
            <div class="col">
                <h3>Travel Details</h3>
            </div>
                 <div class="form-group col">
                    <label for="exampleInputEmail1">Add More</label>
                    <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                </div>
                </div>
            <div class="form-group">
                <label for="transportType">Transport type</label>
                <select name="transportType[]" class="form-control" id="travelType">
                    <option value=""> Select Your Transport Type</option>
                    <option value="Auto">Auto</option>
                    <option value="train">Railway</option>
                    <option value="airplane">Airplane</option>
                </select>
            </div>
           
            <div class="row">
                <div class="form-group col">
                    <label for="fare">Fare</label>
                    <input type="text" class="form-control" id="fare" name="fare[]"  placeholder="fare">
                </div>
                <div class="form-group col">
                    <label for="receipt">Enter document</label>
                    <input type="file" class="form-control-file" id="document" name ="document[]" accept=".pdf">
                </div>
            </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </form>
    </body>
    <script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){
i++;
$('#request').append('<tr id="row'+i+'"><td> <select name="transportType[]" class="form-control" id="travelType"><option value=""> Select Your Transport Type</option><option value="Auto">Auto</option><option value="train">Railway</option><option value="airplane">Airplane</option></select><input type="text" name="fare[]" placeholder="Enter fare" class="form-control name_list" /></td><td> <input type="file" class="form-control-file" id="document" name ="document[]" accept=".pdf"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
});
	
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>
</html>
