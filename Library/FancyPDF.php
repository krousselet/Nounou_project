<?php
require('fpdf.php');

// Create a class that extends FPDF
class FancyPDF extends FPDF
{
    function Header()
    {
        // Set the top left corner logo
        $this->Image('../img/Logo.png', 10, 10, 36);
        
        // Add fancy styling for the title
        $this->SetFont('Arial', 'B', 32);
        $this->SetTextColor(36, 68, 112); // Set text color to a shade of blue
        $this->Cell(0, 35, 'Nounou Projet X', 0, 1, 'C');
        
        // Add an empty line for spacing
        $this->Ln(10);
    }
}
?>