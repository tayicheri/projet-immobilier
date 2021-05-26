<?php
require_once '../model/ModelTypeBien.php';
require_once '../model/ModelAnnonce.php';
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
                                <input type="file" class="custom-file-input" name="photoP" id="photoP" required accept="image/*">
                                <label class="custom-file-label col-md-12" id="labelPhotoP" for="customFile">photo Principal</label>
                            </div>
                            <div class="custom-file ml-3 mt-4 col-md-12">
                                <input type="file" class="custom-file-input" name="photos[]" id="photos" required multiple accept="image/*">
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


    public static function annonce($id)
    {
        $data = ModelAnnonce::annonceViaId($id);
        var_dump($data);
        $photo=json_decode($data['photos']);
    ?>

        <main id="main">

            <!-- ======= Intro Single ======= -->
            <section class="intro-single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-8">
                            <div class="title-single-box">
                                <h1 class="title-single"><?php echo ucfirst($data['titre']) ?></h1>
                                <span class="color-text-a"> <?php echo ucfirst($data['ville']) . ', ' . $data['cp'] ?></span>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="Accueil.php">Accueil</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="Annonce.php">Annonces</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo ucfirst($data['titre']) ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section><!-- End Intro Single-->

            <!-- ======= Property Single ======= -->
            <section class="property-single nav-arrow-b">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="property-single-carousel" class="owl-carousel owl-arrow gallery-property">
                                <div class="carousel-item-b">
                                    <img src="assets/img/slide-2.jpg" alt="">
                                </div>
                                <div class="carousel-item-b">
                                    <img src="assets/img/slide-3.jpg" alt="">
                                </div>
                                <div class="carousel-item-b">
                                    <img src="assets/img/slide-1.jpg" alt="">
                                </div>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-md-5 col-lg-4">
                                    <div class="property-price d-flex justify-content-center foo">
                                        <div class="card-header-c d-flex">
                                            <div class="card-box-ico">
                                                <span class="ion-money">$</span>
                                            </div>
                                            <div class="card-title-c align-self-center">
                                                <h5 class="title-c">15000</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-summary">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="title-box-d section-t4">
                                                    <h3 class="title-d">Quick Summary</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="summary-list">
                                            <ul class="list">
                                                <li class="d-flex justify-content-between">
                                                    <strong>Property ID:</strong>
                                                    <span>1134</span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Location:</strong>
                                                    <span>Chicago, IL 606543</span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Property Type:</strong>
                                                    <span>House</span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Status:</strong>
                                                    <span>Sale</span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Area:</strong>
                                                    <span>340m
                                                        <sup>2</sup>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Beds:</strong>
                                                    <span>4</span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Baths:</strong>
                                                    <span>2</span>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <strong>Garage:</strong>
                                                    <span>1</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-7 section-md-t3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <h3 class="title-d">Property Description</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="property-description">
                                        <p class="description color-text-a">
                                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit
                                            neque, auctor sit amet
                                            aliquam vel, ullamcorper sit amet ligula. Cras ultricies ligula sed magna dictum porta.
                                            Curabitur aliquet quam id dui posuere blandit. Mauris blandit aliquet elit, eget tincidunt
                                            nibh pulvinar quam id dui posuere blandit.
                                        </p>
                                        <p class="description color-text-a no-margin">
                                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Donec rutrum congue leo eget
                                            malesuada. Quisque velit nisi,
                                            pretium ut lacinia in, elementum id enim. Donec sollicitudin molestie malesuada.
                                        </p>
                                    </div>
                                    <div class="row section-t3">
                                        <div class="col-sm-12">
                                            <div class="title-box-d">
                                                <h3 class="title-d">Amenities</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="amenities-list color-text-a">
                                        <ul class="list-a no-margin">
                                            <li>Balcony</li>
                                            <li>Outdoor Kitchen</li>
                                            <li>Cable Tv</li>
                                            <li>Deck</li>
                                            <li>Tennis Courts</li>
                                            <li>Internet</li>
                                            <li>Parking</li>
                                            <li>Sun Room</li>
                                            <li>Concrete Flooring</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <ul class="nav nav-pills-a nav-pills mb-3 section-t3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-video-tab" data-toggle="pill" href="#pills-video" role="tab" aria-controls="pills-video" aria-selected="true">Video</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-plans-tab" data-toggle="pill" href="#pills-plans" role="tab" aria-controls="pills-plans" aria-selected="false">Floor Plans</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-map-tab" data-toggle="pill" href="#pills-map" role="tab" aria-controls="pills-map" aria-selected="false">Ubication</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-video" role="tabpanel" aria-labelledby="pills-video-tab">
                                    <iframe src="https://player.vimeo.com/video/73221098" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                </div>
                                <div class="tab-pane fade" id="pills-plans" role="tabpanel" aria-labelledby="pills-plans-tab">
                                    <img src="assets/img/plan2.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="tab-pane fade" id="pills-map" role="tabpanel" aria-labelledby="pills-map-tab">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes+Square!5e0!3m2!1ses-419!2sve!4v1510329142834" width="100%" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row section-t3">
                                <div class="col-sm-12">
                                    <div class="title-box-d">
                                        <h3 class="title-d">Contact Agent</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <img src="assets/img/agent-4.jpg" alt="" class="img-fluid">
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="property-agent">
                                        <h4 class="title-agent">Anabella Geller</h4>
                                        <p class="color-text-a">
                                            Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet
                                            dui. Quisque velit nisi,
                                            pretium ut lacinia in, elementum id enim.
                                        </p>
                                        <ul class="list-unstyled">
                                            <li class="d-flex justify-content-between">
                                                <strong>Phone:</strong>
                                                <span class="color-text-a">(222) 4568932</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Mobile:</strong>
                                                <span class="color-text-a">777 287 378 737</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Email:</strong>
                                                <span class="color-text-a">annabella@example.com</span>
                                            </li>
                                            <li class="d-flex justify-content-between">
                                                <strong>Skype:</strong>
                                                <span class="color-text-a">Annabela.ge</span>
                                            </li>
                                        </ul>
                                        <div class="socials-a">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="property-contact">
                                        <form class="form-a">
                                            <div class="row">
                                                <div class="col-md-12 mb-1">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Name *" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control form-control-lg form-control-a" id="inputEmail1" placeholder="Email *" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-1">
                                                    <div class="form-group">
                                                        <textarea id="textMessage" class="form-control" placeholder="Comment *" name="message" cols="45" rows="8" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-a">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End Property Single-->

        </main><!-- End #main -->



<?php }
}
