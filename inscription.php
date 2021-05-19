<?php

require_once 'classes/view/ViewTemplate.php';
require_once 'classes/view/ViewInscription.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();

ViewInscription::formInscription();
ViewTemplate::footer();
ViewTemplate::baliseBottom();
