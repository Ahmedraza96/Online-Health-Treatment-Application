<?php
include 'config.php';

$MID = $_GET['MID'];
mysqli_query($con, "DELETE FROM `tblpostoldtreatment` WHERE MID = '$MID'");
header("Location:profile.php");
?>