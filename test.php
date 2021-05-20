<?php

require_once 'classes/view/ViewTemplate.php';

ViewTemplate::baliseTop();

?>
<div class="container ">
    <div class="row">

        <form class="col-md-9" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">


            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Adresse Email</label>
                <input type="email" class="form-control" id="inscriMail" name="inscriMail" placeholder="name@example.com">
            </div>
            <div class="form-group col-md-6">
                <label for="mdp">Mot de Passe</label>
                <input type="password" class="form-control" id="inscriMdp" name="inscriMdp">
            </div>


            <div class="col-md-12 mt-2">
                <button type="submit" name="validerInscription" id="validerInscription" class="btn btn-success">valider</button>
                <button type="submit" name="oubliMdp" id="oubliMdp" class="btn btn-primary ml-2">mot de passe oublier</button>
            </div>
        </form>
        <div class="col-md-3 text-center" id="droiteFormConnexion">
        <div class="form-group col-md-12">
            <label for="exampleFormControlInput1">Adresse Email</label>
            <input type="email" class="form-control" id="connexMail" value="<?php echo isset($_POST['connexMail']) ? $_POST['connexMail'] : '' ?>" name="connexMail" placeholder="name@example.com">
        </div>
        <div class="col-md-12 mt-2">
            <button type="button" name="validerOubliMdp" id="validerOubliMdp" class="btn btn-success">reinitialiser Mot de passe</button>
        </div>
        </div>

    </div>
</div>

<?php

ViewTemplate::baliseBottom();
?>