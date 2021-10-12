<?php


function confirmEmail($contact, $token)
{



    $from = "tayi@tay-dev.com";
    $to = $contact;
    $subject = "Confirmation d'inscription";
    $message = "Bonjour
    Vous venez de vous inscrire sur l'exercice Log'Tay. Pour confirmer votre inscription cliquez sur le lien https://www.tay-dev.com/classes/controller/ValidationInscription.php?code=" . $token . "&mail=" . $contact;
    $headers = "From:" . $from;
    if (mail($to, $subject, $message, $headers)) {
        echo "L'email a été envoyé.";
    } else {
        echo "erreur envoie email";
    };
}

function modifPassword($contact,$token){

    $from = "tayi@tay-dev.com";
    $to = $contact;
    $subject = "Mot de passe oublié";
    $message = "Bonjour
    Vous venez de demander a reinitialiser votre mot de passe. Pour modifier cliquez sur le lien https://www.tay-dev.com/classes/controller/ConnexionUser.php?code=" . $token . "&mail=" . $contact;
    $headers = "From:" . $from;
    if (mail($to, $subject, $message, $headers)) {
        echo "L'email a été envoyé.";
    } else {
        echo "erreur envoie email";
    };

}