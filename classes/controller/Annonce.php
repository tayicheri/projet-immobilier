<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAnnonce.php';
require_once '../model/ModelAnnonce.php';
require_once '../utils/TestPreg.php';


if (isset($_GET['id'])) {
    $donnee = [$_GET['id']];
    $type = ['id'];
    $donneeOk = testPreg::testInput($donnee, $type);
    if ($donneeOk['ok']) {
        $donneeOk = $donneeOk['donnee'];
        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        ViewAnnonce::annonce($donneeOk['id']);
    } else {
        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        ViewTemplate::alerte('secondary" style="margin-top:250px;" ', 'Donnée incorrect,retour a l\'Accueil', 'Accueil.php', 'ici');
    }
} else if (isset($_GET['mesAnnonces'])) {
    if (isset($_SESSION['id'])) {
        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        $dataUser = new ModelUser($_SESSION['id']);
        if ($dataUser->getAnnonces()) {
            ViewAnnonce::mesAnnonces($dataUser->getAnnonces());
        } else {
            ViewTemplate::alerte('secondary " style="margin-top:250px;" ', 'Vous n\'avez auccune Annonce,Ajouter une annonce', 'CreationAnnonce.php', 'ici');
        }
    } else {
        header('location:ConnexionUser.php');
    }
} else {
    header('location:Accueil.php');
}




ViewTemplate::footer();
ViewTemplate::baliseBottom();
?>
