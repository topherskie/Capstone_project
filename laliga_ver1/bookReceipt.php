<?php 

require('fpdf.php');



class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('local_img/laligaLogo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(50,10,'Offical Receipt',2,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
} // end of PDF class


// Instanciation of inherited class


if(isset($_POST['btnBookReceipt'])) {
$txtUserFullName = $_POST['txtUserFullName'];



$booking_idno = $_POST['booking_idno'];
$payment_type = $_POST['payment_type'];
$purpose = $_POST['purpose'];
$paybook_amount = $_POST['paybook_amount'];
$payment_status = $_POST['payment_status'];




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',13);
$pdf->Cell(40,10,'',0,1);
$pdf->Cell(40,10,"Thank you " .$txtUserFullName. " for trusting our platform.",0,1);
$pdf->Cell(40,10,'------------------------------------------------------------------------',0,1);

$pdf->Cell(40,10,"Payment Id: " . $booking_idno,0,1);
$pdf->Cell(40,10,"Payment type: " . $payment_type,0,1);
$pdf->Cell(40,10,"Payment amount: " . $paybook_amount,0,1);
$pdf->Cell(40,10,"Payment status: " . $payment_status,0,1);
$pdf->Cell(40,10,"Service: " . $purpose,0,1);
$pdf->Cell(40,10,'-------------------------------------------------------------------------',0,1);
$pdf->Output();

} // END OF IF ELSE BOOK RECEIPT



?>