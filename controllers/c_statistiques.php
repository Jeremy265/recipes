<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 29/01/2019
 * Time: 00:53
 */

    if($_SESSION['logged'] && $_SESSION['admin'] = true){
        require_once(PATH_VIEWS.$page.'.php');
    }