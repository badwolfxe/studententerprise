<?php
require_once '../lib/functions.php';
require_once '../model/database.php';
require_once '../model/entity/departement_entity.php';
require_once '../model/entity/specialite_entity.php';
require_once '../model/entity/etudiant_entity.php';

getHeader("Espace étudiant");
?>

<select id="departement" >
<option value="" selected>Choisir un département</option>
<?php
  $departements = getAllDepartement();
  foreach ($departements as $departement) :

?>
<option value=<?php echo $departement['id'].'>'.$departement['label'];?></option>
<?php endforeach ;?>
</select>

<select id="niveau">
<option value="" selected>Choisir un niveau d'études</option>
<?php
  $niveaux = getAllNiveau();
  foreach ($niveaux as $niveau) :

?>
<option value=<?php echo $niveau['id'].'>'.$niveau['label'];?></option>
<?php endforeach ;?>
</select>

<select id="specialite">
<option value="" selected>Choisir une spécialité</option>
<?php
  $specialites = getAllSpecialite();
  foreach ($specialites as $specialite) :

?>
<option value=<?php echo $specialite['id'].'>'.$specialite['label'];?></option>
<?php endforeach ;?>
</select>

<section class="container-page">

<h1>Trouvez l'élu</h1>

<?php
$etudiants = getAllEtudiant();
?>

<!-- <?php foreach ($etudiants as $etudiant) : ?>
<img src="images/<?php echo $etudiant['avatar']?>">

<h3><?php echo $etudiant['nom'] .' ' . $etudiant['prenom'];?></h3>
<h3><?php echo $etudiant['date_naissance_format'];?></h3>
<p><?php echo $etudiant['mail']; ?></p>
<p><?php echo $etudiant['telephone']; ?></p>
<p><?php echo $etudiant['contrat']; ?></p>
<?php endforeach ;?> -->


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

</section>

<?php require_once '../layout/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function()
	{
		$.ajax({
				url: "ajax.php",
				type : 'POST',
				data : "creation=1",

				success : function(result)
				{
						$('.container-page').html(result);
				}
		});
	 });

   $('#departement, #niveau, #specialite').on('change', function()
   {
     var data = "creation=1&departement="  + $('select[id="departement"] > option:selected').val()

     if (($('select[id="niveau"] > option:selected').val() != "") && ($('select[id="specialite"] > option:selected').val() != ""))
     {
       data = data + "&niveau=" + $('select[id="niveau"] > option:selected').val() + "&specialite=" + $('select[id="specialite"] > option:selected').val();
     }
     else if ($('select[id="niveau"] > option:selected').val() != "")
     {
       data = data + "&niveau=" + $('select[id="niveau"] > option:selected').val() + "&specialite=0";
     }
     else if ($('select[id="specialite"] > option:selected').val() != "")
     {
       data = data + "&niveau=0" + "&specialite=" + $('select[id="specialite"] > option:selected').val();
     }
     else
     {
       data = data + "&niveau=0&specialite=0"
     }

     $.ajax({
 				url: "ajax.php",
 				type : 'POST',
 				data : data,

 				success : function(result)
 				{
 						$('.container-page').html(result);
 				}
 		});
  });
</script>