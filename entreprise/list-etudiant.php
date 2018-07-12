<?php
require_once '../lib/functions.php';
require_once '../model/database.php';
require_once '../layout/footer.php';


$etudiants = getAllEtudiants();

getHeader("Espace étudiant");
?>

<section class="head_list">

    <button class="btn retour"><a href="index.php">Retour</a></button>
    <h1>Trouvez l'élu</h1>
    <p>Sélectionnez vos besoins</p>

    <select id="departement" >
        <option value="" selected>Choisir un département</option>
        <?php
        $departements = getAllDepartement();
        foreach ($departements as $departement) :
            ?>
            <option value=<?php echo $departement['id'] . '>' . $departement['label']; ?></option>
        <?php endforeach; ?>
    </select>

    <select id="niveau">
        <option value="" selected>Choisir un niveau d'études</option>
        <?php
        $niveaux = getAllNiveau();
        foreach ($niveaux as $niveau) :
            ?>
            <option value=<?php echo $niveau['id'] . '>' . $niveau['label']; ?></option>
        <?php endforeach; ?>
    </select>

    <select id="specialite">
        <option value="" selected>Choisir une spécialité</option>
        <?php
        $specialites = getAllSpecialite();
        foreach ($specialites as $specialite) :
            ?>
            <option value=<?php echo $specialite['id'] . '>' . $specialite['label']; ?></option>
        <?php endforeach; ?>
    </select>

</section>




<section class="container-page">

</section>



<script type="text/javascript">
    $(document).ready(function ()
    {
        $.ajax({
            url: "ajax.php",
            type: 'POST',
            data: "creation=1",
            success: function (result)
            {
                $('.container-page').html(result);
            }
        });
    });

    $('#departement, #niveau, #specialite').on('change', function ()
    {
        var data = "creation=1&departement=" + $('select[id="departement"] > option:selected').val()

        if (($('select[id="niveau"] > option:selected').val() != "") && ($('select[id="specialite"] > option:selected').val() != ""))
        {
            data = data + "&niveau_etude=" + $('select[id="niveau"] > option:selected').val() + "&specialite=" + $('select[id="specialite"] > option:selected').val();
        } else if ($('select[id="niveau"] > option:selected').val() != "")
        {
            data = data + "&niveau_etude=" + $('select[id="niveau"] > option:selected').val() + "&specialite=0";
        } else if ($('select[id="specialite"] > option:selected').val() != "")
        {
            data = data + "&niveau_etude=0" + "&specialite=" + $('select[id="specialite"] > option:selected').val();
        } else
        {
            data = data + "&niveau_etude=0&specialite=0"
        }

        $.ajax({
            url: "ajax.php",
            type: 'POST',
            data: data,
            success: function (result)
            {
                $('.container-page').html(result);
            }
        });
    });
</script>
