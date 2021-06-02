<?php
require_once '../model/ModelUser.php';

if (isset($_POST['desactive'])) {
    ModelUser::modifColonneUser('actif', '0', $_POST['desactive']);
} else if (isset($_POST['active'])) {
    ModelUser::modifColonneUser('actif', '1', $_POST['active']);
} else {
    header('location:Accueil.php');
}
