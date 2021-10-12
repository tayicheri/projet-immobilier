<?php
require_once '../view/ViewTemplate.php';
require_once '../utils/TestPreg.php';
require_once '../utils/Email.php';
require_once '../model/ModelUser.php';


if (isset($_POST['mail'])) {
    $donnee = [$_POST['mail']];
    $type = ['email'];
    $donneeOk = testPreg::testInput($donnee, $type);
    if ($donneeOk['ok']) {
        $donneeOk = $donneeOk['donnee'];
        if (ModelUser::getByMail($donneeOk['email'])) {
            $code = uniqid();
            ModelUser::modifColonneUser('token', $code, $donneeOk['email']);
            modifPassword($donneeOk['email'], $code);
            ViewTemplate::alerte('secondary', 'pour modifier votre mot de passe ,suivez le lien dans vos email', '', '');
        } else {
            ViewTemplate::alerte('secondary', 'adresse inccorect. Pour reessayer cliquez', 'ConnexionUser.php', 'ici');
        }
    } else {
        ViewTemplate::alerte('secondary', 'Donnée non correcte', '', '');
    }
} else {
    header('location:Accueil.php');
}
