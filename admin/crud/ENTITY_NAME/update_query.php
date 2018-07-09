<?php

require_once '../../../model/database.php';

// Récupérer les données du formulaire
$id = $_POST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];

$member = getOneEntity("member", $id);
$picture = !is_null($member["picture"]) ? $member["picture"] : ""; // Image présente avant update

// Vérifier si l'utilisateur a uploadé un fichier
if ($_FILES["picture"]["error"] == 0) {
    $picture = $_FILES["picture"]["name"];
    // Déplacer le fichier uploadé
    move_uploaded_file($_FILES["picture"]["tmp_name"], "../../../uploads/" . $picture);
}

// Insertion des données en BDD
updateMember($id, $firstname, $lastname, $picture);

// Redirection vers la liste
header("Location: index.php");