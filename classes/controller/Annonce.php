<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAnnonce.php';
require_once '../model/ModelAnnonce.php';
require_once '../utils/TestPreg.php';
ViewTemplate::baliseTop();
ViewTemplate::navBar();

if (isset($_GET['id'])) {
    $donnee = [$_GET['id']];
    $type = ['id'];
    $donneeOk = testPreg::testInput($donnee, $type);
    if ($donneeOk['ok']) {
        $donneeOk = $donneeOk['donnee'];
        ViewAnnonce::annonce(1);
        var_dump($_SESSION);
    }
}




ViewTemplate::footer();
ViewTemplate::baliseBottom();
