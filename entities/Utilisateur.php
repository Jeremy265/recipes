<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 28/01/2019
 * Time: 16:28
 */

class Utilisateur{
    private $noUtilisateur;
    private $identifiant;
    private $motDePasse;
    private $dateCreation;

    /**
     * Utilisateur constructor.
     * @param $noUtilisateur
     * @param $identifiant
     * @param $motDePasse
     */
    public function __construct($noUtilisateur, $identifiant, $motDePasse, $dateCreation)
    {
        $this->noUtilisateur = $noUtilisateur;
        $this->identifiant = $identifiant;
        $this->motDePasse = $motDePasse;
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getNoUtilisateur()
    {
        return $this->noUtilisateur;
    }

    /**
     * @param mixed $noUtilisateur
     */
    public function setNoUtilisateur($noUtilisateur)
    {
        $this->noUtilisateur = $noUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * @param mixed $identifiant
     */
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @param mixed $motDePasse
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
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
    
}