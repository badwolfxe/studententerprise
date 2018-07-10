<?php

require_once __DIR__ . '/../model/database.php';

// Démarre la sesson de l'utilisateur en cours
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
    }
}

// Si l'utilisateur n'est pas connecté, redirection vers la page de login
if (!isset($user['id'])) {
    header("Location: ../admin/login.php");
}