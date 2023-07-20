<?php

// Accès base de données
const DB_HOST = 'localhost';
const DB_NAME = 'recipes';
const DB_USER = 'root';
const DB_PWD = '';
const ADMIN_NAME = 'admin';
const ADMIN_HASH_PW = 'admin';

// Langue du site
const LANG ='EN-en';

// Paramètres du site : nom de l'auteur ou des auteurs
const AUTEUR = 'Jérémy THOMAS'; 
const TITRE = 'NosRecettes';

// Dossiers racines du site
define('PATH_CONTROLLERS','./controllers/c_');
define('PATH_ENTITY','./entities/');
define('PATH_ASSETS','./assets/');
define('PATH_LIB','./lib/');
define('PATH_MODELS','./models/');
define('PATH_VIEWS','./views/v_');
define('PATH_TEXTES','./languages/');

//sous dossiers
define('PATH_CSS', PATH_ASSETS.'css/');
define('PATH_IMAGES', PATH_ASSETS.'images/');
define('PATH_SCRIPTS', PATH_ASSETS.'scripts/');

//fichiers
define('PATH_LOGO', PATH_IMAGES.'logo.png');
define('PATH_MENU', PATH_VIEWS.'menu.php');
define('PATH_FICHIER_MDP', PATH_ASSETS.'fichier.txt');

//Heure
define('TZ_PARIS', 'Europe/Paris');
date_default_timezone_set(TZ_PARIS);
