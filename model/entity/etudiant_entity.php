<?php

function getAllEtudiant() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT 
etudiant.nom AS nom,
etudiant.prenom AS prenom,
departement_id AS departementid,
niveau_etude.id AS niveau,
niveau_etude.label AS labelniveau,
contrat.label AS labelcontrat
FROM etudiant
INNER JOIN departement_has_etudiant ON departement_has_etudiant.etudiant_id = etudiant.id
INNER JOIN niveau_etude ON niveau_etude.id = etudiant.niveau_etude_id
INNER JOIN contrat ON contrat.id = etudiant.contrat_id";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllDepartements() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT 
        departement.label AS labeldepartement
        FROM departement;";

    $stmt = $connection->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll();
}

function getAllAvatarsbyEtudiant() {
    global $connection;

    $query = "
    SELECT
	utilisateur.avatar AS avatar
    FROM utilisateur;
    ";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}   


function insertEtudiant(string $nom, string $prenom, string $date_naissance, string $numero_tel, string $cv, string $lettre_motivation, $niveau_etu) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO etudiant (
                nom, 
                prenom, 
                date_naissance,
                numero_tel,
                cv,
                lettre_motivation,
                niveau_etude_id,
                contrat_id,
                actif,
                date_debut_contrat,
                date_fin_contrat
                )
                VALUES (:nom, :prenom, , :numero_tel, :cv, :lettre_motivation, :niveau_etude_id, :actif, :contrat_id, :date_debut_contrat, :date_fin_contrat);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":numero_tel", $numero_tel);
    $stmt->bindParam(":cv", $cv);
    $stmt->bindParam(":lettre_motivation", $lettre_motivation);
    $stmt->bindParam(":niveau_etude_id", $niveau_etude_id);
    $stmt->bindParam(":actif", $actif);
    $stmt->bindParam(":contrat_id", $contrat_id);
    $stmt->bindParam(":date_debut_contrat", $date_debut_contrat);
    $stmt->bindParam(":date_fin_contrat", $date_fin_contrat);
    $stmt->execute();
}

function updateMember(int $id, string $firstname, string $lastname, string $picture) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE etudiant
                SET 
                nom = :nom,
                prenom = :prenom,
                date_naissance = :date_naissance,
                numero_tel = :numero_tel,
                cv = :cv,
                lettre_motivation = :lettre_motivation,
                niveau_etude_id = :niveau_etude_id,
                contrat_id = :contrat_id,
                actif = :actif,
                date_debut_contrat = :date_debut_contrat,
                date_fin_contrat = :date_fin_contrat
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":numero_tel", $numero_tel);
    $stmt->bindParam(":cv", $cv);
    $stmt->bindParam(":lettre_motivation", $lettre_motivation);
    $stmt->bindParam(":niveau_etude_id", $niveau_etude_id);
    $stmt->bindParam(":actif", $actif);
    $stmt->bindParam(":contrat_id", $contrat_id);
    $stmt->bindParam(":date_debut_contrat", $date_debut_contrat);
    $stmt->bindParam(":date_fin_contrat", $date_fin_contrat);
    $stmt->execute();
}

function getEtudiant($id){
    global $connection;    
    
    $query = "SELECT
                etudiant.id,
                etudiant.nom,
                etudiant.prenom,
                DATE_FORMAT(etudiant.date_naissance, '%e %M %Y') AS date_naissance_format,
                etudiant.numero_tel,
                etudiant.cv,
                etudiant.lettre_motivation,
                etudiant.niveau_etude,
                etudiant.contrat_id,
                etudiant.actif,
                DATE_FORMAT(etudiant.date_debut_contrat, '%e %M %Y') AS debut_contrat,
                DATE_FORMAT(etudiant.date_fin_contrat, '%e %M %Y') AS fin_contrat,
                CONCAT(etudiant.prenom, '.' , LEFT(etudiant.nom, 1)) AS etudiant,
            FROM etudiant
            INNER JOIN contrat ON etudiant.contrat_id = contrat.id.id
            INNER JOIN niveau_etude ON etudiant.niveau_etude_id = niveau_etude.id
            LEFT JOIN jaime ON jaime.recette_id = recette.id
            WHERE etudiant.id = :etudiant;
	  ";

$stmt = $connection->prepare($query);
$stmt->bindParam(':etudiant_id', $id);
$stmt->execute();

return $stmt->fetch();
}