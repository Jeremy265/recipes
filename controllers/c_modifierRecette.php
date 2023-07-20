<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 12:19
 */



    if(isset($_SESSION['logged'])){
        require_once (PATH_MODELS.'RecetteDAO.php');
        $recetteDAO = new RecetteDAO();
        $idRecette = $_GET['idRecette'];
        if(isset($_POST['valider'])){
            $action=htmlspecialchars($_POST['valider']);
        }
        else{
            $action = null;
        }
        if($action == null){
            require_once (PATH_MODELS.'EtapeDAO.php');
            $etapeDAO = new EtapeDAO();
            $listeEtapes = $etapeDAO->getEtapes();;
            require_once (PATH_MODELS.'IngredientDAO.php');
            $ingredientDAO = new IngredientDAO();
            $listeIngredients = $ingredientDAO->getIngredients();

            if(isset($idRecette)){
                $recette = $recetteDAO->getRecetteParId($idRecette);
                $listeEtapesRecette = $etapeDAO->getEtapesParIdRecette($idRecette);
                $recette->setListeEtape($listeEtapesRecette);
                $listeIngredientsRecette = $ingredientDAO->getIngredientsParIdRecette($idRecette);
                $recette->setListeIngredient($listeIngredientsRecette);
            }
            require_once (PATH_VIEWS.$page.'.php');
        }
        else{
            if($action=="Annuler"){
                header('Location: index.php?page=ficheRecette&idRecette='.$idRecette);
            }
            elseif($action=="Enregistrer"){
                if(isset($_POST['nom']) && isset($_POST['nbPersonne']) && isset($_POST['difficulte']) && isset($_POST['typePlat']) && isset($_POST['etapes']) && isset($_POST['ingredients']) && isset($_POST['quantites'])){
                    $photo = $_FILES['photo']['name'];
                    if ($photo == null) {
                        $photo = $recetteDAO->getRecetteParId($idRecette)->getPhoto();
                    }
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


                    $recetteDAO->supprimerRecetteParId($idRecette);
                    $recetteDAO->ajouterRecette($nom, $photo, $difficulte, $nbPersonne, $typePlat, $listeEtapes, $listeIngredients, $listeQuantites);


                    header('Location: index.php?page=ficheRecette&idRecette=' . $recetteDAO->getMaxIdRecette());
                }
            }
        }
    }

    else{
        $page="connexion";
        require_once (PATH_CONTROLLERS.$page.'.php');
    }