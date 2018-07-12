<?php
require_once '../lib/functions.php';
require_once '../model/database.php';
require_once '../model/entity/etudiant_entity.php';
?>

<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/style.css">
<link rel="stylesheet" href="<?php echo SITE_URL; ?>css/style_liste.css">

<?php

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
    
?>
  <div class="AllSudents">
  <section class="students">
<?php
  foreach ($etudiants as $etudiant) : ?>
<div class="details">
  <img src="../uploads/<?php echo $etudiant['avatar']?>">
<div class="details_text">
  <h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
  <h3><?php echo $etudiant['date_naissance_format'];?></h3>
   <p>Je recherche un(e) <?php echo $etudiant['contrat']; ?></p>
    </div>
<div class="details_contact">
  <a href="mailto:<?php echo $etudiant['mail']; ?>"><i class="fa fa-2x fa-envelope" aria-hidden="true"></i></a>
    <a href="mailto:<?php echo $etudiant['telephone']; ?>"><i class="fa fa-2x fa-phone-square" aria-hidden="true"></i></a>
  
  </div>
  </div>
  <?php endforeach ; }?>

</section>
</div>
