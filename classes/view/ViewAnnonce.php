<?php
require_once '../model/ModelTypeBien.php';
class ViewAnnonce
{


    public static function formAjout()
    {
        $typeBien = ModelTypeBien::typeBiens();
?>

        <main id="main">

            <!-- ======= Intro Single ======= -->
            <section class="intro-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="title-single-box">
                                <h1 class="title-single">J'ajoute une Annonce</h1>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Accueil.php">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Ajout Annonce
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- FORMULAIRE D AJOUT ANNONCE  -->
                    <div>
                        <form class="row" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="ajoutAnnonce" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-md-12">
                                <label for="nom">Titre</label>
                                <input type="text" class="form-control" value="<?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['titre'] : '' ?>" id="titre" name="titre">
                            </div>


                            <div class="form-group col-md-4">
                                <label for="Prenom">Type d'offre</label>
                                <select name="type" id="type" class="custom-select">

                                    <option <?php echo isset($_POST['validerAjoutAnnonce']) ? '' : 'selected' ?>>selectioner votre type d'offre</option>
                                    <option value="1" <?php echo (isset($_POST['validerAjoutAnnonce'])) && ($_POST['type'] == 1) ? 'selected' : '' ?>>Location</option>
                                    <option value="0" <?php echo (isset($_POST['validerAjoutAnnonce'])) && ($_POST['type'] == 0) ? 'selected' : '' ?>>Vente</option>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Prenom">Type de Bien</label>
                                <select name="typeBienAnnonce" id="typeBienAnnonce" class="custom-select">

                                    <option selected>Open this select menu</option>
                                    <?php foreach ($typeBien as $type) { ?>
                                        <option value="<?php echo $type['id'] ?>" <?php echo (isset($_POST['validerAjoutAnnonce'])) && ($_POST['typeBienAnnonce'] == $type['id']) ? 'selected' : '' ?>><?php echo $type['libelle'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="Prenom">Surface</label>
                                <input type="number" class="form-control" value="<?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['surface'] : '' ?>" id="surface" name="surface">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="tel">Prix</label>
                                <input type="number" class="form-control" value="<?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['prix'] : '' ?>" id="prix" name="prix">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="description">description</label>
                                <textarea class="form-control" id="description" name="description" rows="9"><?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['description'] : '' ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label for="mdp">Adresse</label>
                                    <input type="text" class="form-control" value="<?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['adresse'] : '' ?>" id="adresse" name="adresse">
                                </div>
                                <div class="form-group ">
                                    <label for="mdp">Code Postal</label>
                                    <input type="number" class="form-control" value="<?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['cp'] : '' ?>" id="cp" name="cp">
                                </div>
                                <div class="form-group">
                                    <label for="mdp">Ville</label>
                                    <input type="text" class="form-control" value="<?php echo isset($_POST['validerAjoutAnnonce']) ? $_POST['ville'] : '' ?>" id="ville" name="ville">
                                </div>
                            </div>
                            <div class="custom-file ml-3 col-md-12">
                                <input type="file" class="custom-file-input" name="photoP" id="photoP" required>
                                <label class="custom-file-label col-md-12" id="labelPhotoP" for="customFile">photo Principal</label>
                            </div>
                            <div class="custom-file ml-3 mt-4 col-md-12">
                                <input type="file" class="custom-file-input" name="photos" id="photos" required>
                                <label class="custom-file-label col-md-12" id="labelPhotos" for="customFile">Autres Photos</label>
                            </div>

                            <div class="col-md-12 mt-2">
                                <button type="submit" name="validerAjoutAnnonce" id="validerAjoutAnnonce" class="btn btn-success">valider</button>
                                <button type="reset" class="btn btn-secondary ml-2">effacer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </section><!-- End Intro Single-->
        </main>
<?php }
}
