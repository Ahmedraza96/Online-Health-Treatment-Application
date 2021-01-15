<?php

include 'config.php';

$Email = $_GET['Email'];


$record = mysqli_query($con, "SELECT * FROM `user` WHERE Email='$Email' ");
$oldtreat = mysqli_query($con, "SELECT * FROM `tblpostoldtreatment` WHERE Email='$Email' ");
$disease = mysqli_query($con, "SELECT * FROM `posthealthdetails` WHERE Email='$Email' ");

include 'header.php';

?>


<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="admin.php">OMC Consultation</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div> -->
                        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            About us
                        </a>
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div> -->
                        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a> -->
                        <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion"> -->
                            <!-- <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav> -->
                        <!-- </div> -->
                        <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a> -->
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Admin
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Patient Details</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Patient Details</li>
                    </ol>

                    <!-- user detail -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Users Detail
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Age</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        //   $_SESSION["role"]=  $row['role'];

                                        while ($row = mysqli_fetch_array($record)) {

                                        ?>
                                            <form method="post" action="view_detail.php">
                                                <tr>
                                                    <th scope="row"><input type="hidden" name="PID" value="$row['id']"><?php echo $row['id'] ?></th>
                                                    <td><input type="hidden" disabled name="Fname" value="$row['Fname']"><?php echo $row['Fname'] ?></td>
                                                    <td><input type="hidden" disabled name="Lname" value="$row['Lname']"><?php echo $row['Lname'] ?></td>
                                                    <td><input type="hidden" disabled name="Email" value="$row['Email']"><?php echo $row['Email'] ?></td>
                                                    <td><input type="hidden" disabled name="Gender" value="$row['Gender']"><?php echo $row['Gender'] ?></td>
                                                    <td><input type="hidden" disabled name="Age" value="$row['Age']"><?php echo $row['Age'] ?></td>
                                                    <!-- <td><input type="hidden" name="Pdesc" value="<?php echo $row['role'] ?>"></td> -->
                                                </tr>
                                            </form>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- old treatment Detail -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            old treatment Detail
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Medicine Name</th>
                                            <th>Symptoms</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        //   $_SESSION["role"]=  $row['role'];

                                        while ($row1 = mysqli_fetch_array($oldtreat)) {

                                        ?>
                                            <form method="post" action="view_detail.php">
                                                <tr>
                                                    <td><input type="hidden" disabled name="Gender" value="$row1['Mname']"><?php echo $row1['Mname'] ?></td>
                                                    <td><input type="hidden" disabled name="Age" value="$row['Sname']"><?php echo $row1['Sname'] ?></td>
                                                    <!-- <td><input type="hidden" name="Pdesc" value="<?php echo $row['role'] ?>"></td> -->
                                                </tr>
                                            </form>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Health Detail -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Health Detail
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Disease Name</th>
                                            <th>Symptoms</th>
                                            <th>Test Report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        //   $_SESSION["role"]=  $row['role'];

                                        while ($row2 = mysqli_fetch_array($disease)) {

                                        ?>
                                            <form method="post" action="view_detail.php">
                                                <tr>
                                                    <td><input type="hidden" disabled name="Gender" value="$row2['Dname']"><?php echo $row2['Dname'] ?></td>
                                                    <td><input type="hidden" disabled name="Age" value="$row2['Sname']"><?php echo $row2['Sname'] ?></td>
                                                    <td><input type="hidden" disabled name="file" value="$row2['file']"><a class="btn btn-primary" href="<?php echo 'uploads/'.$row2['file'] ?>">View</a></td>
                                                </tr>
                                            </form>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- suggestions -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Suggestion
                        </div>
                        <div class="card-body">

                            <!-- $_SESSION["role"]=  $row['role']; -->


                            <?php

                            if (isset($_POST['submit'])) {

                                $Doctor = $_POST['Doctor'];
                                $Suggestion = $_POST['Suggestion'];
                                $sql = mysqli_query($con, "INSERT INTO `tblsuggestion`(`Email`, `Suggestion`, `Doctor`) VALUES ('$Email', '$Suggestion', '$Doctor')");
                            }
                            ?>
                            <form method="post">

                                <div class="col-md-6 mb-5">
                                    <label for="inputState" class="form-label">Doctor</label>
                                    <select id="inputState" class="form-control" name="Doctor">
                                        <option value='select'>Select</option>
                                        <option value='Doctor 1'>Doctor 1</option>
                                        <option value='Doctor 2'>Doctor 2</option>
                                        <option value='Doctor 3'>Doctor 3</option>
                                    </select>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" name="Suggestion"></textarea>
                                </div>
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary mt-3">

                            </form>
                        </div>
                    </div>


                    <!-- traetment -->

                    <!-- suggestions -->

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Treatment Details
                        </div>
                        <div class="card-body">

                            <!-- $_SESSION["role"]=  $row['role']; -->


                            <?php

                            if (isset($_POST['treat'])) {

                                $Doctor1 = $_POST['Doctor1'];
                                $Treatment = $_POST['Treatment'];
                                $sql = mysqli_query($con, "INSERT INTO `tbltreatment`(`Email`, `Treatment`, `Doctor`) VALUES ('$Email', '$Treatment', '$Doctor1')");
                            }
                            ?>
                            <form method="post">

                                <div class="col-md-6 mb-5">
                                    <label for="inputState" class="form-label">Doctor</label>
                                    <select id="inputState" class="form-control" name="Doctor1">
                                        <option value='select'>Select</option>
                                        <option value='Doctor 1'>Doctor 1</option>
                                        <option value='Doctor 2'>Doctor 2</option>
                                        <option value='Doctor 3'>Doctor 3</option>
                                    </select>
                                </div>

                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Treatment Details" id="floatingTextarea2" style="height: 300px" name="Treatment"></textarea>
                                </div>
                                <input type="submit" value="Submit" name="treat" class="btn btn-primary mt-3">

                            </form>
                        </div>
                    </div>



                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <!-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>