<?php
include 'dbcon.php';
$stname = $_POST["Sname"];
$pgrad = $_POST["ProgramGraduated"];
$iname = $_POST["InstitutionName"];
$pname = $_POST["ProgrammeName"];
//$did = $_POST["did"];
$did=4;
$sql = "INSERT INTO progression (Sname,ProgramGraduated,InstitutionName,ProgrammeName,did)
VALUES ('$stname', '$pgrad', '$iname', '$pname', $did )";
if (mysqli_query($conn, $sql)) {
  header("location:../users/user2.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>