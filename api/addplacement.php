<?php
session_start();
include 'dbcon.php';
$sname = $_POST["StudentName"];
$year = $_POST["Year"];
$gprgrm = $_POST["GraduatedProgram"];
$ename = $_POST["EmployerName"];
$pay = $_POST["PayPackage"];
$scon = $_POST["Scontact"];
$econ = $_POST["Econtact"];
$lastid = "";

if (mysqli_query($conn, $sql1)) {
  $lastid = mysqli_insert_id($conn);
 echo "new record created successfully";
}
else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//$did = $_POST["did"];
$did= $_SESSION['did'];
$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $sql = "INSERT INTO placement (StudentName,Year,GraduatedProgram,EmployerName,PayPackage,Scontact,Econtact,did)
VALUES ('$sname', $year, '$gprgrm', '$ename', $pay, '$scon','$econ',$did )";
if (mysqli_query($conn, $sql)) {
  header("location:../users/user.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



mysqli_close($conn);
?>