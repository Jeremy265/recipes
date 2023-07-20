<?php

class Recette{
    private $idRecette;
    private $noCreateur;
    private $nomRecette;
    private $photo;
    private $difficulte;
    private $nbPersonne;
    private $dateCreation;
    private $typePlat;
    private $createur;
    private $listeEtape;
    private $listeIngredient;
    private $listeCommentaire;

    /**
     * Recette constructor.
     * @param $idRecette
     * @param $nomRecette
     * @param $photo
     * @param $difficulte
     * @param $nbPersonne
     * @param $dateCreation
     */
    public function __construct($idRecette, $noCreateur, $nomRecette, $photo, $difficulte, $nbPersonne, $typePlat, $dateCreation)
    {
        $this->idRecette = $idRecette;
        $this->noCreateur = $noCreateur;
        $this->nomRecette = $nomRecette;
        $this->photo = $photo;
        $this->difficulte = $difficulte;
        $this->nbPersonne = $nbPersonne;
        $this->typePlat = $typePlat;
        $this->dateCreation = $dateCreation;
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
    public function getNoCreateur()
    {
        return $this->noCreateur;
    }

    /**
     * @param mixed $noCreateur
     */
    public function setNoCreateur($noCreateur)
    {
        $this->noCreateur = $noCreateur;
    }

    /**
     * @return mixed
     */
    public function getNomRecette()
    {
        return $this->nomRecette;
    }

    /**
     * @param mixed $nomRecette
     */
    public function setNomRecette($nomRecette)
    {
        $this->nomRecette = $nomRecette;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDifficulte()
    {
        return $this->difficulte;
    }

    /**
     * @param mixed $difficulte
     */
    public function setDifficulte($difficulte)
    {
        $this->difficulte = $difficulte;
    }

    /**
     * @return mixed
     */
    public function getNbPersonne()
    {
        return $this->nbPersonne;
    }

    /**
     * @param mixed $nbPersonne
     */
    public function setNbPersonne($nbPersonne)
    {
        $this->nbPersonne = $nbPersonne;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $temperature
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getTypePlat()
    {
        return $this->typePlat;
    }

    /**
     * @param mixed $typePlat
     */
    public function setTypePlat($typePlat)
    {
        $this->typePlat = $typePlat;
    }

    /**
     * @return mixed
     */
    public function getCreateur()
    {
        return $this->createur;
    }

    /**
     * @param mixed $createur
     */
    public function setCreateur($createur)
    {
        $this->createur = $createur;
    }

    /**
     * @return mixed
     */
    public function getListeEtape()
    {
        return $this->listeEtape;
    }

    /**
     * @param mixed $listeEtape
     */
    public function setListeEtape($listeEtape)
    {
        $this->listeEtape = $listeEtape;
    }

    /**
     * @return mixed
     */
    public function getListeIngredient()
    {
        return $this->listeIngredient;
    }

    /**
     * @param mixed $listeIngredient
     */
    public function setListeIngredient($listeIngredient)
    {
        $this->listeIngredient = $listeIngredient;
    }

    /**
     * @return mixed
     */
    public function getListeCommentaire()
    {
        return $this->listeCommentaire;
    }

    /**
     * @param mixed $listeCommentaire
     */
    public function setListeCommentaire($listeCommentaire)
    {
        $this->listeCommentaire = $listeCommentaire;
    }


}