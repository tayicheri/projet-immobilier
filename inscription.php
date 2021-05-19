<?php

require_once 'classes/view/ViewTemplate.php';
require_once 'classes/view/ViewInscription.php';
require_once 'classes/model/ModelUser.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();
if(isset($_GET['mailValider'])){

}else if (isset($_POST['validerInscription'])) {
    if (ModelUser::getByMail($_POST['inscriMail'])) {
        ViewInscription::reponseToken($code, $_POST['inscriMail'], 0);
    } else {

        $code = mt_rand(100000, 999999);
        ModelUser::ajoutUser($_POST['inscriNom'], $_POST['inscriPrenom'], $_POST['inscriMail'], $_POST['inscriTel'], $_POST['inscriMdp'], $code);
        ViewInscription::reponseToken($code, $_POST['inscriMail'], 1);
    }
} else {
    ViewInscription::formInscription();
}


ViewTemplate::footer();
ViewTemplate::baliseBottom();
