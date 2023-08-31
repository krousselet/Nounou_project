<?php

class Facture extends Bdd
{

    function editBillForParentsForMonth($parentId, $pdo)
    {
        $query = $pdo->prepare(
            "SELECT * FROM réservations AS R
            JOIN enfants AS E ON R.Id_Enfants = E.Id_Enfants
            WHERE E.Id = :parentId AND R.dates < NOW() AND R.dates > DATE_ADD(NOW(), INTERVAL -30 DAY)"
        );
        $query->bindParam(':parentId', $parentId, PDO::PARAM_INT);
        $query->execute();

        $totalAmount = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $startTime = new DateTime($row['heure_debut_']);
            $endTime = new DateTime($row['heure_fin_']);
            $duration = $endTime->diff($startTime);
            $hours = $duration->h;

            $totalAmount += $hours * $row['tarif_h'];
        }

        return $totalAmount . ' euros';
    }

    function editBillForNounouForMonth($nounouId, $pdo)
    {
        $query = $pdo->prepare(
            "SELECT * FROM réservations AS R
            JOIN disponibilités AS D ON R.Id_Disponibilités = D.Id_Disponibilités
            WHERE D.Id = :nounouId AND R.dates < NOW() AND R.dates > DATE_ADD(NOW(), INTERVAL -30 DAY)"
        );
        $query->bindParam(':nounouId', $nounouId, PDO::PARAM_INT);
        $query->execute();

        $totalAmount = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $startTime = new DateTime($row['heure_debut_']);
            $endTime = new DateTime($row['heure_fin_']);
            $duration = $endTime->diff($startTime);
            $hours = $duration->h;

            $totalAmount += $hours * $row['tarif_h'];
            var_dump($totalAmount);
        }

        return $totalAmount . ' euros';
    }
}
