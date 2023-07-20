<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 17:25
 */

    require_once (PATH_MODELS.'RecetteDAO.php');
    require_once (PATH_MODELS.'UtilisateurDAO.php');
    $recetteDAO = new RecetteDAO();
    $recette = $recetteDAO->getRecetteParId($_GET['idRecette']);
    $utilisateurDAO = new UtilisateurDAO();
    $createur = $utilisateurDAO->getUtilisateurParNo($recette->getNoCreateur());

    if(isset($_SESSION['logged']) && (isset($_SESSION['admin']) || $_SESSION['idUtilisateur'] == $createur->getNoUtilisateur()) && isset($_GET['idRecette'])){
        $recetteDAO->supprimerRecetteParId($_GET['idRecette']);
    }
    $page="voirRecettes";
    require_once (PATH_CONTROLLERS.$page.'.php');