<?php 
 include 'db.php';
 include 'auth.php';
 
 if(isset($_POST['submit'])){
     $count = count($_POST["transportType"]);
     
     $claimId = "clm".$_SESSION["empid"];
     $empId = $_SESSION["empid"];
     $travelType= $_POST["travelType"];
     $startDate =$_POST["startDate"];
     $endDate = $_POST["endDate"];
     $source = $_POST["source"];
     $destination = $_POST["destination"];
     $status =0;
     $travelDetail =array();
     $documents="";
     $officeOrder ="";
    for($i=0; $i<$count; $i++)
    {
        $travelDetail[$_POST["transportType"][$i].strval($i)]=$_POST["fare"][$i];
        
       $$documents = $_POST["transportType"][$i].":".$_POST["fare"][$i]." , ".$documents;
    }
    $jsonEncodedData = json_encode($travelDetail);
    //$jsonEncodedData = mysqli_real_escape_string($con, $jsonEncodedData);
    
     //$decodedData = json_decode($jsonEncodedData, true);
    $query = "INSERT INTO `travelclaim` (`claimId`, `empId`, `travelType`, `startDate`, `endDate`, `source`, `destination`, `status`, `officeOrder`, `travelDetails`, `documents`) VALUES ('$claimId','$empId','$travelType','$startDate','$endDate','$source','$destination','$status','$officeOrder','$jsonEncodedData','$documents');";
    $result = mysqli_query($con, $query);
    if ($result) {?>
        <script>
        
        alert("data added");
        </script>
 <?php   }
 else {
    
    ?>
    <script>
        alert("data not added");
    </script>
<?php } 
    
    
   
 }
?>