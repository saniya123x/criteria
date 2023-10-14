<?php
include 'dbcon.php';
$prid = $_GET["PRID"];
$sql ="DELETE FROM placement WHERE PRID=$prid";
if (mysqli_query($conn, $sql)) {
  echo "New record deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>