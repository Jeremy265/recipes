<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 30/01/2019
 * Time: 15:41
 */

require_once(PATH_MODELS.'DAO.php');
require_once (PATH_ENTITY.'RecetteFavorite.php');

class RecetteFavoriteDAO extends DAO{
    public function getRecetteFavoriteParNoUtilisateur($noU){
        $db = $this->dbConnect();
        $q = "SELECT * FROM RecetteFavorite WHERE noUtilisateur = ?";
        $req = $db->prepare($q);
        $req->execute(array($noU));
        $listeRF = array();
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0;$i<count($donnees);$i++){
                array_push($listeRF, new RecetteFavorite($donnees[$i][0],$donnees[$i][1]));
            }
        }
        return $listeRF;
    }

    public function estPresent($noU, $idR){
        $db = $this->dbConnect();
        $q = "SELECT * FROM RecetteFavorite WHERE noUtilisateur = ? AND idRecette =?";
        $req = $db->prepare($q);
        $req->execute(array($noU, $idR));
        $listeRF = array();
        $donnees = $req->fetchAll();
        if($donnees){
            return true;
        }
        return false;
    }

    public function ajoutRecetteFavorite($noU,$idR){
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO RecetteFavorite(noUtilisateur,idRecette) VALUES(?,?)");
        $req->execute(array($noU,$idR));
    }

    public function supprimerRecetteFavorite($noU,$idR){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM RecetteFavorite WHERE noUtilisateur = ? AND idRecette =?");
        $req->execute(array($noU,$idR));
    }
}