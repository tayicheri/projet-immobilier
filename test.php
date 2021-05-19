<?php

require_once 'classes/view/ViewTemplate.php';

ViewTemplate::baliseTop();

?>
<div class="container ">
    <div class="row">

        <form class="col-md-6" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">


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
        <div class="col-md-6 text-center">
            <div class="card text-white  bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header">Tu n'as pas encore de compte ?</div>
                <div class="card-body">
                    <h5 class="card-title">Rejoins Nous</h5>
                    <p class="card-text">Rejoingnez  la commnauté Log'Tay en vous creant un compte. Votre reve est a portée de main!</p>
                </div>
            </div>
        </div>


    </div>

    <?php

    ViewTemplate::baliseBottom();
    ?>