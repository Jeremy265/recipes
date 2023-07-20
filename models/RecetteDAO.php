<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 18:14
 */
require_once(PATH_MODELS.'DAO.php');
require_once (PATH_MODELS.'EtapeDAO.php');
require_once (PATH_MODELS.'IngredientDAO.php');
require_once (PATH_MODELS.'EtapeRecetteDAO.php');
require_once (PATH_MODELS.'CommentaireDAO.php');
require_once (PATH_MODELS.'UtilisateurDAO.php');
require_once (PATH_MODELS.'IngredientRecetteDAO.php');
require_once (PATH_ENTITY.'Recette.php');
require_once (PATH_ENTITY.'Utilisateur.php');

class RecetteDAO extends DAO{

    public function getRecettes(){
        $db = $this->dbConnect();
        $listeRecettes = array();
        $req = $db->query('SELECT * FROM Recette');
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                array_push($listeRecettes, new Recette($donnees[$i][0], $donnees[$i][1], $donnees[$i][2], $donnees[$i][3], $donnees[$i][4],$donnees[$i][5],$donnees[$i][6],$donnees[$i][7]));
            }
        }
        return $listeRecettes;
    }

    public function getRecetteParId($id)
    {
        $db = $this->dbConnect();
        $q = "SELECT * FROM Recette WHERE idRecette = ?";
        $req = $db->prepare($q);
        $req->execute(array($id));
        $donnees = $req->fetch();
        if ($donnees) {
            return new Recette($donnees[0], $donnees[1], $donnees[2], $donnees[3], $donnees[4], $donnees[5], $donnees[6],$donnees[7]);
        }
        return null;
    }

    public function getRecetteParIdCreateur($id){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Recette WHERE noCreateur = ?";
        $req = $db->prepare($q);
        $req->execute(array($id));
        $listeRecettesCrees = array();
        $donnees = $req->fetchAll();
        if ($donnees) {
            for($i=0;$i<count($donnees);$i++){
                array_push($listeRecettesCrees, new Recette($donnees[$i][0], $donnees[$i][1], $donnees[$i][2], $donnees[$i][3], $donnees[$i][4], $donnees[$i][5], $donnees[$i][6],$donnees[$i][7]));
            }
        }
        return $listeRecettesCrees;
    }


    public function getRecetteParMotsCles($mc, $nbP, $typePlat){
        $db = $this->dbConnect();
        $q = "SELECT Recette.idRecette,noCreateur,nomRecette,photo,difficulte,nbPersonne,typePlat,dateCreation
              FROM Recette, Etape, Ingredient, EtapeRecette, IngredientRecette 
              WHERE IngredientRecette.idRecette = Recette.idRecette AND Ingredient.idIngredient = IngredientRecette.idIngredient 
              AND EtapeRecette.idRecette = Recette.idRecette AND Etape.idEtape = EtapeRecette.idEtape
              AND nbPersonne >= ".$nbP;
        if($typePlat != 'Tous'){
            $q = $q." AND typePlat = '".$typePlat."'";
        }
        if($mc != ""){
            $q = $q." AND(nomRecette LIKE '%".$mc."%' OR nomIngredient LIKE '%".$mc."%' OR description LIKE '%".$mc."%')";
        }
        $q = $q." GROUP BY idRecette";
        $req = $db->query($q);
        $donnees = $req->fetchAll();
        $listeRecettes = array();
        if($donnees){
            for($i=0 ; $i<count($donnees) ; $i++){
                array_push($listeRecettes, new Recette($donnees[$i][0], $donnees[$i][1], $donnees[$i][2], $donnees[$i][3], $donnees[$i][4],$donnees[$i][5],$donnees[$i][6],$donnees[$i][7]));
            }
            return $listeRecettes;
        }
        return null;
    }

    public function getMaxIdRecette(){
        $db = $this->dbConnect();
        $q = "SELECT MAX(idRecette) FROM Recette";
        $req = $db->query($q);
        $donnees = $req->fetch();
        if($donnees){
            return $donnees[0];
        }
        return 0;
    }


    public function getListeIngredientsParIdRecette($id){
        $db = $this->dbConnect();
        $listeIngredients = array();
        $req = $db->prepare('SELECT Ingredient.idIngredient, nomIngredient, quantite  FROM Ingredient, IngredientRecette WHERE idRecette = ? AND Ingredient.idIngredient = IngredientRecette.idIngredient');
        $req->execute(array($id));
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                $ing = new Ingredient($donnees[$i][0], $donnees[$i][1]);
                $ing->setQuantite($donnees[$i][2]);
                array_push($listeIngredients, $ing);
            }
        }
        return $listeIngredients;
    }

    public function ajouterRecette($nom, $photo, $difficulte, $nbPersonne, $typePlat, $listeEtapes, $listeIngredients, $listeQuantites){
        $etapeDAO = new EtapeDAO();
        $ingredientDAO = new IngredientDAO();
        $ingredientRecetteDAO = new IngredientRecetteDAO();
        $db = $this->dbConnect();
        $q = "INSERT INTO Recette(idRecette, noCreateur, nomRecette, photo, difficulte, nbPersonne, typePlat, dateCreation) VALUES(?,?,?,?,?,?,?,?)";
        $req = $db->prepare($q);
        $idRecette = $this->getMaxIdRecette() + 1;
        $req->execute(array($idRecette, $_SESSION['idUtilisateur'], $nom, $photo, $difficulte, $nbPersonne, $typePlat, date("d.m.y")));
        foreach ($listeEtapes as $desc){
            if(!$etapeDAO->estPresent($desc)) {
                $q = "INSERT INTO Etape(idEtape, description) VALUES(?,?)";
                $req = $db->prepare($q);
                $idEtape = $etapeDAO->getMaxIdEtape() + 1;
                $req->execute(array($idEtape, $desc));
                $q = "INSERT INTO EtapeRecette(idRecette, idEtape) VALUES(?,?)";
                $req = $db->prepare($q);
                $req->execute(array($idRecette, $idEtape));
            }
            else{
                $e = $etapeDAO->getEtapeParDescription($desc);;
                $idEtape = $e->getIdEtape();
                $q = "INSERT INTO EtapeRecette(idRecette, idEtape) VALUES(?,?)";
                $req = $db->prepare($q);
                $req->execute(array($idRecette, $idEtape));
            }
        }
        for($i=0 ; $i<count($listeIngredients) ; $i++){
            if(!$ingredientDAO->estPresent($listeIngredients[$i])){
                $ingredientDAO->ajouterIngredient($listeIngredients[$i]);
            }
            $ingredient = $ingredientDAO->getIngredientParNom($listeIngredients[$i]);
            $idIngredient = $ingredient->getIdIngredient();
            $ingredientRecetteDAO->ajoutIngredientRecette($idRecette, $idIngredient, $listeQuantites[$i]);
        }
    }

    public function supprimerRecetteParId($id){
        $db = $this->dbConnect();
        $etapeRecetteDAO = new EtapeRecetteDAO();
        $etapeRecetteDAO->supprimerEtapeRecetteParIdRecette($id);
        $ingredientRecetteDAO = new IngredientRecetteDAO();
        $ingredientRecetteDAO->supprimerIngredientRecetteParIdRecette($id);
        $commentaireDAO = new CommentaireDAO();
        $commentaireDAO->supprimerCommentairesParIdrecette($id);
        $req = $db->prepare("DELETE FROM Recette WHERE idRecette = ?");
        $req->execute(array($id));
    }
}