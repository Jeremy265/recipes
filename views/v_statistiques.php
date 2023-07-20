<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 29/01/2019
 * Time: 00:53
 */
    require_once (PATH_VIEWS.'header.html');
    require_once (PATH_VIEWS.'menu.php');
    require_once (PATH_VIEWS.'alert.php');

    $fichierConnexion = fopen(PATH_FICHIER_MDP,'r');

    while(!feof($fichierConnexion)){

        echo fgets($fichierConnexion);
        echo '<br>';
    }

    fclose($fichierConnexion);





    require_once (PATH_VIEWS.'footer.html');