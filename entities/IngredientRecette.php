<?php

class IngredientRecette{
    private $idRecette;
    private $idIngredient;
    private $quantite;

    /**
     * IngredientRecette constructor.
     * @param $idRecette
     * @param $idIngredient
     * @param $quantite
     */
    public function __construct($idRecette, $idIngredient, $quantite)
    {
        $this->idRecette = $idRecette;
        $this->idIngredient = $idIngredient;
        $this->quantite = $quantite;
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
    public function getIdIngredient()
    {
        return $this->idIngredient;
    }

    /**
     * @param mixed $idIngredient
     */
    public function setIdIngredient($idIngredient)
    {
        $this->idIngredient = $idIngredient;
    }

    /**
     * @return mixed
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * @param mixed $quantite
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }
}