<?php

function getAllEtudiant() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                etudiant.*,
                CONCAT(etudiant.nom, ' ', etudiant.prenom) AS fullname
            FROM etudiant;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}


function insertEtudiant(string $nom, string $prenom, string $date_naissance, string $numero_tel, string $cv, string $lettre_motivation, $niveau_etu) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO member (firstname, lastname, picture)
                VALUES (:firstname, :lastname, :picture);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}

function updateMember(int $id, string $firstname, string $lastname, string $picture) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE member
                SET firstname = :firstname,
                lastname = :lastname,
                picture = :picture
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}