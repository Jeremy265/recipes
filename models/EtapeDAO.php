<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 18:14
 */
require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Etape.php');

class EtapeDAO extends DAO{
    public function getEtapes(){
        $listeEtapes = array();
        $db = $this->dbConnect();
        $q = "SELECT * FROM Etape";
        $req = $db->query($q);
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees) ; $i++){
                array_push($listeEtapes, new Etape($donnees[$i][0],$donnees[$i][1]));
            }
        }
        return $listeEtapes;
    }

    public function getEtapesParIdRecette($id){
        $db = $this->dbConnect();
        $listeEtapes = array();
        $q = "SELECT Etape.idEtape, description FROM Etape, EtapeRecette WHERE EtapeRecette.idRecette = ? AND Etape.idEtape= EtapeRecette.idEtape";
        $req = $db->prepare($q);
        $req->execute(array($id));
        $donnees = $req->fetchAll();
        if ($donnees) {
            for ($i = 0; $i < count($donnees); $i++) {
                array_push($listeEtapes, new Etape($donnees[$i][0], $donnees[$i][1]));
            }
        }
        return $listeEtapes;
    }

    public function estPresent($desc){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Etape WHERE description = ?";
        $req = $db->prepare($q);
        $req->execute(array($desc));
        $donnees = $req->fetch();
        if($donnees){
            return true;
        }
        return false;
    }

    public function getEtapeParDescription($desc){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Etape WHERE description = ?";
        $req = $db->prepare($q);
        $req->execute(array($desc));
        $donnees = $req->fetch();
        if($donnees){
            return new Etape($donnees[0], $donnees[1]);
        }
        return 0;
    }

    public function getMaxIdEtape(){
        $db = $this->dbConnect();
        $q = "SELECT MAX(idEtape) FROM Etape";
        $req = $db->query($q);
        $donnees = $req->fetch();
        if($donnees){
            return $donnees[0];
        }
        return 0;
    }

    public function supprimerEtape($idEtape){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM Etape WHERE idEtape = ?");
        $req->execute(array($idEtape));
    }
}
