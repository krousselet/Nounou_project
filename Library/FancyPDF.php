<?php
require('fpdf.php');

// Create a class that extends FPDF
class FancyPDF extends FPDF
{
    function Header()
    {

        $this->Image('../img/Logo.png', 10, 8, 36);

        $this->SetFont('Arial', 'B', 32);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 35, 'Nounou Projet X', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 24);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 80, 'Resume de facturation :', 0, 1, 'C');


        // Add an empty line for spacing
        $this->Ln(10);
    }
}
