<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 29/01/2019
 * Time: 23:37
 */

class Commentaire{
    private $idCommentaire;
    private $idRecette;
    private $nomUtilisateur;
    private $dateCreation;
    private $contenu;

    /**
     * Commentaire constructor.
     * @param $îdCommentaire
     * @param $idRecette
     * @param $nomUtilisateur
     * @param $dateCreation
     * @param $contenu
     */
    public function __construct($îdCommentaire, $idRecette, $nomUtilisateur, $dateCreation, $contenu)
    {
        $this->idCommentaire = $îdCommentaire;
        $this->idRecette = $idRecette;
        $this->nomUtilisateur = $nomUtilisateur;
        $this->dateCreation = $dateCreation;
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * @param mixed $idCommentaire
     */
    public function setIdCommentaire($idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;
    }

    /**
     * @return mixed
     */
    public function getIdRecette()
    {
        return $this->idRecette;
    }

    /**
     * @param mixed $idRecette
     */
    public function setIdRecette($idRecette)
    {
        $this->idRecette = $idRecette;
    }

    /**
     * @return mixed
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }
}