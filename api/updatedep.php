<?php
include 'dbcon.php';
$did = $_GET["did"];
$sql1 = "UPDATE department
SET DName = '$name', Email= '$email'
WHERE did = $did";

if (mysqli_query($conn, $sql1)) {
  echo "New record updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>