<?php

function getAllEtudiant() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
    etudiant.id,
etudiant.nom AS nom,
etudiant.prenom AS prenom,
etudiant.numero_tel AS telephone,
DATE_FORMAT(etudiant.date_naissance, '%e %M %Y') AS date_naissance_format,
niveau_etude.id AS niveau,
niveau_etude.label AS labelniveau,
contrat.label AS contrat,
utilisateur.mail AS mail,
utilisateur.valide AS publication
FROM etudiant
INNER JOIN utilisateur ON utilisateur.id = etudiant.id
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

function updateEtudiant(string $nom, string $prenom, string $date_naissance, string $email, string $telephone, string $niveau_etude, string $specialite, int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE etudiant
                SET 
                nom = :nom,
                prenom = :prenom,
                date_naissance = :date_naissance,
                numero_tel = :telephone,
                niveau_etude_id = :niveauetude,
                WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":date_naissance", $date_naissance);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":telephone", $telephone);
    $stmt->bindParam(":niveauetude", $niveau_etude);
    $stmt->bindParam(":specialite", $specialite);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
    updateUtilisateur($email, $id);
}

function getEtudiant($id){
    global $connection;    
    
    $query = "SELECT
                etudiant.id,
                etudiant.nom AS nom,
                etudiant.prenom,
                DATE_FORMAT(etudiant.date_naissance, '%e %M %Y') AS date_naissance_format,
                etudiant.numero_tel AS telephone,
                etudiant.cv AS cv,
                etudiant.lettre_motivation AS lm,
                niveau_etude.label AS labelniveau,
                contrat.label AS contrat,
                etudiant.actif,
                utilisateur.avatar AS avatar,
                utilisateur.mail AS mail
            FROM etudiant
            INNER JOIN utilisateur ON utilisateur.id = etudiant.id
            INNER JOIN contrat ON etudiant.contrat_id = contrat.id
            INNER JOIN niveau_etude ON etudiant.niveau_etude_id = niveau_etude.id
            WHERE etudiant.id = :id;
	  ";

$stmt = $connection->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();

return $stmt->fetch();
}