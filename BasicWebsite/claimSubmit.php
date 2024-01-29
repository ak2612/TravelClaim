<?php 
 include 'db.php';
 include 'auth.php';
 
 if(isset($_POST['submit'])){

    $q = "Select * from `travelclaim`";
    $r = mysqli_query($con, $q);
    $c = 0;
    if($r->num_rows>0){
        while($row = $r->fetch_assoc()){
            $c = $row['id'];
        }

    }

    $c = $c+1;
     $count = count($_POST["transportType"]);
     
     $claimId = "clm".$c;
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
     $allDoc = "";
     $isro = 1;
    $region = $_SESSION['region'];
    $target_dir = "officeOrder/";
    $officeOrder = $target_dir.basename($_FILES["officeOrder"]["name"]);
    $query = "SELECT * FROM `user` WHERE `region`='$region' and `isro`='$isro'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $roid = 0;
    if ($numrows == 1) {
        $roid = $row['empid'];
    }
    if (move_uploaded_file($_FILES["officeOrder"]["tmp_name"], $officeOrder)) {
        echo "The file " . basename($_FILES["officeOrder"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }

    for($i=0; $i<$count; $i++)
    {
        $travelDetail[$_POST["transportType"][$i].strval($i)]=$_POST["fare"][$i];
    }
    $des1 = "travelDetail/";
    for($i = 0;$i <$count;$i++){
        if($i==0){
            $allDoc = $des1.basename($_FILES["document"]["name"][$i]);
        }
        else{
            $docname = $des1.basename($_FILES["document"]["name"][$i]);
            $allDoc = $allDoc.";".$docname;
        }
        if (move_uploaded_file($_FILES["document"]["tmp_name"][$i], $docname)) {
            echo "The file " . basename($_FILES["document"]["name"][$i]) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
    
    }
    $jsonEncodedData = json_encode($travelDetail);
    //$jsonEncodedData = mysqli_real_escape_string($con, $jsonEncodedData);
    
     //$decodedData = json_decode($jsonEncodedData, true);
    $query = "INSERT INTO `travelclaim` (`claimId`, `empId`, `travelType`, `startDate`, `endDate`, `source`, `destination`, `status`, `officeOrder`, `travelDetails`, `documents`,`approver`,`createdOn`) VALUES ('$claimId','$empId','$travelType','$startDate','$endDate','$source','$destination','$status','$officeOrder','$jsonEncodedData','$allDoc','$roid',CURRENT_DATE);";
    $result = mysqli_query($con, $query);
    if ($result) {?>
        <script>
        
        alert("data added");
        </script>
 <?php  
header("Location:dashboard.php"); 
}
 else {
    
    ?>
    <script>
        alert("data not added");
    </script>
<?php } 
    
    
   
 }
?>