<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

getHeader("Espace Admin");
?>

<h1>Admin</h1>

<p>Controle de la plateforme</p>

<?php

$entreprise = getAllEntreprise();
$etudiants = getAllEtudiant();

?>

<div>
    
</div>

<div>
<table id="liste-utilisateurs" style="width:100%">
  <tr>
    <th>Avatar</th>
    <th>Nom</th> 
    <th>Mail</th>
    <th>Contrat</th>
    <th>Publier</th>
  </tr>
  <?php foreach ($etudiants as $key => $etudiant) : ?>
  <tr>
    <td><img src="images/<?php echo $etudiant['avatar'];?>"></td>
  </tr>
  <tr>
    <td><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></td>
  </tr>
  <tr>
    <td><?php echo $etudiant['mail']; ?></td>
  </tr>
  <tr>
    <td><?php echo $etudiant['contrat']; ?></td>
  </tr>
  <tr>
      <td>
           <input type="checkbox" id="actif-<?php echo $key; ?>" data-id="<?php echo $etudiant['id']; ?>" name="actif" <?php echo ($etudiant['publication'] == 1) ? 'checked' : '';?> />
            <label for="actif-<?php echo $key; ?>">Actif <i class="fa fa-spinner fa-pulse fa-fw hidden"></i></label>
        </td>
  </tr>
  <?php endforeach ;?>
</table>
    
    
    
</div>










<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>