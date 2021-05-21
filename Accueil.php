<?php
session_start();
require_once 'classes/view/ViewTemplate.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();
?><div style="padding-top: 300px;">
    <?php

   echo isset($_SESSION['conecteId']) ? var_dump($_SESSION['conecteId']) : 'non connecte';


    ?>
</div>
<?php
ViewTemplate::footer();
ViewTemplate::baliseBottom();
