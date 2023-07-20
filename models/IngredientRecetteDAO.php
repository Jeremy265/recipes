<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 18:14
 */
require_once(PATH_MODELS.'DAO.php');
require_once (PATH_ENTITY.'IngredientRecette.php');

class IngredientRecetteDAO extends DAO{
    public function getIngredientsRecettes(){
        $db = $this->dbConnect();
        $listeIR = array();
        $req = $db->query('SELECT * FROM IngredientRecette');
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                array_push($listeIR, new IngredientRecette($donnees[$i][0], $donnees[$i][1], $donnees[$i][2]));
            }
        }
        return $listeIR;
    }

    public function getIngredientRecetteParIdRecetteIdIngredient($idR, $idI){
        $db = $this->dbConnect();
        $q = "SELECT * FROM IngredientRecette WHERE idRecette = ? AND idIngredient = ?";
        $req = $db->prepare($q);
        $req->execute(array($idR, $idI));
        $donnees = $req->fetch();
        if($donnees){
            return new IngredientRecette($donnees[0],$donnees[1], $donnees[2]);
        }
        return null;
    }

    public function ajoutIngredientRecette($idR, $idI, $q){
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO IngredientRecette (idRecette, idIngredient, quantite) VALUES(?,?,?)");
        $req->execute(array($idR, $idI, $q));
    }

    public function supprimerIngredientRecetteParIdRecette($idR){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM IngredientRecette WHERE idRecette = ?");
        $req->execute(array($idR));
    }
}