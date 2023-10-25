<?php
session_start();
include 'dbcon.php';
$stname = $_POST["Sname"];
$pgrad = $_POST["ProgramGraduated"];
$iname = $_POST["InstitutionName"];
$pname = $_POST["ProgrammeName"];
//$did = $_POST["did"];
$did = $_SESSION['did'];
$type= $_POST["type"];
// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
} else {
$sql = "INSERT INTO progression (Sname,ProgramGraduated,InstitutionName,ProgrammeName,did)
VALUES ('$stname', '$pgrad', '$iname', '$pname', $did )";
if (mysqli_query($conn, $sql)) {
  $lastid = mysqli_insert_id($conn);
  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target = $target_dir . "progression-" . $lastid . "." . $FileType;
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
    $sql1= " UPDATE progression set Upload= 'progression-" . $lastid . "." . $FileType ."' WHERE PRID = $lastid" ;
       mysqli_query($conn, $sql1);
       if ($type == "admin") {

        header("location:../admin/tableadminpro.php");
      } else {
        header("location:../users/tableuserpro.php");
      }
  }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
?>