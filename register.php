<?php include 'config.php' ?>
<?php

if (isset($_POST['submit'])) {
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    // $Password = md5($_POST['Password']);
    $Password = $_POST['Password'];
    $Gender =$_POST['Gender'];
    $Age = $_POST['Age'];
    // $CPassword = md5($_POST['CPassword']);
    $CPassword = $_POST['CPassword'];
    $role = $_POST['role'];
    if (empty($Fname) | empty($Lname) | empty($Email) | empty($Password) | empty($CPassword)) {
        echo '<div class="alert alert-danger">Please insert all required information.</div>';
    } else {
        $sql = mysqli_query($con, "INSERT INTO `user`(`Fname`, `Lname`, `Email`, `Password`, `role`, `Gender` , `Age`) VALUES ('$Fname', '$Lname', '$Email','$Password', '0', '$Gender' , '$Age')");

        header('location:login.php');
    }
}
?>
<?php include 'header.php' ?>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                                    <input name="Fname" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                                    <input name="Lname" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <label for="inputState" class="form-label">Gender</label>
                                                <select id="inputState" class="form-control" name="Gender" required>
                                                    <option selected value='Male'>Male</option>
                                                    <option value='Female'>Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Age</label>
                                                    <input name="Age" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter your age" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input name="Email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" required />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input name="Password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" required />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                    <input name="CPassword" class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><input type="submit" name="submit" class="btn btn-primary btn-block" value="Create Account"></div>
                                        <div class="form-group">

                                            <input name="role" class="form-control py-4" id="role" type="hidden" aria-describedby="emailHelp" placeholder="Enter email address" />
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <!-- PHP CODE FOR REGISTER START -->


    <!-- PHP CODE FOR REGISTER END -->
</body>

</html>