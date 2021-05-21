<?php
session_start();
require_once '../view/ViewTemplate.php';

ViewTemplate::baliseTop();

ViewTemplate::navBar();
?><div style="padding-top: 300px;">
    <?php

    var_dump($_SESSION);
   


    ?>
</div>
<?php
ViewTemplate::footer();
ViewTemplate::baliseBottom();
