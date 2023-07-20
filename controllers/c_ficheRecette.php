<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 10:39
 */


    require_once (PATH_MODELS.'RecetteDAO.php');
    require_once (PATH_MODELS.'EtapeDAO.php');
    require_once (PATH_MODELS.'IngredientDAO.php');
    require_once (PATH_MODELS.'UtilisateurDAO.php');
    require_once (PATH_MODELS.'CommentaireDAO.php');
    require_once (PATH_MODELS.'RecetteFavoriteDAO.php');

    $etapeDAO = new EtapeDAO();
    $ingredientDAO = new IngredientDAO();
    $recetteDAO = new RecetteDAO();
    $utilisateurDAO = new UtilisateurDAO();
    $commentaireDAO = new CommentaireDAO();
    $recetteFavoriteDAO = new RecetteFavoriteDAO();

    if(isset($_GET['idRecette'])){
        $idRecette = $_GET['idRecette'];
        $recette = $recetteDAO->getRecetteParId($idRecette);
        if(isset($_SESSION['idUtilisateur'])){
            if($recetteFavoriteDAO->estPresent($_SESSION['idUtilisateur'],$idRecette))
                $favorite = true;
        }
    }
    if(isset($_GET['favoris']) && isset($_SESSION['idUtilisateur'])){
        if($_GET['favoris'] == 1) {
            $recetteFavoriteDAO->ajoutRecetteFavorite($_SESSION['idUtilisateur'], $idRecette);
            $favorite = true;
        }
        elseif($_GET['favoris'] == 0) {
            $recetteFavoriteDAO->supprimerRecetteFavorite($_SESSION['idUtilisateur'], $idRecette);
            $favorite = false;
        }
    }
    if(isset($_GET['supprimerComId'])){
        $commentaireDAO->supprimerCommentaireParId($_GET['supprimerComId']);
    }
    if(isset($_POST['commentaire'])){
        if(isset($_SESSION['logged'])){
            $commentaire = htmlspecialchars($_POST['commentaire']);
            $commentaireDAO->ajouterCommentaire($commentaire, $recette->getIdRecette());
        }
        else{
            $erreur = CONNEXION_REQUISE;
        }
    }
    if(isset($recette)){
        $recette->setListeIngredient($recetteDAO->getListeIngredientsParIdRecette($recette->getIdRecette()));
        $recette->setListeEtape($etapeDAO->getEtapesParIdRecette($recette->getIdRecette()));
        $recette->setListeCommentaire($commentaireDAO->getCommentairesParIdRecette($recette->getIdRecette()));
        $recette->setCreateur($utilisateurDAO->getUtilisateurParNo($recette->getNoCreateur()));
    }




    require_once (PATH_VIEWS.$page.'.php');
?>