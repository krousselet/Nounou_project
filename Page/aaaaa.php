<?php
require __DIR__ . "/../Library/Fancypdf.php";
require __DIR__ . "/../Class/Bdd.php";
require __DIR__ . "/../Class/User.php";

// Condition pour ne laisser la création du pdf qu'à l'utilisateur dont le rôle est la nounou :

// if($_SESSION['nounou']) {
    // Get data from the database

   
// Create a new PDF document
$pdf = new FancyPDF();
$pdf->AddPage();

// Connect to the database
$bdd = new User();
try {
    $pdo = $bdd->Connect();
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}


// Retrieve data from the database (assuming you have a valid SQL query)
$query = "SELECT * FROM factures";
$result = $pdo->query($query);

// Set font and text color for the content
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0); // Set text color to black

// Define table columns and column widths
$columnWidths = array(40, 40, 40, 40); // Adjust the widths as needed
$columnHeaders = array("Montant total", "Date de facturation", "Date d'edition", "Nom", "Prenom");

// Create a table header row
$pdf->SetFillColor(13, 152, 181); // Header background color
$pdf->SetTextColor(255, 255, 255); // Header text color
$pdf->SetFont('Arial', 'B', 12);
foreach ($columnHeaders as $header) {
    $pdf->Cell(array_shift($columnWidths), 10, $header, 1, 0, 'C', true);
}
$pdf->Ln(); // Move to the next row

// Loop through the database results and add them to the table
$pdf->SetFillColor(255, 255, 255); // Cell background color for data rows (white)
$pdf->SetTextColor(0, 0, 0); // Text color for data rows (black)
$pdf->SetFont('Arial', '', 12);

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Display each column in its respective cell
    $pdf->Cell(40, 10, $row['montant_total'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['date_paiement'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['date_generation'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['Id'], 1, 0, 'C', true);
    $pdf->Cell(40, 10, $row['Id_1'], 1, 0, 'C', true);
    
    $pdf->Ln(); // Move to the next row
}

// Output the PDF
$pdf->Output();


?>