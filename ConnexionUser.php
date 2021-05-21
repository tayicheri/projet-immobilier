<?php
session_start();
require_once 'classes/view/ViewTemplate.php';
require_once 'classes/view/ViewConnexion.php';
require_once 'classes/view/ViewInscription.php';
require_once 'classes/model/ModelUser.php';
require_once 'classes/utils/TestPreg.php';
//controle si une session est en cours
if (isset($_SESSION['mail']) && !empty($_SESSION['mail'])) {
    header('location:Accueil.php');
    exit();
} else {


    //connexion user
    if (isset($_POST['validerConnexion'])) {
        $donnee = [$_POST['connexMail'], $_POST['connexMdp']];
        $typeTest = ['email', 'mdp'];
        $donneeOk = testPreg::testInput($donnee, $typeTest);
        if ($donneeOk['ok']) {
            $donneeOk = $donneeOk['donnee'];
            if (ModelUser::getByMail($donneeOk['email'])) {
                if (password_verify($donneeOk['mdp'], ModelUser::getByMail($donneeOk['email'])['pass'])) {
                    if (ModelUser::getByMail($donneeOk['email'])['confirme']) {
                        $_SESSION['mail'] = $donneeOk['email'];
                        header('location:Accueil.php');
                    } else {
                        ViewTemplate::baliseTop();
                        ViewTemplate::navBar();
                        ViewConnexion::formConnexion();
                        ViewTemplate::alerte('success', "vous n'avez pas activer votre compte. Pour le faire cliquez", 'ValidationInscription.php?code=' . ModelUser::getByMail($donneeOk['email'])['token'] . '&mail=' . $donneeOk['email'], 'ici');
                    }
                } else {
                    ViewTemplate::baliseTop();
                    ViewTemplate::navBar();
                    ViewConnexion::formConnexion();
                    ViewTemplate::alerte('secondary', 'Mot de passe incorrect', '', '');
                }
            } else {
                ViewTemplate::baliseTop();
                ViewTemplate::navBar();
                ViewConnexion::formConnexion();
                ViewTemplate::alerte('secondary', 'Email incorrect', '', '');
            }
        } else {
            //retour validation client negatif
            ViewTemplate::baliseTop();
            ViewTemplate::navBar();
            ViewConnexion::formConnexion();
            ViewTemplate::alerte('secondary', $donneeOk['retour'], '', '');
        }
    }
    //redirection recu de la  page validation inscrption
    else if (isset($_GET['mailValider'])) {
        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        ViewConnexion::formConnexion();
        ViewTemplate::alerte('success', 'le compte a été confirmer', '', '');
    }
    //redirection recu du lien reinitialisation de mdp
    else if (isset($_GET['code']) && isset($_GET['mail'])) {
        $donnee = [$_GET['code'], $_GET['mail']];
        $typeTest = ['code',  'email'];
        $donneeOk = testPreg::testInput($donnee, $typeTest);
        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        if ($donneeOk['ok']) {
            ViewInscription::reinitMdp(1, $donneeOk['donnee']['email']);
        } else {

            ViewInscription::reinitMdp(0, 0);
        }
    }
    //formulaire modif mot de passe a été valider 
    else if (isset($_POST['validerReinitMpd'])) {

        $donnee = [$_POST['reinitMpd'], $_POST['mail']];
        $typeTest = ['mdp', 'email'];
        $donneeOk = testPreg::testInput($donnee, $typeTest);
        if ($donneeOk['ok']) {
            $donneeOk = $donneeOk['donnee'];
            ModelUser::modifColonneUser('pass', password_hash($donneeOk['mdp'], PASSWORD_DEFAULT), $donneeOk['email']);

            //on ecrase le token pour soit inutilisable 
            ModelUser::modifColonneUser('token', uniqid(), $donneeOk['email']);

            //on connecte l'user apres modif du mdp
            $_SESSION['mail'] = $donneeOk['email'];
            header('location:Accueil.php');
        } else {
            //reponse validation serveur negative
            ViewInscription::reinitMdp(1, 1);
            ViewTemplate::alerte('secondary', 'donnée pas au bon format', '', '');
        }
    } else {

        //page de connexion innitial 
        ViewTemplate::baliseTop();
        ViewTemplate::navBar();
        ViewConnexion::formConnexion();
    }

    //footer de la page, cas d abscence de session
    ViewTemplate::footer();
    ViewTemplate::baliseBottom();
}
?>
<script>
    //affichage formulaire de demande de recuperation mdp
    $("#oubliMdp").click(function(e) {

        $('#formMdpOublie').removeClass('d-none')
        $('#formConnexion').addClass('d-none')
        $('#jeVeuxMe').text('Je veux Reinitialiser')
        $('#mailMdpOublie').val($('#connexMail').val())
    });



    $('#validerOubliMdp').click(function(e) {
        if (!(tabRegex['email'].test($('#mailMdpOublie').val()))) {

            $("#mailMdpOublie").addClass("bg-danger text-white");
        } else {
            let a = {
                mail: $('#mailMdpOublie').val()
            }
            generationAjax('classes/controller/MdpOublie.php', a, 'html', 'formMdpOublie')

        }
    })
</script>

<script>
    //validation client 
    //form connexion
    let typeConnexion = ['email', 'mdp']
    validationClient('formConnexion', typeConnexion)
    //form validation reinitialisation mdp

    $('#validerReinitMpd').click(function(e) {
        if (!(tabRegex['mdp'].test($('#reinitMpd').val()))) {
            e.preventDefault()
            $("#reinitMpd").addClass("bg-danger text-white");
        }
    })
</script>