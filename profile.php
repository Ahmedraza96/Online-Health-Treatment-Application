<?php include 'config.php' ?>
<?php
session_start();
?>
<?php include 'header.php' ?>

<?php

if (isset($_GET['add1'])) {

    $Email = $_SESSION["Email"];
    // $phd = $_GET['phd'];
    $Mname = $_GET['Mname'];
    $Sname = $_GET['Sname'];

    $sql = mysqli_query($con, "INSERT INTO `tblpostoldtreatment`(`Email`, `Mname`, `Sname`) VALUES ('$Email', '$Mname', '$Sname')");
    header("Location:profile.php");
}
?>

<?php


if (isset($_POST['add2'])) {

    $Email = $_SESSION["Email"];
    // $phd = $_POST['phd'];
    $Dname = $_POST['Dname'];
    $Sname = $_POST['Sname'];

    // Upload PDF Report and Image Report START
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpeg', 'png', 'jpeg', 'pdf');
    var_dump($fileName);

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 2214096) {
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNameNew;
                move_uploaded_file($fileTmp,  $fileDestination);
                $sql = mysqli_query($con, "INSERT INTO `posthealthdetails`(`Email`, `Dname`, `Sname`, `file`, `fileNameRaw`) VALUES ('$Email', '$Dname', '$Sname', '$fileNameNew', '$fileName')");
                // header("Location:profile.php");
                header("Location:profile.php");
            } else {
                echo "Your file size is too big!.";
            }
        } else {
            echo "This file type is not allowed.";
        }
    }
    // Upload PDF Report and Image Report END

    // $sql = mysqli_query($con, "INSERT INTO `posthealthdetails`(`Email`, `Dname`, `Sname`) VALUES ('$Email', '$Dname', '$Sname')");
    // header("Location:profile.php");
}
if(isset($_SESSION["Email"])){

?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var html =
            '<tr><td><input type="text" name="Fname" required></td><td><input type="text" name="Lname" required></td><td><button type="button" class="btn btn-danger" name="remove" id="remove" value="remove">Remove</button></td></tr>'
        var x = 1;
        var max = 0;
        $("#add").click(function() {
            if (x <= max) {
                $("#table_field").append(html);
                x++;
            }
        });

        $("#table_field").on('click', '#remove', function() {
            $(this).closest('tr').remove();
            x--;
        });
    });
</script>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <h3 class="text-center"><a href="logout.php" style="color:#fff !important">Logout</a></h3>
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Post Personal Details</h3>

                                </div>
                                <div class="card-body">
                                    <!-- TABLE VIEW DATA START  -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Age</th>
                                                <!-- <th scope="col">Role</th> -->

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $Email = $_SESSION["Email"];

                                            //   $_SESSION["role"]=  $row['role'];
                                            $sql = mysqli_query($con, "SELECT * FROM `user` WHERE Email='$Email'");

                                            while ($row = mysqli_fetch_array($sql)) {

                                            ?>
                                                <form method="get" action="">
                                                    <tr>
                                                        <!-- <th scope="row"><input type="hidden" name="PID"><?php echo $row['id'] ?></th> -->

                                                        <td><input type="text" disabled name="Fname" value="<?php echo $row['Fname'] ?>"></td>
                                                        <td><input type="text" disabled name="Lname" value="<?php echo $row['Lname'] ?>"></td>
                                                        <td><input type="text" disabled name="Email" value="<?php echo $row['Email'] ?>"></td>
                                                        <td><input type="text" disabled name="Gender" value="<?php echo $row['Gender'] ?>"></td>
                                                        <td><input type="text" disabled name="Age" value="<?php echo $row['Age'] ?>"></td>
                                                        <td><input type="hidden" name="Pdesc" value="<?php echo $row['role'] ?>"></td>

                                                    </tr>
                                                </form>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- TABLE VIEW DATA END -->

                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <!-- SECTION 1 END  -->

            <!-- SECTION 2 START  -->

            <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Post Old Treatment Details</h3>
                                </div>
                                <div class="card-body">
                                    <!-- TABLE VIEW DATA START  -->
                                    <table class="table" id="table_field">
                                        <thead>
                                            <tr>
                                                <th scope="col">Medicines Name</th>
                                                <th scope="col">Symptoms of health</th>
                                                <th scope="col">Add or Remove</th>
                                            </tr>

                                        </thead>
                                        <?php

                                        //   $_SESSION["role"]=  $row['role'];
                                        $Email = $_SESSION["Email"];
                                        $oldtreat = mysqli_query($con, "SELECT * FROM `tblpostoldtreatment` WHERE Email='$Email' ");

                                        while ($row3 = mysqli_fetch_array($oldtreat)) {

                                        ?>
                                            <form method="get">
                                                <tr>
                                                    <td><input type="hidden" disabled name="Gender" value="$row['Gender']"><?php echo $row3['Mname'] ?></td>
                                                    <td><input type="hidden" disabled name="Age" value="$row['Age']"><?php echo $row3['Sname'] ?></td>
                                                    <!-- <td><input type="submit" name="view" class="btn btn-primary" value="Update"></td> -->
                                                    <!-- <td><input type="submit" name="view" class="btn btn-danger" value="Delete"></td> -->
                                                    <td><a href="delete.php?MID=<?php echo $row3['MID'] ?>" class="btn btn-danger">Delete</a></td>
                                                </tr>
                                            </form>
                                        <?php
                                        }
                                        ?>


                                        <tbody>

                                            <form method="get" action="">
                                                <tr>


                                                    <td><input type="text" name="Mname" required></td>
                                                    <td><input type="text" name="Sname" required></td>
                                                    <td><button type="submit" class="btn btn-warning" name="add1" id="add1" value="Add">Add</button></td>


                                                </tr>

                                        </tbody>
                                    </table>
                                    <!-- <center>
                                        <input class="btn btn-success" type="submit" name="save" id="save" value="Save">
                                    </center> -->

                                    </form>
                                    <!-- TABLE VIEW DATA END -->

                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <!-- SECTION 2 END -->

            <!-- SECTION 3 START  -->

            <main>
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Post Health Details</h3>
                                </div>
                                <div class="card-body">
                                    <!-- TABLE VIEW DATA START  -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Disease Name</th>
                                                <th scope="col">Symptoms of health</th>
                                                <th scope="col">Report</th>
                                                <th scope="col">Add or Remove</th>
                                                <!-- <th scope="col">Update</th>
                                                <th scope="col">Delete</th> -->


                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            //   $_SESSION["role"]=  $row['role'];
                                            $Email = $_SESSION["Email"];
                                            $disease = mysqli_query($con, "SELECT * FROM `posthealthdetails` WHERE Email='$Email' ");

                                            while ($row2 = mysqli_fetch_array($disease)) {

                                            ?>
                                                <form method="get" action="">
                                                    <tr>
                                                        <td><input type="hidden" disabled name="Gender" value="$row['Gender']"><?php echo $row2['Dname'] ?></td>
                                                        <td><input type="hidden" disabled name="Age" value="$row['Age']"><?php echo $row2['Sname'] ?></td>
                                                        <td><input type="hidden" disabled name="file" value="$row['file']"><?php echo $row2['fileNameRaw'] ?></td>
                                                        <td><a href="deleteH.php?phd=<?php echo $row2['phd'] ?>" class="btn btn-danger">Delete</a></td>
                                                        
                                                    </tr>
                                                </form>
                                            <?php
                                            }
                                            ?>


                                            <form method="post" enctype="multipart/form-data">
                                                <tr>
                                                   

                                                    <td><input type="text" name="Dname" required></td>
                                                    <td><input type="text" name="Sname" required></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control" name="file" required>
                                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                                        </div>
                                                    </td>
                                                    <td><input type="submit" value="Add" name="add2" class="btn btn-warning"></td>
                                                    <!-- <td><button type="button" class="btn btn-warning">Update</button> </td>-->




                                                </tr>
                                            </form>
                                            <?php
                                            // }
                                            ?>
                                        </tbody>
                                    </table>
                                    <!-- TABLE VIEW DATA END -->

                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <!-- SECTION 3 END -->

            <!-- Section 4 Start -->
            <main>
                <?php

                $Email = $_SESSION["Email"];

                $record = mysqli_query($con, "SELECT * FROM `tblsuggestion` WHERE Email='$Email' ");

                $row1 = mysqli_fetch_array($record)
                ?>
                <div class="container-fluid mb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Doctors Suggestion</h3>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <?php
                                        echo ($row1['Suggestion'])
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <!-- SECTION 4 END -->

            <!-- Section 5 Start -->
            <main>
                <?php

                $Email = $_SESSION["Email"];

                $record2 = mysqli_query($con, "SELECT * FROM `tbltreatment` WHERE Email='$Email' ");

                $row2 = mysqli_fetch_array($record2)
                ?>
                <div class="container-fluid mb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Treatment Details provided by Doctor </h3>
                                </div>
                                <div class="card-body">
                                    <p>
                                        <?php
                                        echo ($row2['Treatment'])
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </main>

            <!-- SECTION 5 END -->



        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>



    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>

    <!-- PHP CODE FOR REGISTER START -->


    <!-- PHP CODE FOR REGISTER END -->
</body>

</html>

<?php
}

else {
    header("Location:login.php");
  }
?>