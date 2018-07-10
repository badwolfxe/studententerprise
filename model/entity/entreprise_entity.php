<?php

function getAllEntreprise() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                entreprise.id,
                entreprise.nom
            FROM entreprise;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getOneEntreprise($id) {
    global $connection;

    $query = "
        SELECT
            entreprise.id,
            entreprise.nom
        FROM entreprise
        WHERE entreprise.id = :id;";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetchAll();
}
