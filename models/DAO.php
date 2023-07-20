<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 18:15
 */

class DAO{
    protected function dbConnect(){
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);
        return $db;
    }
}