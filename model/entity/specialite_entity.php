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
    FROM etudiant_has_specialite
    INNER JOIN specialite ON specialite.id = etudiant_has_specialite.specialite_id
    WHERE etudiant_has_specialite.etudiant_id = :id;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}