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

