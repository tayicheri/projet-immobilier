<?php
require_once 'connexion.php';
require_once '../utils/telechargement.php';
class ModelAnnonce
{

    public static function ajoutAnnonce($titre, $type, $typeBien, $surface, $prix, $description, $adresse, $cp, $ville, $imgJson, $userId)
    {
        $datay = connexion();
        $rPrep = $datay->prepare("INSERT INTO annonce VALUES (null,:titre,:descriptions,:surface,:photos,:adresse,:ville,:cp,:prix,:type,:typeBien_id)");
        $rPrep->execute([
            ':titre' => $titre,
            ':descriptions' => $description,
            ':surface' => $surface,
            ':photos' => $imgJson,
            ':adresse' => $adresse,
            ':ville' => $ville,
            ':cp' => $cp,
            ':prix' => $prix,
            ':type' => $type,
            ':typeBien_id' => $typeBien
        ]);
        $idAnnonce = $datay->lastInsertId();
        $rPrep2 = $datay->prepare('INSERT INTO user_annonce VALUES(:userId,:annonceId)');
        $rPrep2->execute([':userId' => $userId, ':annonceId' => $idAnnonce]);
        return $idAnnonce;
    }

    public static function annonceViaId($id)
    {
        $datay = connexion();
        $rPrep = $datay->prepare("SELECT annonce_id,titre,descriptions,surface,photos,adresse,ville,cp,prix,type,type_bien_id,user_id,nom,prenom,mail,tel FROM annonce
        INNER JOIN user_annonce
        ON annonce.id=user_annonce.annonce_id
        INNER JOIN user 
        ON user_annonce.user_id=user.id
        WHERE annonce.id=?");
        $rPrep->execute([$id]);
        return $rPrep->fetch(pdo::FETCH_ASSOC);
    }

    //anonce liste
    public static function annonceListe()
    {
        $datay = connexion();
        $rPrep = $datay->prepare("SELECT annonce_id,titre,descriptions,surface,photos,adresse,ville,cp,prix,type,type_bien_id,user_id,nom,prenom,mail,tel FROM annonce
        INNER JOIN user_annonce
        ON annonce.id=user_annonce.annonce_id
        INNER JOIN user 
        ON user_annonce.user_id=user.id");
        $rPrep->execute([]);
        return $rPrep->fetchAll(pdo::FETCH_ASSOC);
    }
    //anonce liste des dernieres annonce
    public static function annonceListederniere()
    {
        $datay = connexion();
        $rPrep = $datay->prepare("SELECT annonce_id,titre,descriptions,surface,photos,adresse,ville,cp,prix,type,type_bien_id,user_id,nom,prenom,mail,tel FROM annonce
        INNER JOIN user_annonce
        ON annonce.id=user_annonce.annonce_id
        INNER JOIN user 
        ON user_annonce.user_id=user.id
        ORDER BY annonce_id DESC LIMIT 10");
        $rPrep->execute([]);
        return $rPrep->fetchAll(pdo::FETCH_ASSOC);
    }

    //supprimer une znnoce
    public static function suppAnnonce($id)
    {
        telechargement::effaceImg(self::annonceViaId($id)['photos']);

        $datay = connexion();
        $rPrep = $datay->prepare("DELETE FROM annonce WHERE annonce.id=?");
        $rPrep->execute([$id]);
        $rPrep2 = $datay->prepare("DELETE FROM user_annonce WHERE user_annonce.annonce_id=?");
        $rPrep2->execute([$id]);
    }
}
