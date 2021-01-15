<?php
include 'config.php';

$phd = $_GET['phd'];
mysqli_query($con, "DELETE FROM `posthealthdetails` WHERE phd = '$phd'");
header("Location:profile.php");
?>