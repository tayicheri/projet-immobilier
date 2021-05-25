<?php
class ViewTemplate
{

    public static function baliseTop()
    {
?>
        <!DOCTYPE html>

        <html>

        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1  shrink-to-fit=no" />
            <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css" />
            <link rel="stylesheet" href="../../css/fontawesome/all.min.css" />
            <!-- Favicons -->
            <link href="../../assets/img/logtay.png" rel="icon">
            <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
            <!-- Vendor CSS Files -->
            <link href="../../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
            <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
            <link href="../../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

            <!-- Template Main CSS File -->
            <link href="../../assets/css/style.css" rel="stylesheet">




            <link rel="stylesheet" href="../../css/styles.css" />
            <title>HTML</title>
        </head>

        <body>


        <?php }

    public static function baliseBottom()
    { ?>

            <script src="../../js/jquery/jquery-3.5.1.min.js"></script>
            <script src="../../js/bootstrap/bootstrap.min.js"></script>
            <script src="../../js/fontawesome/all.min.js"></script>
            <!-- Vendor JS Files -->
            <script src="../../assets/vendor/php-email-form/validate.js"></script>
            <script src="../../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
            <script src="../../assets/vendor/scrollreveal/scrollreveal.min.js"></script>
            <!-- Template Main JS File -->
            <script src="../../assets/js/main.js"></script>
            <script src="../../js/testPreg.js"></script>
            <script src="../../js/jsTay.js"></script>

        </body>

        </html>

    <?php  }

    public static function navBar()
    { ?>
        <!-- ======= Property Search Section ======= -->
        <div class="click-closed"></div>
        <!--/ Form Search Star /-->
        <div class="box-collapse">
            <div class="title-box-d">
                <h3 class="title-d">Search Property</h3>
            </div>
            <span class="close-box-collapse right-boxed ion-ios-close"></span>
            <div class="box-collapse-wrap form">
                <form class="form-a">
                    <div class="row">
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label for="Type">Keyword</label>
                                <input type="text" class="form-control form-control-lg form-control-a" placeholder="Keyword">
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <select class="form-control form-control-lg form-control-a" id="Type">
                                    <option>All Type</option>
                                    <option>For Rent</option>
                                    <option>For Sale</option>
                                    <option>Open House</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="city">City</label>
                                <select class="form-control form-control-lg form-control-a" id="city">
                                    <option>All City</option>
                                    <option>Alabama</option>
                                    <option>Arizona</option>
                                    <option>California</option>
                                    <option>Colorado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="bedrooms">Bedrooms</label>
                                <select class="form-control form-control-lg form-control-a" id="bedrooms">
                                    <option>Any</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="garages">Garages</label>
                                <select class="form-control form-control-lg form-control-a" id="garages">
                                    <option>Any</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="bathrooms">Bathrooms</label>
                                <select class="form-control form-control-lg form-control-a" id="bathrooms">
                                    <option>Any</option>
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-2">
                            <div class="form-group">
                                <label for="price">Min Price</label>
                                <select class="form-control form-control-lg form-control-a" id="price">
                                    <option>Unlimite</option>
                                    <option>$50,000</option>
                                    <option>$100,000</option>
                                    <option>$150,000</option>
                                    <option>$200,000</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-b">Search Property</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- End Property Search Section -->

        <!-- ======= Header/Navbar ======= -->
        <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top" id="navbartay">
            <div class="container">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a class="navbar-brand text-brand" href="Accueil.php">Log'<span class="color-b">Tay</span></a>
                <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                    <span class="fa fa-search" aria-hidden="true"></span>
                </button>
                <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link p-md-2 bg-success text-white rounded-pill" href="CreationAnnonce.php">Deposer une annonce</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">Acheter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="property-grid.html">louer</a>
                        </li>

                        <?php if (isset($_SESSION['id'])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $_SESSION['nom'] ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">Mon profil</a>
                                    <a class="dropdown-item" href="">Mes favoris</a>
                                    <a class="dropdown-item" href="">Mes annonces</a>
                                    <?php if ($_SESSION['role']) { ?> <a class="dropdown-item" href="TypeBiens.php">Les Types de Biens</a> <?php } ?>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="Deconnexion.php" class="nav-link">Deconnexion</a>
                            </li> <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="inscription.php">S'inscrire</a>
                            </li>
                            <li class="nav-item">
                                <a href="ConnexionUser.php" class="nav-link btn">Connexion</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                    <span class="fa fa-search" aria-hidden="true"></span>
                </button>
            </div>
        </nav><!-- End Header/Navbar -->


    <?php }
    public static function footer()
    { ?>
        <!-- ======= Footer ======= -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="nav-footer">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="Accueil.php">Accueil</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Acheter</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Louer</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Vendre</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="socials-a">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-facebook" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-instagram" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fab fa-dribbble" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="copyright-footer">
                            <p class="copyright color-text-a">
                                &copy; Copyright
                                <span class="color-a">Log'Tay</span> All Rights Reserved.
                            </p>
                        </div>
                        <div class="credits">
                            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer> <!-- End  Footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <div id="preloader"></div>
    <?php }

    public static function alerte($type, $message, $lien, $messageLien)
    { ?>
        <div class="alert text-center alert-<?php echo $type ?>" role="alert">
            <?php echo $message ?> <a href="<?php echo $lien ?>"><?php echo $messageLien ?></a>
        </div>
<?php }
}
