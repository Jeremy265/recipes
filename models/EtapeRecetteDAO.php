<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 25/01/2019
 * Time: 18:14
 */
require_once(PATH_MODELS.'DAO.php');
require_once (PATH_ENTITY.'EtapeRecette.php');

class EtapeRecetteDAO extends DAO{
    public function getEtapesRecettes(){
        $listeEtapesRecettes = array();
        $db = $this->dbConnect();
        $q = "SELECT * FROM EtapeRecette";
        $req = $db->query($q);
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees) ; $i++){
                array_push($listeEtapesRecettes, new EtapeRecette($donnees[$i][0],$donnees[$i][1]));
            }
        }
        return $listeEtapesRecettes;
    }

    public function supprimerEtapeRecetteParIdRecette($idR){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM EtapeRecette WHERE idRecette = ?");
        $req->execute(array($idR));
    }
}