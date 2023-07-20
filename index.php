<?php

session_name('session');
session_start();

require_once('./config/configuration.php');
require_once(PATH_TEXTES.LANG.'.php');


$listeTypePlat = array();
array_push($listeTypePlat, BOISSON);
array_push($listeTypePlat, CONFITURE);
array_push($listeTypePlat, DESSERT);
array_push($listeTypePlat, ENTREE);
array_push($listeTypePlat, PLAT_CHAUD);
array_push($listeTypePlat, PLAT_FROID);
array_push($listeTypePlat, SALADE);
array_push($listeTypePlat, SUCRERIE);

if(isset($_GET['page'])){
	$page = htmlspecialchars($_GET['page']);
	if(!is_file(PATH_CONTROLLERS.$page.'.php')){
		$page = '404';
	}
}
else{
	$page = 'accueil';
}

require_once(PATH_CONTROLLERS.$page.'.php');
?>