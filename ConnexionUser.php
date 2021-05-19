<?php
session_start();
require_once 'classes/view/ViewTemplate.php';
require_once 'classes/view/ViewConnexion.php';
require_once 'classes/model/ModelUser.php';
require_once 'classes/utils/TestPreg.php';
if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) {
    header('location:Accueil.php');
} else {
    ViewTemplate::baliseTop();

    ViewTemplate::navBar();


    if (isset($_POST['validerConnexion'])) {
        $donnee = [$_POST['connexMail'], $_POST['connexMdp']];
        $typeTest = ['email', 'mdp'];
        $donneeOk = testPreg::testInput($donnee, $typeTest);
        if ($donneeOk['ok']) {
            $donneeOk = $donneeOk['donnee'];
            if (ModelUser::getByMail($donneeOk['email'])) {
                if (password_verify($donneeOk['mdp'], ModelUser::getByMail($donneeOk['email'])['pass'])) {
                    if (ModelUser::getByMail($donneeOk['email'])['confirmer']) {
                        $_SESSION['mail'] = $_POST['connexMail'];
                    } else {
                        ViewConnexion::formConnexion();
                        ViewTemplate::alerte('success', "vous n'avez pas activer votre compte. Pour le faire cliquez", 'ValidationInscription.php?code=' . ModelUser::getByMail($donneeOk['email'])['token'] . '&mail=' . $donneeOk['email'], 'ici');
                    }
                } else {
                    ViewConnexion::formConnexion();
                    ViewTemplate::alerte('secondary', 'Mot de passe incorrect', '', '');
                }
            } else {
                ViewConnexion::formConnexion();
                ViewTemplate::alerte('secondary', 'Email incorrect', '', '');
            }
        } else {
            ViewConnexion::formConnexion();
            ViewTemplate::alerte('secondary', $donneeOk['retour'], '', '');
        }
    } else if (isset($_GET['mailValider'])) {
        ViewConnexion::formConnexion();
        ViewTemplate::alerte('success', 'le compte a été confirmer', '', '');
    } else {

        ViewConnexion::formConnexion();
    }


    ViewTemplate::footer();
    ViewTemplate::baliseBottom();
}
