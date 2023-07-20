<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 28/01/2019
 * Time: 16:36
 */

require_once(PATH_MODELS.'DAO.php');
require_once(PATH_ENTITY.'Utilisateur.php');

class UtilisateurDAO extends DAO {

    public function getUtilisateurs(){
        $db = $this->dbConnect();
        $listeUtilisateurs = array();
        $req = $db->query('SELECT * FROM Utilisateur');
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                array_push($listeUtilisateurs, new Utilisateur($donnees[$i][0], $donnees[$i][1], $donnees[$i][2], $donnees[$i][3]));
            }
        }
        return $listeUtilisateurs;
    }

    public function estPresent($id){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Utilisateur WHERE identifiant = ?";
        $req = $db->prepare($q);
        $req->execute(array($id));
        $donnees = $req->fetch();
        if($donnees){
            return true;
        }
        return false;
    }

    public function getUtilisateurParNo($no){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Utilisateur WHERE noUtilisateur = ?";
        $req = $db->prepare($q);
        $req->execute(array($no));
        $donnees = $req->fetch();
        if($donnees){
            return new Utilisateur($donnees[0], $donnees[1], $donnees[2], $donnees[3]);
        }
        return null;
    }
    
    public function getUtilisateurParNom($nom){
        $db = $this->dbConnect();
        $q = "SELECT * FROM Utilisateur WHERE identifiant = ?";
        $req = $db->prepare($q);
        $req->execute(array($nom));
        $donnees = $req->fetch();
        if($donnees){
            return new Utilisateur($donnees[0], $donnees[1], $donnees[2], $donnees[3]);
        }
        return null;
    }

    public function getMaxNoUtilisateur(){
        $db = $this->dbConnect();
        $q = "SELECT MAX(noUtilisateur) FROM Utilisateur";
        $req = $db->query($q);
        $donnees = $req->fetch();
        if($donnees){
            return $donnees[0];
        }
        return 0;
    }

    public function ajouterUtilisateur($id, $mdp){
        $mdpHash = sha1($mdp);
        $db = $this->dbConnect();
        $listeUtilisateurs = array();
        $req = $db->prepare('INSERT INTO Utilisateur (noUtilisateur, identifiant, motDePasse, dateCreation) VALUE (?,?,?,?)');
        $no = $this->getMaxNoUtilisateur()+1;
        $req->execute((array($no, $id, $mdpHash, date("d.m.y"))));
    }
}