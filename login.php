<?php

require_once "model/database.php";

$email = $_POST['email'];
$password = $_POST['password'];

// Est ce que l'utilisateur existe
$user = getUserByEmailPassword($email, $password);

if (isset($user['id'])) {
    // Enregistre son identifiant dans la session
    $_SESSION['id'] = $user['id'];
    
    if (!is_null($user['admin'])) {
        echo 'admin';
        header('Location: admin/index.php');
    } else if (!is_null($user['etudiant'])) {
        echo 'etudiant';
        header('Location: etudiant/index.php');
    } else if (!is_null($user['entreprise'])) {
        echo 'entreprise';
        header('Location: entreprise/index.php');
    }
} else {
    header('Location: index.php');
}