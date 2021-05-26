<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAnnonce.php';
require_once '../utils/TestPreg.php';

if (!isset($_SESSION['id']) && empty($_SESSION['role'])) {
    header('location:ConnexionUser.php');
    exit();
} else {
    if (isset($_POST['validerAjoutAnnonce'])) {
        $donnee = [
            $_POST['titre'],
            $_POST['type'],
            $_POST['typeBienAnnonce'],
            $_POST['surface'],
            $_POST['prix'],
            $_POST['description'],
            $_POST['adresse'],
            $_POST['cp'],
            $_POST['ville'],
            $_SESSION['id']
        ];
        $type = ['titre', 'type', 'typeBien', 'surface', 'prix', 'description', 'adresse', 'cp', 'ville', 'id'];
        $donneeOk = testPreg::testInput($donnee, $type);
        if ($donneeOk['ok']) {
            
        } else {
            ViewTemplate::baliseTop();
            ViewTemplate::navBar();
            ViewAnnonce::formAjout();
            ViewTemplate::alerte('secondary', $donneeOk['retour'], '', '');
        }
    } else {

        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        ViewAnnonce::formAjout();
    }

    ViewTemplate::footer();
    ViewTemplate::baliseBottom();
}
