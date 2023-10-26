<?php
require('lib/fpdf186/fpdf.php');
include 'dbcon.php';

$path = '../upload/';
$pdf = new FPDF();
$sql1 ="select Upload from progression";
$filnames = mysqli_query($conn, $sql1);
if(mysqli_num_rows($filnames) > 0) {
while ($row = mysqli_fetch_array($filnames)) {
$image = $row['Upload'];
$pdf->AddPage();
$pdf->Image($path.$image,20,40,170,170);
}
$pdf->Output();
} else {
    echo 'No files';
}
?>