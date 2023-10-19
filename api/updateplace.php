<?php
include 'dbcon.php';
$pid = $_POST["PID"];
$sname = $_POST["StudentName"];
$year = $_POST["Year"];
$gprgrm = $_POST["GraduatedProgram"];
$ename = $_POST["EmployerName"];
$pay = $_POST["PayPackage"];
$scon = $_POST["Scontact"];
$econ = $_POST["Econtact"];
$upl = $_POST["Upload"];
$sql = "UPDATE placement
SET StudentName = '$sname', Year= $year, GraduatedProgram='$gprgrm', EmployerName='$ename', PayPackage=$pay, Scontact='$scon', Econtact='$econ'
WHERE PID = $pid";

if (mysqli_query($conn, $sql)) {
  if(isset($_FILES["image"]) ){
      $fileName = "../upload/".$upl;
      unlink($fileName);
    $target_dir = "../upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $target = $target_dir . "placement-" . $pid . "." . $FileType;
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
      $sql1= " UPDATE placement set Upload= 'placement-" . $pid . "." . $FileType ."' WHERE PID = $pid" ;
      mysqli_query($conn, $sql1);
    }
  }
   header("location:../users/tableuserplace.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>