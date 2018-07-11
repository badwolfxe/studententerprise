<?php

function getAllNiveau() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                niveau_etude.id,
                niveau_etude.label
            FROM niveau_etude;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


// function getAllDepartementByEtudiant($id) {
//     global $connection;
//
//     $query = "
//         SELECT
// 	departement.id,
// 	departement.label
//     FROM departement_has_etudiant
//     INNER JOIN departement ON departement.id = departement_has_etudiant.departement_id
//     WHERE departement_has_etudiant.etudiant_id = :id;";
//     $stmt = $connection->prepare($query);
//     $stmt->bindParam(':id', $id);
//     $stmt->execute();
//
//     return $stmt->fetchAll();
// }
