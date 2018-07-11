<?php

function getUserByEmailPassword(string $email, string $password) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                    utilisateur.*,
                    admin.id AS admin,
                    etudiant.id AS etudiant,
                    entreprise.id AS entreprise
                FROM utilisateur
                LEFT JOIN admin ON admin.id = utilisateur.id
                LEFT JOIN etudiant ON etudiant.id = utilisateur.id
                LEFT JOIN entreprise ON entreprise.id = utilisateur.id
                WHERE utilisateur.mail = :email
                AND utilisateur.mdp = MD5(:password);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    return $stmt->fetch();
}


function getOneUser(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                    utilisateur.*,
                    admin.id AS admin,
                    etudiant.id AS etudiant,
                    entreprise.id AS entreprise
                FROM utilisateur
                LEFT JOIN admin ON admin.id = utilisateur.id
                LEFT JOIN etudiant ON etudiant.id = utilisateur.id
                LEFT JOIN entreprise ON entreprise.id = utilisateur.id
            WHERE utilisateur.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertUtilisateur(string $email, string $mot_de_passe, string $type) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO utilisateur (mail, mdp, date_inscritpion)
                VALUES (:email, SHA1(:motdepasse), NOW()); ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":motdepasse", $mot_de_passe);
    $stmt->execute();

    $id = $connection->lastInsertId();

    if ($type == 'etudiant') {
        $query = "INSERT INTO etudiant (id) VALUES (:id);";
    } elseif ($type == 'entreprise') {
        $query = "INSERT INTO entreprise (id) VALUES (:id);";
    }
    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function modifUtilisateur($mot_de_passe, $email) {
    global $connection;

    $query = "UPDATE utilisateur 
        SET mdp = :mdp
        WHERE mail = :mail
    ;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':mdp', $mot_de_passe);
    $stmt->bindParam(':mail', $email);
    $stmt->execute();
}

function updateUtilisateurActif(int $utilisateur_id, bool $actif){
    global $connection;
    
    $query = "
        UPDATE utilisateur
        SET utilisateur.valide = :valide
        WHERE utilisateur.id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':valide', $actif);
    $stmt->bindParam(':id', $utilisateur_id);
    $stmt->execute();
}

function updateImageUtilisateur(int $id, $name_file_avatar) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE utilisateur
                SET 
                avatar = :avatar
                WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":avatar", $name_file_avatar);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    
  
}