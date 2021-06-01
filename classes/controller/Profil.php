<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewAnnonce.php';
require_once '../view/ViewInscription.php';
require_once '../model/ModelAnnonce.php';
require_once '../utils/TestPreg.php';

ViewTemplate::baliseTop();
ViewTemplate::navBar();
ViewTemplate::baliseMain(1);
ViewInscription::voirProfil($_SESSION['id']);
$user = new ModelUser($_SESSION['id']);
$user->getRole() ? ViewInscription::listeUser() : '';
ViewTemplate::baliseMain(0);
ViewTemplate::footer();
ViewTemplate::baliseBottom();
