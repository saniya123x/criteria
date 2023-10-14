<?php
include 'dbcon.php';
$prid = $_GET["PRID"];
$sql = "UPDATE progression
SET SName = '$stname', ProgramGraduated= '$pgrad', InstitutionName='$iname', ProgrammeName='$pname'
WHERE PRID = $prid";

if (mysqli_query($conn, $sql)) {
  echo "New record updated successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>