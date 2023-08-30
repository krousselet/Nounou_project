<?php
require __DIR__ . "/../Library/Fancypdf.php";
require __DIR__ . "/../Class/Bdd.php";
require __DIR__ . "/../Class/User.php";
require __DIR__ . "/../Class/Facture.php";


$pdf = new FancyPDF();
$pdf->AddPage();


$bdd = new User();
try {
    $pdo = $bdd->Connect();
} catch (Exception $e) {
    die("Connection failed: " . $e->getMessage());
}

$facture = new Facture();

$query =
    "SELECT R.*, E.*, I.*, I.nom AS ParentNom, I.prenom AS ParentPrenom, E.nom AS EnfantNom, E.prenom AS EnfantPrenom
    FROM `réservations` AS R JOIN `enfants` AS E ON R.Id_Enfants = E.Id_Enfants
    JOIN `identifiant` AS I ON E.Id = I.Id
    WHERE R.dates < NOW() AND STR_TO_DATE(R.dates, '%Y-%m-%d') > DATE_ADD(NOW(), INTERVAL -30 DAY);";

$result = $pdo->query($query);

$pageWidth = 210;
$margin = 10;


$tableWidth = 40 + 40 + 50;

$xPos = ($pageWidth - $tableWidth) / 2;


$pdf->SetX($xPos);

// data to keep track of the total amount of time for the provided

$totalAmountService = 0;
$totalTimeInSeconds = 0;


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Nom parent', 1);
$pdf->Cell(40, 10, 'Nom enfant', 1);
$pdf->Cell(50, 10, 'Montant total', 1);
$pdf->Ln();


$pdf->SetFont('Arial', '', 12);
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    $pdf->SetX($xPos);

    $totalAmountParents = $facture->editBillForParentsForMonth($row['Id'], $pdo);

    $pdf->Cell(40, 10, $row['ParentNom'] . ' ' . $row['ParentPrenom'], 1);
    $pdf->Cell(40, 10, $row['EnfantNom'] . ', ' . $row['EnfantPrenom'], 1);
    $pdf->Cell(50, 10, $totalAmountParents, 1);
    $pdf->Ln();
}

$pdf->SetY(-35);
$pdf->Cell(0, 10, 'Facture pour ' . date("F, Y"), 0, 0, 'C');

$pdf->Output();

/*

    Always generate the bill for the previous month
        Generate another file in order to le the client download the file (according to his name)
        The service provider generate a bill (according to her id)
    Fill the bill with the data from the dashboard form
    Generate the bill on click from the "facture" button

    Tables to use :

    Réservations
        Id_Réservations

    Enfants
        tarif_h + nom + prenom

        What I need to display on the bill :

Montant total,
Nom, Prenom,
Tarif / h,
nombre d'heures total,
date du mois précédent

*/