<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Web Page</title>
        <?php include 'includes/bootstrap.php'; ?>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div class="container-fluid row mt-5" style="padding-top: 10%;padding-left: 10%">
            <div class="col-sm-6">
                <div class="card" style="background: transparent;border: none; color: whitesmoke">
                    <div class="card-body">
                        <h1 class="card-title">Claim your Travel Expenses</h1>
                        <h3 class="card-text">With Ease.</h3>
                        <a href="#" class="btn btn-primary mt-5 btn-lg">View Policy</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container" style="padding-left: 25%;opacity: 0.8;">
                    <div class="card-container">
                        <div class="card" id="card">
                            <!-- Login Form (Front) -->
                            <div class="card-face front">
                                <div class="form-container">
                                    <h5 class="card-title text-white">Login</h5>
                                    <form id="loginForm">
                                        <input type="text" class="form-control" placeholder="Username" required>
                                        <input type="password" class="form-control" placeholder="Password" required>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
                                    <p class="mt-3 toggle-link" onclick="flipCard()">Don't have an account? Sign Up</p>
                                </div>
                            </div>

                            <!-- Signup Form (Back) -->
                            <div class="card-face back">
                                <div class="form-container">
                                    <h5 class="card-title text-white">Sign Up</h5>
                                    <form id="signupForm" onsubmit="validateSignupForm(event)">
                                        <input type="text" class="form-control" id="name" placeholder="Name" required>
                                        <input type="text" class="form-control" id="mobileNumber" placeholder="Mobile Number" required>
                                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                                        <input type="text" class="form-control" id="region" placeholder="Region" required>
                                        <input type="text" class="form-control" id="reportingOfficerId" placeholder="Reporting Officer ID" required>
                                        <button type="submit" class="btn btn-success">Sign Up</button>
                                    </form>
                                    <p class="mt-3 toggle-link" onclick="flipCard()">Already have an account? Login</p>
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

    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();
        alert('Login form submitted.');
    });

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
</html>
