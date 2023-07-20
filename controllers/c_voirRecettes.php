<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 22:22
 */

    require_once (PATH_MODELS.'RecetteDAO.php');
    require_once (PATH_MODELS.'EtapeDAO.php');
    require_once (PATH_MODELS.'UtilisateurDAO.php');

    $recetteDAO = new RecetteDAO();
    $etapeDAO = new EtapeDAO();
    $utilisateurDAO = new UtilisateurDAO();



    if(isset($_POST['mc']) && isset($_POST['nbPersonne']) && isset($_POST['typePlat'])) {
        $mc = htmlspecialchars($_POST['mc']);
        $nbP = htmlspecialchars($_POST['nbPersonne']);
        $typePlat = htmlspecialchars($_POST['typePlat']);
        if($typePlat == "")
            $typePlat= "Tous";
        $listeRecettes = $recetteDAO->getRecetteParMotsCles($mc, $nbP, $typePlat);
        if($listeRecettes == null)
            $erreur=RECETTE_INTROUVABLE;
        else{
            foreach($listeRecettes as $recette){
                $recette->setCreateur($utilisateurDAO->getUtilisateurParNo($recette->getNoCreateur()));
            }
        }
        $tri=true;
    }
    else{
        $listeRecettes = $recetteDAO->getRecettes();
        foreach($listeRecettes as $recette){
            $recette->setCreateur($utilisateurDAO->getUtilisateurParNo($recette->getNoCreateur()));
        }
    }

    require_once (PATH_VIEWS.$page.'.php');
