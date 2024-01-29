<?php 
 include 'db.php';
 include 'auth.php';
 
 if(isset($_POST['submit'])){

     $count = count($_POST["transportType"]);
     
     $claimId = $_POST["claimid"];
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
    
    $query = "SELECT * FROM `user` WHERE `region`='$region' and `isro`='$isro'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $roid = 0;
    if ($numrows == 1) {
        $roid = $row['empid'];
    }

    $e = $_POST['claimid'];
        $q = "Select * from `travelclaim` where `claimId` = '$e';";
        $r = mysqli_query($con, $q);
        $or="";
        $documents="";
        if ($r->num_rows > 0) {
            while ($row = $r->fetch_assoc()) {
                
                $or = $row['officeOrder'];
                $documents = $row['documents'];
            }
        }
        else{
            echo "no data";
        }

    $m = basename($_FILES["officeOrder"]["name"]);
    if($m == ""){
        //echo "previous filr taken";
        $officeOrder= $or;
    }
    else{
    $officeOrder = $target_dir.$m;
    if (move_uploaded_file($_FILES["officeOrder"]["tmp_name"], $officeOrder)) {
        echo "The file " . $m . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    for($i=0; $i<$count; $i++)
    {
        $travelDetail[$_POST["transportType"][$i].strval($i)]=$_POST["fare"][$i];
    }
    $des1 = "travelDetail/";

    for($i = 0;$i<$count;$i++){
        $arr = explode(';', $documents);
        if(basename($_FILES["document"]["name"][$i])==""){
            // if($i==0){
            //     $allDoc = $arr[$i];
            // }
            // else{
            //     $allDoc = $allDoc.";".$arr[$i];
            // }
            if($i==0){
                $allDoc = $arr[$i];
            }
            else{
                $allDoc = $allDoc.";".$arr[$i];
            }
            
            
        }
        else{
            if($i==0){
                $allDoc = $des1.basename($_FILES["document"]["name"][$i]);
            }
            else{
                $docname = $des1.basename($_FILES["document"]["name"][$i]);
                $allDoc = $allDoc.";".$docname;
            }
            // $allDoc = $allDoc.";".basename($_FILES["document"]["name"][$i]);
            // $docname = $des1.basename($_FILES["document"]["name"][$i]);
            // $allDoc = $docname.";".$allDoc;
            if (move_uploaded_file($_FILES["document"]["tmp_name"][$i], $docname)) {
                echo "The file " . basename($_FILES["document"]["name"][$i]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
        }
    }

    // $a = basename($_FILES["document"]["name"][0]);
    // if($a==""){
    //     $allDoc=$documents;
    // }
    // else{
    // for($i = 0;$i <$count;$i++){
    //     $docname = $des1.basename($_FILES["document"]["name"][$i]);
    //     $allDoc = $docname.";".$allDoc;
    //     if (move_uploaded_file($_FILES["document"]["tmp_name"][$i], $docname)) {
    //         echo "The file " . basename($_FILES["document"]["name"][$i]) . " has been uploaded.";
    //         } else {
    //             echo "Sorry, there was an error uploading your file.";
    //         }
    
     }

    $jsonEncodedData = json_encode($travelDetail);
    //$jsonEncodedData = mysqli_real_escape_string($con, $jsonEncodedData);
    
     //$decodedData = json_decode($jsonEncodedData, true);
     
     echo $jsonEncodedData;
     echo $officeOrder;
     echo $allDoc;
    //$query = "UPDATE `travelclaim`  SET (`claimId`, `empId`, `travelType`, `startDate`, `endDate`, `source`, `destination`, `status`, `officeOrder`, `travelDetails`, `documents`,`approver`,`createdOn`) VALUES ('$claimId','$empId','$travelType','$startDate','$endDate','$source','$destination','$status','$officeOrder','$jsonEncodedData','$allDoc','$roid',CURRENT_DATE);";
    
    $query = "UPDATE `travelclaim` SET `travelType` = '$travelType', `startDate` = '$startDate', `endDate` = '$endDate', `source` = '$source', `destination` = '$destination', `status` = '$status', `officeOrder` = '$officeOrder', `travelDetails` = '$jsonEncodedData', `documents` = '$allDoc', `approver` = '$roid', `createdOn` = CURRENT_DATE WHERE `claimId` = '$claimId'";
    if ($con->query($query) === TRUE) { ?>
        <script>alert("Record updated successfully");
        window.location = 'viewClaims.php';
        </script> <?php
        // header("Location:viewClaims.php");
    } else {
        echo "Error updating record: " . $con->error;
    }
    
    
   
 
?>