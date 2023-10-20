<?php
include 'dbcon.php';
$prid = $_POST["PRID"];
$type = $_POST["type"];
$stname = $_POST["Sname"];
$pgrad = $_POST["ProgramGraduated"];
$iname = $_POST["InstitutionName"];
$pname = $_POST["ProgrammeName"];
$sql = "UPDATE progression
SET SName = '$stname', ProgramGraduated= '$pgrad', InstitutionName='$iname', ProgrammeName='$pname'
WHERE PRID = $prid";

if (mysqli_query($conn, $sql)) {
  if(isset($_FILES["image"]) ){
    $fileName = "../upload/".$upl;
    unlink($fileName);
  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  $target = $target_dir . "progression-" . $prid . "." . $FileType;
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target)) {
    $sql1= " UPDATE progression set Upload= 'progression-" . $prid . "." . $FileType ."' WHERE PRID = $prid" ;
    mysqli_query($conn, $sql1);
  }
}if ($type == "admin") {

  header("location:../admin/tableadminpro.php");
} else {
  header("location:../users/tableuserpro.php");
}
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>