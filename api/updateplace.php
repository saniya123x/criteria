<?php
include 'dbcon.php';
$pid = $_GET["PID"];
$sql = "UPDATE placement
SET StudentName = '$sname', Year= $year, GraduatedProgram='$gprgrm', EmployerName='$ename', PayPackage=$pay, Scontact='$scon', Econtact='$econ'
WHERE PID = $pid";

if (mysqli_query($conn, $sql)) {
  echo "New record updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>