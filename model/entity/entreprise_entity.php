<?php


function getAllEntreprise() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
            entreprise.id,
            entreprise.nom,
            utilisateur.mail AS mail,
            utilisateur.avatar,
            utilisateur.valide AS validation
        FROM entreprise
        INNER JOIN utilisateur ON utilisateur.id = entreprise.id";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getEntreprise($id){
    global $connection;    
    
    $query = "SELECT
                entreprise.id,
                entreprise.nom AS nom,
                utilisateur.avatar AS avatar,
                utilisateur.mail AS mail
            FROM entreprise
            INNER JOIN utilisateur ON utilisateur.id = entreprise.id
            WHERE entreprise.id = :id;
	  ";

$stmt = $connection->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

return $stmt->fetch();
}

