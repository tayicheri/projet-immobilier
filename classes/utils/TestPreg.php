<?php

class testPreg
{

    public static function testInput($donnee, $typeTest)
    {
        $type = ['titre', 'type', 'typeBien', 'surface', 'prix', 'description', 'adresse', 'cp', 'ville', 'id'];
        $tabRegex = [
            'nom' => '/^[\p{L}\s]{2,15}$/u',
            'prenom' => '/^[\p{L}\s]{2,15}$/u',
            'tel' => '/^[+]?[0-9]{8,}$/',
            'titre' => '/^[a-z\s]+$/ui',
           
            
            'surface' => '/^[1-9][\d]{0,5}$/ui',
            'prix' => '/^[1-9][\d]{0,10}$/ui',
            'description' => '/^.{50,500}$/ui',
            'adresse' => '/^([1-9][0-9]*(?:-[1-9][0-9]*)*)[\s,-]+(?:(bis|ter|qua)[\s,-]+)?([\w]+[\-\w]*)[\s,]+([-\w].{0,50})$/ui',
            'cp' => '/^[1-9][\d]{4}$/ui',
            'city' => '/^[\D]{0,30}$/ui',
            'id' => '/./',

        ];

        $retour = "";
        $dataretour = [];

        for ($i = 0; $i < count($donnee); $i++) {
            $dataretour[$typeTest[$i]] = trim(strip_tags($donnee[$i]));

            switch ($typeTest[$i]) {
                case 'email':
                    filter_var($donnee[$i], FILTER_VALIDATE_EMAIL) ? '' : $retour .= $typeTest[$i] . ' invalide. ';
                    break;
                case 'lien':
                    filter_var($donnee[$i], FILTER_VALIDATE_URL) ? '' : $retour .= $typeTest[$i] . ' invalide. ';
                    break;
                default:
                    if (array_key_exists($typeTest[$i], $tabRegex)) {

                        preg_match($tabRegex[$typeTest[$i]], $donnee[$i]) ? '' : $retour .= $typeTest[$i] . ' invalide. ';
                    } else {
                        preg_match('/./', $donnee[$i]) ?  '' : $retour .= $typeTest[$i] . ' invalide.';
                    }
            }
        }

        $a = ['donnee' => $dataretour, 'retour' => $retour, 'ok' => 1];
        if (preg_match('/invalide/', $a['retour'])) {
            $a = ['donnee' => $dataretour, 'retour' => $retour, 'ok' => 0];
            return $a;
        } else {

            return $a;
        }
    }
}
