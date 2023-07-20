<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 28/01/2019
 * Time: 16:25
 */
    require_once (PATH_MODELS.'UtilisateurDAO.php');
    $utilisateurDAO = new UtilisateurDAO();

    if(isset($_POST['id']) && isset($_POST['mdp'])&& isset($_POST['confirmMdp'])){
        $id = htmlspecialchars($_POST['id']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $confirmMdp = htmlspecialchars($_POST['confirmMdp']);
        if($utilisateurDAO->estPresent($id)){
            $erreur = ID_INDISPO;
        }
        else{
            if($mdp != $confirmMdp) {
                $erreur = MDP_DIFFERENTS;
            }
            else{
                $utilisateurDAO->ajouterUtilisateur($id, $mdp);
                $page = 'connexion';
                require_once (PATH_CONTROLLERS.$page.'.php');
            }

        }
    }
require_once (PATH_VIEWS.$page.'.php');

