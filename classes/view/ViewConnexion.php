<?php

class ViewConnexion
{

    public static function formConnexion()
    { ?>

        <main id="main">

            <!-- ======= Intro Single ======= -->
            <section class="intro-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="title-single-box">
                                <h1 class="title-single">Je veux Me Connecter</h1>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Accueil.php">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Me Connecter
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- FORMULAIRE De Connexion  -->
                    <div class="row">
                        <form class="col-md-9" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">


                            <div class="form-group col-md-6">
                                <label for="exampleFormControlInput1">Adresse Email</label>
                                <input type="email" class="form-control" id="connexMail" value="<?php echo isset($_POST['connexMail']) ? $_POST['connexMail'] : '' ?>" name="connexMail" placeholder="name@example.com">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mdp">Mot de Passe</label>
                                <input type="password" class="form-control" id="connexMdp"  name="connexMdp">
                            </div>


                            <div class="col-md-12 mt-2">
                                <button type="submit" name="validerConnexion" id="validerConnexion" class="btn btn-success">connexion</button>
                                <button type="submit" name="oubliMdp" id="oubliMdp" class="btn btn-secondary ml-2">mot de passe oublier</button>
                            </div>
                        </form> <!-- End Formulaire de connexion -->
                        <div class="col-md-3 text-center">
                            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Tu n'as pas encore de compte ?</div>
                                <div class="card-body text-secondary">
                                    <a href="inscription.php">
                                        <h5 class="card-title text-success">Rejoins Nous</h5>
                                    </a>
                                    <p class="card-text">Rejoingnez la commnauté Log'Tay en vous creant un compte. Votre reve est a portée de main!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Intro Single-->
        </main>

<?php }
}
