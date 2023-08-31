<?php
class Facture extends Bdd
{
    function calculateTotalAmount($query)
    {
        $totalAmount = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if (isset($row['heure_debut_']) && isset($row['heure_fin_'])) {
                $startTime = new \DateTime($row['heure_debut_']);
                $endTime = new \DateTime($row['heure_fin_']);
                $duration = $endTime->diff($startTime);
                $hours = $duration->h;

                $totalAmount += $hours * $row['tarif_h'];
            }
        }
        return $totalAmount . ' euros';
    }

    function editBillForParentsForMonth($parentId, $pdo)
    {
        $query = $pdo->prepare(
            "SELECT * FROM réservations AS R
    JOIN enfants AS E ON R.Id_Enfants = E.Id_Enfants
    WHERE E.Id = :parentId AND R.date_start < NOW() AND R.date_start > DATE_ADD(NOW(), INTERVAL -30 DAY) AND R.accepted = TRUE"
        );
        $query->bindParam(':parentId', $parentId, PDO::PARAM_INT);
        $query->execute();

        return $this->calculateTotalAmount($query);
    }

    function editBillForNounouForMonth($nounouId, $pdo)
    {
        $query = $pdo->prepare(
            "SELECT * FROM réservations AS R
        JOIN disponibilités AS D ON R.Id_Disponibilités = D.Id_Disponibilités
        WHERE D.Id = :nounouId AND R.date_start < NOW() AND R.date_start > DATE_ADD(NOW(), INTERVAL -30 DAY) AND R.accepted = TRUE"
        );
        $query->bindParam(':nounouId', $nounouId, PDO::PARAM_INT);
        $query->execute();

        return $this->calculateTotalAmount($query);
    }
}
