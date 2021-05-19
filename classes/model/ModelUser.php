<?php
require_once 'connexion.php';
class ModelUser
{
    // ajoute utilisateur via form CREATE
    static function ajoutUser($nom, $prenom, $mail, $tel, $mdp, $code)
    {
        $datay = connexion();
        $rPrep = $datay->prepare("INSERT INTO user (nom,prenom,mail,pass,tel,token) VALUES (:nom,:prenom,:mail,:mdp,:tel,:code)");
        $rPrep->execute([':nom' => $nom, ':prenom' => $prenom, ':mail' => $mail, ':tel' => $tel, ':mdp' => $mdp, ':code' => $code]);
    }

    //recup user via mail

    public static function getByMail($mail)
    {
        $datay = connexion();
        $rPrep = $datay->prepare("SELECT * FROM user WHERE mail=?");
        $rPrep->execute([$mail]);
        return $rPrep->fetch(pdo::FETCH_ASSOC);
    }

    //confirme compte via token
    public static function confirmCompte($mail)
    {
        $datay = connexion();
        $rPrep = $datay->prepare("UPDATE user SET confirmer='1' WHERE mail=? ");
        $rPrep->execute([$mail]);
    }
   
}
