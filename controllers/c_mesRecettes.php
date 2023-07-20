<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 30/01/2019
 * Time: 15:16
 */

if(isset($_SESSION['logged'])) {
    require_once(PATH_MODELS . 'RecetteDAO.php');
    require_once(PATH_MODELS .'RecetteFavoriteDAO.php');
    require_once(PATH_MODELS .'UtilisateurDAO.php');
    $recetteDAO = new RecetteDAO();
    $recetteFavoriteDAO = new RecetteFavoriteDAO();
    if(isset($_GET['id'])) {
        $utilisateurDAO = new UtilisateurDAO();
        $utilisateur = $utilisateurDAO->getUtilisateurParNom($_GET['id']);
        $id = $utilisateur->getNoUtilisateur();
        $listeRecettesCrees = $recetteDAO->getRecetteParIdCreateur($id);
        $listeFavorites = $recetteFavoriteDAO->getRecetteFavoriteParNoUtilisateur($id);
        $titre1 = RECETTES_DE.$_GET['id'] ;
        $titre2 = CREATIONS_DE;
        $titre3 = FAVORIS_DE ;
    }
    else{
        $listeRecettesCrees = $recetteDAO->getRecetteParIdCreateur($_SESSION['idUtilisateur']);
        $listeFavorites = $recetteFavoriteDAO->getRecetteFavoriteParNoUtilisateur($_SESSION['idUtilisateur']);
    }
    $listeRecettesFavorites = array();
    foreach($listeFavorites as $f){
        array_push($listeRecettesFavorites, $recetteDAO->getRecetteParId($f->getIdRecette()));
    }
    require_once(PATH_VIEWS . $page . '.php');
}
else{
    $page="connexion";
    require_once (PATH_CONTROLLERS.$page.'.php');
}