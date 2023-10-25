<?php
include 'dbcon.php';
$progression_data = array();
$sql = "SELECT * FROM progression";
$result = mysqli_query($conn, $sql);
while ($row1 = mysqli_fetch_assoc($result)) {
    $progression_data[] = array($row1["Sname"],$row1["ProgramGraduated"],$row1["InstitutionName"],$row1["ProgrammeName"]);
}

$progression = array(
    array(
      "Name of Student Enrolling into Higher Education",
       "Program Graduated From",
       "Name of Institution Joined",
        "Name of Programme Admitted to"
    )
);

// Filter progression Data
function filterProgressionData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// File Name & Content Header For Download
$file_name = "progression_data.xls";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");

echo "Number of Students Progressing to Higher Education During the Year " . "\n";
//To define column name in first row.
$column_names = false;
// run loop through each row in $placement_data
foreach ($progression as $row2) {
    echo implode("\t", $row2) . "\n";
}
// The array_walk() function runs each array element in a user-defined function.
foreach ($progression_data as $row) {
    array_walk($row, 'filterProgressionData');
    echo implode("\t", array_values($row)) . "\n";
}
exit;
