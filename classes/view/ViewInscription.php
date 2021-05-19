<?php
class ViewInscription
{
    public static function formInscription()
    { ?>

        <main id="main">

            <!-- ======= Intro Single ======= -->
            <section class="intro-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="title-single-box">
                                <h1 class="title-single">Je veux M'inscrire</h1>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="i.php">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        M'inscrire
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- FORMULAIRE D4INSCRIPTION  -->
                    <div>
                        <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
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


                            <div class="col-md-12 mt-2">
                                <button type="submit" name="validerInscription" id="validerInscription" class="btn btn-success">valider</button>
                                <button type="reset" class="btn btn-primary ml-2">effacer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </section><!-- End Intro Single-->
        </main>
    <?php  }

    public static function reponseToken($code, $mail, $ok)
    { ?>
        <!-- ======= Intro Single ======= -->
        <section class="intro-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="title-single-box">
                            <h1 class="title-single">Inscription Prise en compte</h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="i.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    M'inscrire
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <?php if ($ok == 1) { ?>
                    <div class="text-center mt-5">
                        Pour valider votre inscription, veuillez cliquez <a class="text-success" href="ValidationInscription.php?code=<?php echo $code ?>&mail=<?php echo $mail ?>">ici</a>
                    </div> <?php }
                     else { ?>
                    <div class="text-center mt-5">
                        Cet utilisateur existe deja, pour reessayer cliquez <a class="text-success" href="inscription.php">ici</a>
                    </div> 
                    <?php } ?>
            </div>
        </section><!-- End Intro Single-->
        </main>
<?php }
}
