<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAnnonce.php';
require_once '../model/ModelAnnonce.php';
require_once '../utils/TestPreg.php';
if (!isset($_SESSION['id'])) {
    header('location:ConnexionUser.php');
} else {
    if (isset($_GET['id'])) {

        $donnee = [$_GET['id']];
        $type = ['id'];
        $donneeOk = testPreg::testInput($donnee, $type);
        if ($donneeOk['ok']) {

            
        } else {

            header('location:Accueil.php?alert=Donnee+corompue,modification+de+l+annonce+annuler');
        }
    } else {
        header('location:Annonce.php?mesAnnonces=1');
    }
}
