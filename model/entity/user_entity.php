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

function connexion(){
    session_start();

// Je vérifie si l'utilisateur est connecté
if (isset($_SESSION['id'])) {
    // S'il est connecté je récupère les infos de l'utilisateur en cours
    $user = getUser($_SESSION['id']);
} else if (isset($_POST['email']) && isset($_POST['password'])) {
    // Utilisateur non connecté qui essai de s'identifier
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Est ce que l'utilisateur existe
    $user = getUserByEmailPassword($email, $password);
    if (isset($user['id'])) {
        // Enregistre son identifiant dans la session
        $_SESSION['id'] = $user['id'];
         header("Location: ../etudiant/index.php");
    }
}

// Si l'utilisateur n'est pas connecté, redirection vers la page de login
if (!isset($user['id'])) {
    header("Location: ../index.php");
}
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