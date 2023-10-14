<?php
include 'dbcon.php';
$did = $_GET["did"];
$sql1 ="DELETE FROM department WHERE did=$did";
if (mysqli_query($conn, $sql1)) {
  echo "New record deleted successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>