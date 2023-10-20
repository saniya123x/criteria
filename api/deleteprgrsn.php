<?php
include 'dbcon.php';
$prid = $_GET["PRID"];
$type = $_GET["type"];
$sql ="DELETE FROM placement WHERE PRID=$prid";
if (mysqli_query($conn, $sql)) {
  if ($type == "admin") {

    header("location:../admin/tableadminplace.php");
  } else {
    header("location:../users/tableuserplace.php");
  }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>