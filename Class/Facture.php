<?php
class Facture extends Bdd
{
    function calculateTotalAmount($query)
    {
        $totalAmount = 0;
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // return $row;
            if (isset($row['heure_debut']) && isset($row['heure_fin'])) {
                $startTime = new \DateTime($row['heure_debut']);
                $endTime = new \DateTime($row['heure_fin']);
                $duration = $endTime->diff($startTime);
                $hours = $duration->h;
                $totalAmount += $hours * $row['tarif_h'];
            }
        }
        return $totalAmount . ' euros';
    }

    function editBillForParentsForMonth($parentId, $pdo)
    {
        // $parentId = "E.Id";
        $query = $pdo->prepare(
            "SELECT * FROM réservations AS R
            JOIN enfants AS E ON R.Id_Enfants = E.Id_Enfants
            JOIN disponibilités AS D ON d.Id_Disponibilités = R.Id_Disponibilités
            WHERE E.Id = :parentId AND R.date_start BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND LAST_DAY(NOW() - INTERVAL 1 MONTH) AND R.accepted = TRUE"
        );
        // return $parentId;
        $query->bindParam(':parentId', $parentId, PDO::PARAM_INT);
        $query->execute();
        // return $query->fetch(PDO::FETCH_ASSOC);
        return $this->calculateTotalAmount($query);
    }

    function editBillForNounouForMonth($nounouId, $pdo)
    {
        $nounouId = "D.Id";
        $query = $pdo->prepare(
            "SELECT * FROM réservations AS R
            JOIN disponibilités AS D ON R.Id_Disponibilités = D.Id_Disponibilités
            WHERE D.Id = :nounouId AND R.date_start BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 MONTH, '%Y-%m-01') AND LAST_DAY(NOW() - INTERVAL 1 MONTH) AND R.accepted = TRUE"
        );
        $query->bindParam(':nounouId', $nounouId, PDO::PARAM_INT);
        $query->execute();

        return $this->calculateTotalAmount($query);
    }
}
