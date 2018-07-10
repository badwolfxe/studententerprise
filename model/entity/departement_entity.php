<?php

function getAllDepartement() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                departements.id,
                departements.label,
                departements.code
            FROM departement;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


function getAllDepartementByEtudiant($id) {
    global $connection;

    $query = "
        SELECT
		departement.id,
        departement.label
        FROM departement
        INNER JOIN departement_has_etudiant
            ON departement_has_etudiant.departement_id = departement.id
        WHERE departement_has_etudiant.etudiant_id = :id;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}