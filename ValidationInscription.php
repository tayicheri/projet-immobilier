<?php
require_once 'classes/model/ModelUser.php';
require_once 'classes/utils/TestPreg.php';


if (isset($_GET['code'])) {
    $donnee = [$_GET['code'], $_GET['mail']];
    $type = ['code', 'mail'];
    $donneeOk = testPreg::testInput($donnee, $type);
    $codeParUrl = $donneeOk['donnee']['code'];
    $codeParBDD = ModelUser::getByMail($donneeOk['donnee']['mail'])['token'];

   
    if ($codeParUrl == $codeParBDD) {
        ModelUser::confirmCompte($donneeOk['donnee']['mail']);
        header('location:ConnexionUser.php?mailValider=1');
    }
}
