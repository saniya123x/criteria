<?php
include 'dbcon.php'
$user = $_POST["UserName"];
$pass = $_POST["Password"];
$name = $_POST["DName"];
$email = $_POST["Email"];
$lastid = "";

$sql1 = "INSERT INTO department (Dname,Email)
VALUES ('$name', '$email')";

if (mysqli_query($conn, $sql1)) {
    $lastid = mysqli_insert_id($conn);
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO login (UserName,Password,did)
VALUES ('$user', '$pass', $lastid)";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
mysqli_close($conn);
?>