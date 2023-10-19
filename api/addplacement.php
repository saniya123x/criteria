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

$did = $_SESSION['did'];

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
} else {
  $sql = "INSERT INTO placement (StudentName,Year,GraduatedProgram,EmployerName,PayPackage,Scontact,Econtact,did)
VALUES ('$sname', $year, '$gprgrm', '$ename', $pay, '$scon','$econ',$did)";
  if (mysqli_query($conn, $sql)) {
    $lastid = mysqli_insert_id($conn);
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $target = $target_dir . "placement-" . $lastid . "." . $FileType;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
       $sql1= " UPDATE placement set Upload= 'placement-" . $lastid . "." . $FileType ."' WHERE PID = $lastid" ;
       mysqli_query($conn, $sql1);
      header("location:../users/tableuserplace.php");
    }
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
mysqli_close($conn);
