<?php
require_once '../model/database.php';
require_once '../model/entity/etudiant_entity.php';

if (!empty($_POST["creation"]))
{
  if (!empty($_POST["departement"]) || !empty($_POST["niveau"]) || !empty($_POST["specialite"]))
  {
    if ($_POST["departement"] == 0)
    {
      $departement = NULL;
    }
    else
    {
      $departement = $_POST["departement"];
    }

    if ($_POST["niveau"] == 0)
    {
      $niveau = NULL;
    }
    else
    {
      $niveau = $_POST["niveau"];
    }

    if ($_POST["specialite"] == 0)
    {
      $specialite = NULL;
    }
    else
    {
      $specialite = $_POST["specialite"];
    }

    $etudiants = getEtudiantBy($_POST["departement"], $niveau, $specialite);
  }

  if ((empty($_POST["departement"]) && empty($_POST["niveau"]) && empty($_POST["specialite"])) || !isset($etudiants))
  {
    $etudiants = getAllEtudiant();
  }

  if (empty($etudiants))
  {
    ?>
    <h1>Go Fuck Yourself</h1>
    <?php
  }

  foreach ($etudiants as $etudiant) : ?>
  <img src="images/<?php echo $etudiant['avatar']?>">

  <h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
  <h3><?php echo $etudiant['date_naissance_format'];?></h3>
  <p><?php echo $etudiant['mail']; ?></p>
  <p><?php echo $etudiant['telephone']; ?></p>
  <p><?php echo $etudiant['contrat']; ?></p>
  <?php endforeach ;
}
?>
