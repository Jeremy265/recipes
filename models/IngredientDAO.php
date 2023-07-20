<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 18:14
 */
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Ingredient.php');

class IngredientDAO extends DAO{
    public function getIngredients(){
        $listeIngredients = array();
        $db = $this->dbConnect();
        $req = $db->query('SELECT * FROM Ingredient');
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                array_push($listeIngredients, new Ingredient($donnees[$i][0], $donnees[$i][1]));
            }
        }
        return $listeIngredients;
    }
    public function estPresent($n){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Ingredient WHERE nomIngredient = ?";
        $req = $db->prepare($q);
        $req->execute(array($n));
        $donnees = $req->fetch();
        if($donnees){
            return true;
        }
        return false;
    }
    public function getIngredientParNom($n){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Ingredient WHERE nomIngredient = ?";
        $req = $db->prepare($q);
        $req->execute(array($n));
        $donnees = $req->fetch();
        if($donnees){
            return new Ingredient($donnees[0],$donnees[1]);
        }
        return null;
    }

    public function getIngredientsParIdRecette($id){
        $ingredientRecetteDAO = new IngredientRecetteDAO();
        $db = $this->dbConnect();
        $listeIngredient = array();
        $q = "SELECT Ingredient.idIngredient, nomIngredient, quantite FROM Ingredient, IngredientRecette WHERE IngredientRecette.idRecette = ? AND Ingredient.idIngredient= IngredientRecette.idIngredient";
        $req = $db->prepare($q);
        $req->execute(array($id));
        $donnees = $req->fetchAll();
        if ($donnees) {
            for ($i = 0; $i < count($donnees); $i++) {
                $ing = new Ingredient($donnees[$i][0], $donnees[$i][1]);
                $ing->setQuantite($ingredientRecetteDAO->getIngredientRecetteParIdRecetteIdIngredient($id, $ing->getIdIngredient())->getQuantite());
                array_push($listeIngredient, $ing);
            }
        }
        return $listeIngredient;
    }

    public function getMaxIdIngredient(){
        $db = $this->dbConnect();
        $q = "SELECT MAX(idIngredient) FROM Ingredient";
        $req = $db->query($q);
        $donnees = $req->fetch();
        if($donnees){
            return $donnees[0];
        }
        return 0;
    }

    public function ajouterIngredient($nom){
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO Ingredient (idIngredient, nomIngredient) VALUES(?,?)");
        $max = $this->getMaxIdIngredient();
        $id = $max+1;
        $req->execute(array($id, $nom));

    }

    public function supprimerIngredient($idI){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM Ingredient WHERE idIngredient = ?");
        $req->execute(array($idI));
    }
}