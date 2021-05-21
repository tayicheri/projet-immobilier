<?php
session_start();
require_once '../view/ViewTemplate.php';
require_once '../view/ViewTypeBiens.php';
if (!isset($_SESSION['id'])) {
    header('location:Accueil.php');
} else {
    ViewTemplate::baliseTop();

    ViewTemplate::navBar();


    ViewTypeBiens::listeTypeBiens1();


    ViewTemplate::footer();
    ViewTemplate::baliseBottom();
}
?>
<script>
    //affichage formulaire d'ajout
    $('#afficherAjoutType').click(function(e) {
        $('#listeTypeBiens').toggleClass('d-none');
        $('#formTypeBiens').toggleClass('d-none');
        $('#afficherAjoutType').text() == 'Ajouter' ? $('#afficherAjoutType').text(' Liste des Types') : $('#afficherAjoutType').text('Ajouter')
        $('#actifDansBien').text() == 'Ajouter' ? $('#actifDansBien').text(' Liste des Types') : $('#actifDansBien').text('Ajouter')
    })
</script>
<script>
   
</script>