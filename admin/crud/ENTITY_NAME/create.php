<?php require_once '../../layout/header.php'; ?>

<h1>Nouveau membre</h1>

<form action="create_query.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname" class="form-control">
    </div>
    <div class="form-group">
        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" class="form-control">
    </div>
    <div class="form-group">
        <label for="picture">Photo</label>
        <input type="file" id="picture" name="picture" accept="image/*" class="form-control">
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Enregistrer</button>
</form>


<?php require_once '../../layout/footer.php'; ?>

