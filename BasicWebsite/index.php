<?php include 'db.php';
session_start();
include 'reportingOfficer.php';
if (isset($_SESSION['empid'])) {
    // Redirect to another page (e.g., home page)
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title>My Web Page</title>
    <link rel="shortcut icon" href="images/logo.png">
    <?php include 'includes/bootstrap.php'; ?>
    <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
    <style>
        
    </style>
</head>

<body>
    <div class="container-fluid row mt-5" style="padding-top: 10%;padding-left: 10%">
        <div class="col-sm-6" style="padding-top: 8%;">
            <div class="card" style="background: transparent;border: none; color: whitesmoke">
                <div class="card-body">
                    <h1 class="card-title">Claim your Travel Expenses</h1>
                    <h3 class="card-text">With Ease.</h3>
                    <a href="includes\TA_Rules.pdf" class="btn btn-primary mt-5 btn-lg" target="_blank">View Policy</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="container-fluid" style="padding-left: 25%;">
                <div class="card-container" style="opacity: 0.8">
                    <div class="card" id="card">
                        <!-- Login Form (Front) -->
                        <div class="card-face front">

                            <div class="form-container">
                                <div style="margin-top: -20%;">
                                    <img src="images\logo.png" height="75px" />
                                </div>
                                <div class="mt-5">
                                    <h2 class="card-title text-white">Login</h2>
                                    <form id="loginForm" action="login.php" method="POST">
                                        <input type="text" class="form-control" name="empid" placeholder="Employee Id" required>
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
                                    <p class="mt-5 toggle-link" onclick="flipCard()" style="padding-top: 5%">Don't have an account? Sign Up</p>
                                </div>

                            </div>
                        </div>


                        <div class="card-face back">
                            <div class="form-container">
                                <h2 class="card-title text-white">Sign Up</h2>
                                <form id="signupForm" onsubmit="validateSignupForm(event)" action="register.php" method="POST">
                                    <input type="text" class="form-control" id="empid" name="empid" placeholder="Employee Id" required>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    <div class="row">
                                        <div class="col-sm-4"><label for="referenceType" class="form-label text-white" style="float:left">Gender</label><br /></div>
                                        <div class="col-sm-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="M" onchange="activateEmpNo(this)" checked>
                                                <label class="form-check-label text-white mb-2" for="employeeSpecific">Male</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="gender" value="F" onchange="activateEmpNo(this)">
                                                <label class="form-check-label text-white mb-2" for="general">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>

                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <!-- <input type="text" class="form-control" id="region" name="region" placeholder="Region" required>
                                        <input type="text" class="form-control" id="reportingofficer" name="reportingofficer" placeholder="Reporting Officer ID" required>-->
                                    <select name="region" class="form-control" id="region">
                                        <option value=""> Select Your Region</option>
                                        <?php
                                        $query = "select * from region";
                                        $result = $con->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="reportingofficer" class="form-control mt-2" id="ro">
                                        <option value="">Select Your Reporting officer</option>
                                    </select>
                                    <button type="submit" class="btn btn-success mt-2">Sign Up</button>
                                </form>
                                <p class="mt-3 toggle-link text-black" onclick="flipCard()">Already have an account? Login</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<script>
    function flipCard() {
        const card = document.getElementById('card');
        card.classList.toggle('flipped');
    }

    //    document.getElementById('loginForm').addEventListener('submit', function (e) {
    //        e.preventDefault();
    //        window.location.replace('dashboard.php');
    //    });

    function validateSignupForm(event) {
        const name = document.getElementById('name').value.trim();
        const mobileNumber = document.getElementById('mobileNumber').value.trim();
        const password = document.getElementById('password').value.trim();
        const email = document.getElementById('email').value.trim();
        const region = document.getElementById('region').value.trim();
        const reportingOfficerId = document.getElementById('reportingOfficerId').value.trim();

        let isValid = true;

        // Basic validations (non-empty fields)
        if (!name || !mobileNumber || !password || !email || !region || !reportingOfficerId) {
            isValid = false;
            alert('All fields are required.');
        }

        if (isValid) {
            // Additional validations can be added here
            alert('Signup form submitted.');

        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    }
</script>
<script>
    $(document).ready(function() {
        $("#region").on('change', function() {
            var region = $(this).val();

            $.ajax({
                method: "POST",
                url: "reportingOfficer.php",
                data: {
                    id: region
                },
                datatype: "html",
                success: function(data) {
                    $("#ro").html(data);

                }
            });
        });
    });
</script>

</html>