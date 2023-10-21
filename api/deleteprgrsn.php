<?php
include 'dbcon.php';
$prid = $_GET["prid"];
$type = $_GET["type"];

$sql2="SELECT Upload FROM progression where PRID=$prid";
$result= mysqli_query($conn, $sql2);
$row = mysqli_fetch_array($result);
$store= $row ["Upload"];
$fileName = "../upload/" . $store;
    unlink($fileName);

$sql ="DELETE FROM progression WHERE PRID=$prid";
if (mysqli_query($conn, $sql)) {
  if ($type == "admin") {

    header("location:../admin/tableadminpro.php");
  } else {
    header("location:../users/tableuserpro.php");
  }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>