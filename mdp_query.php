<?php require_once 'model/database.php';


$email = $_POST['libelle_email'];
$mot_de_passe = $_POST['libelle_mot_de_passe'];

modifUtilisateur( $mot_de_passe, $email);

header("Location: index.php");

?>

