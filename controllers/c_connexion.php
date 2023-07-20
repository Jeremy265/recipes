<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 26/01/2019
 * Time: 11:35
 */

    require_once (PATH_MODELS.'UtilisateurDAO.php');
    $utilisateurDAO = new UtilisateurDAO();

    if(isset($_POST['id']) && isset($_POST['mdp'])){
        $id = htmlspecialchars($_POST['id']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $listeUtilisateur = $utilisateurDAO->getUtilisateurs();
        foreach($listeUtilisateur as $u) {
            if ($u->getIdentifiant() == $id) {
                if (sha1($_POST['mdp']) == $u->getMotDePasse()) {
                    //Connexion
                    $_SESSION['logged'] = true;
                    $_SESSION['idUtilisateur'] = $u->getNoUtilisateur();
                    $_SESSION['nomUtilisateur'] = $u->getIdentifiant();
                    if ($u->getIdentifiant() == "admin") {
                        $_SESSION['admin'] = true;
                    }
                    $page = "accueil";
                    $erreur = "Bienvenue " . $u->getIdentifiant() . " vous êtes connecté !";
                    require_once(PATH_CONTROLLERS . $page . '.php');
                }
            }
        }
        if(!isset($erreur)){
            $erreur = ECHEC_CONNEXION;
        }

    }

    require_once (PATH_VIEWS.$page.'.php');