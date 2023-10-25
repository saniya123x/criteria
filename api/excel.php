<?php
include 'dbcon.php';
$placement_data = array();
$sql = "SELECT * FROM placement";
$result = mysqli_query($conn, $sql);
while ($row1 = mysqli_fetch_assoc($result)) {
    $placement_data[] = array($row1["Year"],$row1["StudentName"]." ".$row1["Scontact"],$row1["GraduatedProgram"],$row1["EmployerName"]." ".$row1["Econtact"],$row1["PayPackage"]);
}
// // var_dump($placement_data);
// $from = "A1"; // or any value
// $to = "G2"; // or any value
// $->getActiveSheet()->getStyle("$from:$to")->getFont()->setBold( true );


$placement = array(
    array(
      "Year",
       "Name of Student Placed and Contact Details",
       "Program Graduated From",
       "Name of the Employer with Contact Details",
        "Paypackage at Appointment"
    )
);


// $placement_data = array(
// array(

// 'Year' => '2023',
// 'Name of student placed and Contact details' => 'nafee',
// 'Program Graduated from' => 'CS',
// 'Name of the Employer with Contact details' => 'TCS',
// 'Pay Package at Appointment' => '320000'
// )

// );

// Filter placement Data
function filterPlacementData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// File Name & Content Header For Download
$file_name = "placement_data.xls";
header("Content-Disposition: attachment; filename=\"$file_name\"");
header("Content-Type: application/vnd.ms-excel");

echo "Number of Placement of Outgoing Students During the Year" . "\n";
//To define column name in first row.
$column_names = false;
// run loop through each row in $placement_data
foreach ($placement as $row2) {
    echo implode("\t", $row2) . "\n";
}
// The array_walk() function runs each array element in a user-defined function.
foreach ($placement_data as $row) {
    array_walk($row, 'filterPlacementData');
    echo implode("\t", array_values($row)) . "\n";
}
exit;
