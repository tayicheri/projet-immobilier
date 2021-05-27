<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAnnonce.php';
require_once '../utils/TestPreg.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();
ViewAnnonce::grosCarousel(10,11,12);
?><div >
    <?php

    var_dump($_SESSION);



    ?>
</div>

<?php

if (isset($_GET['alert'])) {
    $donnee = [$_GET['alert']];
    $type = ['alert'];
    $donneeOk = testPreg::testInput($donnee, $type);
    if ($donneeOk['ok']) {
        ViewTemplate::alerte('secondary', $donneeOk['donnee']['alert'], '', '');
    }
}

ViewTemplate::footer();
ViewTemplate::baliseBottom();
