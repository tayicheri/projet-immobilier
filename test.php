<?php

require_once 'classes/view/ViewTemplate.php';

ViewTemplate::baliseTop();

?>
<div class="container ">
    <form class="row" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="inscriNom" name="inscriNom">
        </div>
        <div class="form-group col-md-6">
            <label for="Prenom">Prenom</label>
            <input type="text" class="form-control" id="inscriPrenom" name="inscriPrenom">
        </div>
        <div class="form-group col-md-6">
            <label for="tel">Numero de telephone</label>
            <input type="text" class="form-control" id="inscriTel" name="inscriTel">
        </div>
        <div class="form-group col-md-6">
            <label for="exampleFormControlInput1">Adresse Email</label>
            <input type="email" class="form-control" id="inscriMail" name="inscriMail" placeholder="name@example.com">
        </div>
        <div class="form-group col-md-6">
            <label for="mdp">Mot de Passe</label>
            <input type="password" class="form-control" id="inscriMdp" name="inscriMdp">
        </div>
        <div class="custom-file col-md-12">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label col-md-12" id="labelCustomFile" for="customFile"></label>
        </div>

        <div class="col-md-12 mt-2">
            <button type="submit" class="btn btn-success">valider</button>
            <button type="reset" class="btn btn-primary ml-2">effacer</button>
        </div>
    </form>
</div>

<?php

ViewTemplate::baliseBottom();
?>
<script>
    $('#customFile').change(function(e) {
        let val = $(this).val()
        val = val.split('\\')
        $('#labelCustomFile').text(val[val.length - 1])
    })
</script>