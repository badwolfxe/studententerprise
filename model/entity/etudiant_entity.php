<?php

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

function updateEtudiant(string $nom, string $prenom, string $date_naissance, string $email, string $telephone, int $id, string $niveau_etude, string $name_file_cv, string $name_file_lm, string $debut_contrat, string $fin_contrat) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE etudiant
                SET
                nom = :nom,
                prenom = :prenom,
                niveau_etude_id = :niveau,
                date_naissance = :date_naissance,
                date_debut_contrat= :debut_contrat,
                date_fin_contrat = :fin_contrat,
                cv = :cv,
                lettre_motivation = :lm,
                numero_tel = :telephone
                WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":prenom", $prenom);
    $stmt->bindParam(":date_naissance", $date_naissance);
    $stmt->bindParam(":telephone", $telephone);
    $stmt->bindParam(":niveau", $niveau_etude);
    $stmt->bindParam(":fin_contrat", $fin_contrat);
    $stmt->bindParam(":debut_contrat", $debut_contrat);
    $stmt->bindParam(":cv", $name_file_cv);
    $stmt->bindParam(":lm", $name_file_lm);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    updateProfilUtilisateur($email, $id);
}

function updateProfilUtilisateur(string $email, int $id) {
    global $connection;
    $query = "UPDATE utilisateur
                SET
                mail = :mail
                WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":mail", $email);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function getEtudiantQuery() {
    return "SELECT
                etudiant.id,
                etudiant.nom AS nom,
                etudiant.prenom,
                etudiant.date_naissance,
                etudiant.date_debut_contrat,
                etudiant.date_fin_contrat,
                DATE_FORMAT(etudiant.date_naissance, '%e %M %Y') AS date_naissance_format,
                DATE_FORMAT(etudiant.date_debut_contrat, '%e %M %Y') AS date_debut_contrat_format,
                DATE_FORMAT(etudiant.date_fin_contrat, '%e %M %Y') AS date_fin_contrat_format,
                TIMESTAMPDIFF(MONTH, etudiant.date_debut_contrat, etudiant.date_fin_contrat) AS duree_contrat,
                etudiant.numero_tel AS telephone,
                etudiant.cv AS cv,
                etudiant.lettre_motivation AS lm,
                niveau_etude.label AS labelniveau,
                contrat.label AS contrat,
                etudiant.actif,
                etudiant.niveau_etude_id,
                utilisateur.avatar AS avatar,
                utilisateur.mail AS mail,
                utilisateur.valide AS validation
            FROM etudiant
            INNER JOIN utilisateur ON utilisateur.id = etudiant.id
            LEFT JOIN contrat ON etudiant.contrat_id = contrat.id
            LEFT JOIN niveau_etude ON etudiant.niveau_etude_id = niveau_etude.id
            LEFT JOIN departement_has_etudiant ON etudiant.id = departement_has_etudiant.etudiant_id
            LEFT JOIN etudiant_has_specialite ON etudiant.id = etudiant_has_specialite.etudiant_id
            ";
}

function getEtudiant($id) {
    global $connection;
    
    $query = getEtudiantQuery();

    $query .= "WHERE etudiant.id = :id GROUP BY utilisateur.id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getAllEtudiants(array $params = []) {
    global $connection;

    $query = getEtudiantQuery();
    
    $query .= "WHERE 1 = 1 ";
    
    if (isset($params["departement"]) && is_numeric($params["departement"]) && $params["departement"] > 0) {
        $query .= "AND departement_has_etudiant.departement_id = :departement_id ";
    }
    if (isset($params["niveau_etude"]) && is_numeric($params["niveau_etude"]) && $params["niveau_etude"] > 0) {
        $query .= "AND niveau_etude.id = :niveau_etude_id ";
    }
    if (isset($params["specialite"]) && is_numeric($params["specialite"]) && $params["specialite"] > 0) {
        $query .= "AND etudiant_has_specialite.specialite_id = :specialite_id ";
    }
    
    $query .= "GROUP BY utilisateur.id ";

    $stmt = $connection->prepare($query);
    if (isset($params["departement"]) && is_numeric($params["departement"]) && $params["departement"] > 0) {
        $stmt->bindParam(':departement_id', $params["departement"]);
    }
    if (isset($params["niveau_etude"]) && is_numeric($params["niveau_etude"]) && $params["niveau_etude"] > 0) {
        $stmt->bindParam(':niveau_etude_id', $params["niveau_etude"]);
    }
    if (isset($params["specialite"]) && is_numeric($params["specialite"]) && $params["specialite"] > 0) {
        $stmt->bindParam(':specialite_id', $params["specialite"]);
    }
    $stmt->execute();

    return $stmt->fetchAll();
}