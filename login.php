<?php include 'config.php'?>
<?php
session_start();
        if(isset($_POST['submit'])){

            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            if (empty($Email) || empty($Password)) {
                echo "<h2>Plesae fill the empty fields.</h2>";
            } else {
                $result = mysqli_query($con, "SELECT * FROM `user` WHERE Email='$Email' && Password = '$Password'");

                if ($row = mysqli_fetch_assoc($result)) {
                    session_start();
                    $_SESSION["Email"] =  $row['Email'];
                //    echo ($_SESSION["Email"]);
                    // echo 'login';
                    $_SESSION["role"]=  $row['role'];
                    if($_SESSION["role"] == '0'){
                   header('location:profile.php');
                    }
                    else {
                        $_SESSION["admin"] = 'admin';
                        header('location:admin.php');
                    }
                } else {
                    echo "<div class='alert alert-danger'>Username and Password do not match.</h2>";
                }
            }
        }
        ?>

<?php include 'header.php'?>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                            
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="Email" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="Password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.html">Forgot Password?</a> -->
                                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                                                <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
                            <div class="text-muted">Copyright &copy; Online Consultation 2020</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
