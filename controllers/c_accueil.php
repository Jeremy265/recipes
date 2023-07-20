<?php

    require_once (PATH_MODELS.'EtapeDAO.php');
    require_once (PATH_MODELS.'RecetteDAO.php');

    if(isset($_GET['deco']))
    {
        unset($_SESSION['logged']);
        session_destroy();
        //Redirection vers l'accueil
        header('Location: index.php');
    }






    $recetteDAO = new RecetteDAO();
    $etapeDAO = new EtapeDAO();
    $listeRecettes = $recetteDAO->getRecettes();
    $listeIdRecettes = array();
    foreach($listeRecettes as $r){
        array_push($listeIdRecettes, $r->getIdRecette());
    }

    if($listeIdRecettes != null){
        $alea = array_rand($listeIdRecettes,1);
        $recette = $recetteDAO->getRecetteParId($listeIdRecettes[$alea]);
    }



	require_once(PATH_VIEWS.$page.'.php');
?>