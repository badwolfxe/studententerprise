<?php

function getAllSpecialite() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                specialite.id,
                specialite.label
            FROM specialite;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllSpecialiteByEtudiant($id) {
    global $connection;

    $query = "
        SELECT
		specialite.id,
            specialite.label
        FROM specialite
        INNER JOIN specialite_has_etudiant
            ON specialite_has_etudiant.specialite_id = specialite.id
        WHERE specialite_has_etudiant.etudiant_id = :id;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}