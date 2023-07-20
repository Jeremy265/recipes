<?php
/**
 * Created by PhpStorm.
 * User: Jérémy
 * Date: 30/01/2019
 * Time: 15:40
 */

class RecetteFavorite{
    private $idRecette;
    private $noUtilisateur;

    /**
     * RecetteFavorite constructor.
     * @param $idRecette
     * @param $noUtilisateur
     */
    public function __construct($noUtilisateur,$idRecette)
    {
        $this->noUtilisateur = $noUtilisateur;
        $this->idRecette = $idRecette;
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
}