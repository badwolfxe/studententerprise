<?php
function getUserByEmailPassword(string $email, string $password) {
  /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM utilisateur
            WHERE utilisateur.mail = :email
            AND utilisateur.mdp = SHA1(:password);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();

    return $stmt->fetch();
}


function getOneUser(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT *
            FROM utilisateur
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}


function insertUtilisateur(string $email,string $mot_de_passe) {
    /* @var $connection PDO */
    global $connection;

      $query = "INSERT INTO utilisateur (mail, mdp, date_inscritpion)
                VALUES (:email, :motdepasse, :date_inscription);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":motdepasse", $mot_de_passe);
    $newDate = new DateTime();
    $newDate = $newDate->format('Y-m-d H:i:s');
    $stmt->bindParam(":date_inscription", $newDate);
    $stmt->execute();
}