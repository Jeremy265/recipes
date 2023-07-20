<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 29/01/2019
 * Time: 23:39
 */

require_once (PATH_ENTITY.'Commentaire.php');

class CommentaireDAO extends DAO{

    public function getCommentaires(){
        $db = $this->dbConnect();
        $listeCommentaires = array();
        $req = $db->query('SELECT * FROM Commentaire');
        $donnees = $req->fetchAll();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                array_push($listeCommentaires, new Commentaire($donnees[$i][0], $donnees[$i][1], $donnees[$i][2], $donnees[$i][3], $donnees[$i][4]));
            }
        }
        return $listeCommentaires;
    }

    public function getMaxIdCommentaire(){
        $db = $this->dbConnect();
        $q = "SELECT MAX(idCommentaire) FROM Commentaire";
        $req = $db->query($q);
        $donnees = $req->fetch();
        if($donnees){
            return $donnees[0];
        }
        return 0;
    }

    public function getCommentairesParIdRecette($id)
    {
        $db = $this->dbConnect();
        $q = "SELECT * FROM Commentaire WHERE idRecette = ?";
        $req = $db->prepare($q);
        $req->execute(array($id));
        $donnees = $req->fetchAll();
        $listeCommentaires = array();
        if($donnees){
            for($i=0 ; $i<count($donnees); $i++){
                array_push($listeCommentaires, new Commentaire($donnees[$i][0], $donnees[$i][1], $donnees[$i][2], $donnees[$i][3], $donnees[$i][4]));
            }
        }
        return $listeCommentaires;
    }

    public function ajouterCommentaire($com, $idR){
        $db = $this->dbConnect();
        $q = "INSERT INTO Commentaire(idCommentaire, idRecette, nomUtilisateur, dateCreation, contenu) VALUE(?,?,?,?,?)";
        $req = $db->prepare($q);
        $id = $this->getMaxIdCommentaire()+1;
        $req->execute(array($id, $idR, $_SESSION['nomUtilisateur'], date("d.m.y"), $com));
    }

    public function supprimerCommentaireParId($id){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM Commentaire WHERE idCommentaire = ?");
        $req->execute(array($id));
    }
    public function supprimerCommentairesParIdRecette($id){
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM Commentaire WHERE idRecette = ?");
        $req->execute(array($id));
    }
}