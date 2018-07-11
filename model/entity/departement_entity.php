<?php

function getAllDepartement() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                departement.id,
                departement.label,
                departement.code
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
    FROM departement_has_etudiant
    INNER JOIN departement ON departement.id = departement_has_etudiant.departement_id
    WHERE departement_has_etudiant.etudiant_id = :id;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}




function getDepartementByEtudiant() {
    global $connection;

    $query = "
        SELECT
	etudiant.nom,
	departement.id,
	departement.label
    FROM departement_has_etudiant
    INNER JOIN departement ON departement.id = departement_has_etudiant.departement_id
    INNER JOIN etudiant ON etudiant.id = departement_has_etudiant.etudiant_id
    WHERE departement_has_etudiant.etudiant_id = :id;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}
