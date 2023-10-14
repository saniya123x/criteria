<?php
session_start();
include 'dbcon.php';
$sname = $_POST["StudentName"];
$year = $_POST["Year"];
$gprgrm = $_POST["GraduatedProgram"];
$ename = $_POST["EmployerName"];
$pay = $_POST["PayPackage"];
$scon = $_POST["Scontact"];
$econ = $_POST["Econtact"];
//$did = $_POST["did"];
$did= $_SESSION['did'];
$sql = "INSERT INTO placement (StudentName,Year,GraduatedProgram,EmployerName,PayPackage,Scontact,Econtact,did)
VALUES ('$sname', $year, '$gprgrm', '$ename', $pay, '$scon','$econ',$did )";
if (mysqli_query($conn, $sql)) {
  header("location:../users/user.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>