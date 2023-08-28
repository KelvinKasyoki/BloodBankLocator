<?php require_once('../Connections/connect.php'); ?>

<?php
require('fpdf181/fpdf.php');
 

class PDF extends FPDF {
	function Header(){
		$this->SetFont('Arial', 'B',15);
		//dummy cell to put log
		//this->Cell(12,0,'',0,0);
		//is equivalent to,
		$this->Ln(12);
		
		//put logo
		
		//$this->Image('images/conference.jpg',92,10,15);
		$this->Cell(35,5,'',0,1);
		$this->Cell(45,5,'',0,0);
		$this->Cell(55,5,'BLOOD BANK LOCATOR',0,0);
		$this->Cell(70,5,'',0,1);
		
		$this->Cell(40,10,'',0,0);
		$this->Cell(95,10,'Patient Blood 0rders',0,0);
		$this->Cell(52,10,'',0,1);
		
		
		//----------------------------------------------get name
		     
		
		date_default_timezone_set('Africa/Nairobi');
	    $now = new DateTime();
	    $time = $now->format('H:i:s');
	    $date = $now->format('Y-m-d');
	    $this->SetFont('Arial', '',11);
		$this->Cell(45,10,'',0,0);
		$this->Cell(100,10,'Document generated on '.$date.', '.$time,0,1);
		$this->Cell(45,10,'',0,0);
        
        $this->Ln(5);
		
		$this->SetFont('Arial','',11);
		$this->Cell(70,5,'',0,0);
		$this->Cell(91,5,'List of Patient Orders',0,0);
		$this->Cell(52,5,'',0,1);
		
		//dummy ceil to give line spacing
		//this->Cell(0,5,'',0,1);
		//is equivalent to
		$this->Ln(5);
		
		$this->SetFont('Arial','B',11);
		
		$this->SetFillColor(180,180,255);
		$this->SetDrawColor(50,50,100);
		
	
        $this->Cell(35,5,'Name',1,0,'',true);
	
		$this->Cell(12,5,'Age',1,0,'',true);
		$this->Cell(15,5,'Home',1,0,'',true);
		$this->Cell(25,5,'Mobileno',1,0,'',true);
		$this->Cell(20,5,'Gender',1,0,'',true);
		$this->Cell(55,5,'Email',1,0,'',true);
		$this->Cell(25,5,'Bloodgroup',1,1,'',true);
		
		
		
		
		
		
	}
	function Footer(){
		//Go to 1.5cm from bottom
		$this->SetY(-15);
		
		$this->SetFont('Arial','',8);
		
		$this->Cell(0,10,'Page'.$this->PageNo()."/{pages}",0,0,'C');
		

		
	}
}
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages('{pages}');

$pdf->AddPage();
 $pdf->SetFont('Arial','',11);
 
$query_patientorders = "SELECT * FROM donors";
$patientorders = mysql_query($query_patientorders, $connect) or die(mysql_error());
$row_patientorders = mysql_fetch_assoc($patientorders);
$totalRows_patientorders = mysql_num_rows($patientorders);
 
          while($row_patientorders= mysql_fetch_assoc($patientorders))
          {
          
            $don_name=$row_patientorders['username'];
            $don_age=$row_patientorders['age'];
            $don_home=$row_patientorders['homeaddress'];
            $don_no=$row_patientorders['mobileno'];
            $don_gen=$row_patientorders['gender'];
            $don_emai=$row_patientorders['emailaddress'];
            $don_bg=$row_patientorders['bloodgroup'];
           
        
	
	 
	 
	 $pdf->Cell(35,5,$don_name,1,0);
	 $pdf->Cell(12,5,$don_age,1,0);
	 $pdf->Cell(15,5,$don_home,1,0);
	 $pdf->Cell(25,5,$don_no,1,0);
	$pdf->Cell(20,5, $don_gen,1,0);
	  $pdf->Cell(55,5, $don_emai,1,0);
	 $pdf->Cell(25,5, $don_bg,1,1);
	
	 
	 
 }
    



$pdf->Output();

?>