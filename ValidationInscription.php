<?php
require_once 'classes/model/ModelUser.php';


if (isset($_GET['code'])) {
    $codeParUrl = $_GET['code'];
    $codeParBDD = ModelUser::getByMail($_GET['mail'])['token'];

    var_dump($codeParBDD, $codeParUrl);
    if ($codeParUrl==$codeParBDD  ) {
        ModelUser::confirmCompte($_GET['mail']);
        header('location:Accueil.php?mailValider=1');
    }
}
