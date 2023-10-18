<?php
include 'dbcon.php';
$pid = $_GET["PID"];
$sname = $_GET["StudentName"];
$year = $_GET["Year"];
$gprgrm = $_GET["GraduatedProgram"];
$ename = $_GET["EmployerName"];
$pay = $_GET["PayPackage"];
$scon = $_GET["Scontact"];
$econ = $_GET["Econtact"];
$sql = "UPDATE placement
SET StudentName = '$sname', Year= $year, GraduatedProgram='$gprgrm', EmployerName='$ename', PayPackage=$pay, Scontact='$scon', Econtact='$econ'
WHERE PID = $pid";

if (mysqli_query($conn, $sql)) {
  header("location:../users/tableuserplace.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>