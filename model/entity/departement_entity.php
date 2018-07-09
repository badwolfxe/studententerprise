<?php

function getAllDepartement() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                departements.id,
                departements.label,
                departements.code
            FROM departements;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

