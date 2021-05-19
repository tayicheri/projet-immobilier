<?php

require_once 'classes/view/ViewTemplate.php';
require_once 'classes/view/ViewConnexion.php';
require_once 'classes/model/ModelUser.php';
require_once 'classes/utils/TestPreg.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();

ViewConnexion::formConnexion();
ViewTemplate::footer();
ViewTemplate::baliseBottom();
