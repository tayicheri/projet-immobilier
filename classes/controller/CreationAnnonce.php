<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../utils/TestPreg.php';

if (!isset($_SESSION['id']) && empty($_SESSION['role'])) {
    header('location:ConnexionUser.php');
    exit();
} else {
    
}
