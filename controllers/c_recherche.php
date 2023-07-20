<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 23:43
 */

    require_once (PATH_MODELS.'RecetteDAO.php');
    require_once (PATH_MODELS.'EtapeDAO.php');

    $recetteDAO = new RecetteDAO();
    $etapeDAO = new EtapeDAO();

    if(isset($_POST['nomRecette'])) {
        $nomRecette = htmlspecialchars($_POST['nomRecette']);
        $listeRecettes = $recetteDAO->getRecetteParNom($nomRecette);
        if($listeRecettes == null)
            $erreur=RECETTE_INTROUVABLE;
    }

    require_once (PATH_VIEWS.$page.'.php');
?>