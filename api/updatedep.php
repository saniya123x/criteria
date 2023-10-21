<?php
include 'dbcon.php';
$did = $_POST["did"];
$user = $_POST["UserName"];
$name = $_POST["DName"];
$email = $_POST["Email"];
$sql1 = "UPDATE department
SET DName = '$name', Email= '$email'
WHERE did = $did";

if (mysqli_query($conn, $sql1)) {
  $sql = "UPDATE login set UserName='$user' WHERE did = $did";
  mysqli_query($conn, $sql);
  header("location:../admin/Department_table.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>