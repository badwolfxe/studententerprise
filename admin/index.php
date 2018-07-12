<?php
require_once '../lib/functions.php';
require_once '../model/database.php';

$entreprises = getAllEntreprise();
$etudiants = getAllEtudiant();

if (!currentUserHasRole("admin")) {
    header("Location: ../index.php");
}

getHeader("Espace Admin");
?>

<h1>Admin</h1>

<p>Controle de la plateforme</p>

<div>

</div>

<section class="container-page">
<a><button id="test" name="etudiant" onclick="show1();">
    Etudiants
</button></a>

<div>
    <table id="liste-utilisateurs" style="width:100%">
        <tr>
            <th>Avatar</th>
            <th>Nom</th> 
            <th>Mail</th>
            <th>Contrat</th>
            <th>Valider</th>
        </tr>
<?php foreach ($etudiants as $key => $etudiant) : ?>
            <tr>
                <td><img src="../uploads/<?php echo $utilisateur['avatar']; ?>"></td>
            </tr>
            <tr>
                <td><?php echo $etudiant['nom'] . ' ' . $etudiant['prenom']; ?></td>
            </tr>
            <tr>
                <td><?php echo $etudiant['mail']; ?></td>
            </tr>
            <tr>
                <td><?php echo $etudiant['contrat']; ?></td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="actif-<?php echo $key; ?>" data-id="<?php echo $etudiant['id']; ?>" name="actif" <?php echo ($etudiant['validation'] == 1) ? 'checked' : ''; ?> />
                    <label for="actif-<?php echo $key; ?>">Actif <i class="fa fa-spinner fa-pulse fa-fw hidden"></i></label>
                </td>
            </tr>
<?php endforeach; ?>
    </table>
</div>

<div>  

    <table id="liste-entreprise" style="width:100%">
        <tr>
            <th>Logo</th>
            <th>Nom</th> 
            <th>Mail</th>
            <th>Valider</th>
        </tr>
<?php foreach ($entreprises as $key => $entreprise) : ?>
            <tr>
                <td><img src=".../uploads/<?php echo $entreprise['avatar']; ?>"></td>
            </tr>
            <tr>
                <td><?php echo $entreprise['nom']; ?></td>
            </tr>
            <tr>
                <td><?php echo $entreprise['mail']; ?></td>
            </tr>
            <tr>
                <td>
                    <input type="checkbox" id="actif-<?php echo $entreprise['id']; ?>" data-id="<?php echo $entreprise['id']; ?>" name="actif" <?php echo ($entreprise['validation'] == 1) ? 'checked' : ''; ?> />
                    <label for="actif-<?php echo $entreprise['id']; ?>">Actif <i class="fa fa-spinner fa-pulse fa-fw hidden"></i></label>
                </td>
            </tr>
<?php endforeach; ?>
    </table>

</div>
</section>


</div>


<a class="btn deconnection" href="../admin/logout.php">Se déco</a>

<a class="btn mdp" href="../mpd_form.php">Modifier son mot de passe</a>

<?php require_once '../layout/footer.php'; ?>