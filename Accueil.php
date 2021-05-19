<?php
 session_start();
require_once 'classes/view/ViewTemplate.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();


ViewTemplate::footer();
ViewTemplate::baliseBottom();
