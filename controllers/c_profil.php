<?php
/**
 * User: Nassim
 */

if(isset($_SESSION['logged'])) {
    require_once(PATH_MODELS .'UtilisateurDAO.php');
    $utilisateurDAO = new UtilisateurDAO();
    $utilisateur = $utilisateurDAO->getUtilisateurParNom($_SESSION['nomUtilisateur']);
    $nom = $utilisateur->getIdentifiant(); 
    require_once(PATH_VIEWS . $page . '.php');
}
else{
    $page="connexion";
    require_once (PATH_CONTROLLERS.$page.'.php');
}