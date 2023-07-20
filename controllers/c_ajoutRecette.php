<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 22:34
 */



    if(isset($_SESSION['logged'])) {
        require_once(PATH_MODELS . 'RecetteDAO.php');
        require_once (PATH_MODELS.'IngredientDAO.php');
        require_once (PATH_MODELS.'EtapeDAO.php');
        $ingredientDAO = new IngredientDAO();
        $listeIngredients = $ingredientDAO->getIngredients();
        $etapeDAO = new EtapeDAO();
        $listeEtapes = $etapeDAO->getEtapes();
        $recetteDAO = new RecetteDAO();


        if (isset($_FILES['photo']) && isset($_POST['nom']) && isset($_POST['nbPersonne']) && isset($_POST['difficulte']) && isset($_POST['typePlat']) && isset($_POST['etapes']) && isset($_POST['ingredients']) && isset($_POST['quantites'])) {
            $photo = htmlspecialchars($_FILES['photo']['name']);
            $nom = htmlspecialchars($_POST['nom']);
            $nbPersonne = htmlspecialchars($_POST['nbPersonne']);
            $difficulte = htmlspecialchars($_POST['difficulte']);
            $typePlat = htmlspecialchars($_POST['typePlat']);
            $listeEtapes = array();
            for ($i = 0; $i < count($_POST['etapes']); $i++) {
                array_push($listeEtapes, $_POST['etapes'][$i]);

            }
            $listeIngredients = array();
            for ($i = 0; $i < count($_POST['ingredients']); $i++) {
                array_push($listeIngredients, $_POST['ingredients'][$i]);

            }
            $listeQuantites = array();
            for ($i = 0; $i < count($_POST['quantites']); $i++) {
                array_push($listeQuantites, $_POST['quantites'][$i]);

            }

            $recetteDAO->ajouterRecette($nom, $photo, $difficulte, $nbPersonne, $typePlat, $listeEtapes, $listeIngredients, $listeQuantites);


            move_uploaded_file($_FILES['photo']['tmp_name'], PATH_IMAGES . $photo);
            header('Location: index.php?page=ficheRecette&idRecette='.$recetteDAO->getMaxIdRecette());
        }
        else{
            require_once (PATH_VIEWS.$page.'.php');
        }
    }
    else{
        $erreur = CONNEXION_REQUISE;
        $page = "connexion";
        require_once (PATH_CONTROLLERS.$page.'.php');
    }
?>







