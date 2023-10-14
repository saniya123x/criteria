<?php
include 'dbcon.php';
$pid = $_GET["PID"];
$sql ="DELETE FROM placement WHERE PID=$pid";
if (mysqli_query($conn, $sql)) {
  echo "New record deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>