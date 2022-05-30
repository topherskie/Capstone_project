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

if(isset($_POST['btnSubReceipt'])) {
// user detail
$txtUserFullName = $_POST['txtUserFullName'];

// pay details
$rpayment_idno = $_POST['rpayment_idno'];
$rdate_sub_started = $_POST['rdate_sub_started'];
$rpayment_type = $_POST['rpayment_type'];
$rpurpose = $_POST['rpurpose'];
$rpayment_amount = $_POST['rpayment_amount'];
$rpayment_status = $_POST['rpayment_status'];
$rsubscription_duration = $_POST['rsubscription_duration'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',13);
$pdf->Cell(40,10,'',0,1);
$pdf->Cell(40,10,"Thank you " .$txtUserFullName. " for trusting our platform.",0,1);
$pdf->Cell(40,10,'------------------------------------------------------------------------',0,1);

$pdf->Cell(40,10,"Payment Id: " . $rpayment_idno,0,1);
$pdf->Cell(40,10,"Payment type: " . $rpayment_type,0,1);
$pdf->Cell(40,10,"Payment amount: " . $rpayment_amount,0,1);
$pdf->Cell(40,10,"Payment status: " . $rpayment_status,0,1);
$pdf->Cell(40,10,"Service: " . $rpurpose,0,1);
$pdf->Cell(40,10,"Subscription started: " . $rdate_sub_started,0,1);
$pdf->Cell(40,10,"Subscription duration: " . $rsubscription_duration . " Days",0,1);
$pdf->Cell(40,10,'-------------------------------------------------------------------------',0,1);
$pdf->Output();

} // end of main  

 ?>