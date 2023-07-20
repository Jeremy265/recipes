<?php

class Ingredient{
    private $idIngredient;
    private $nomIngredient;
    private $quantite;

    /**
     * Ingredient constructor.
     * @param $idIngredient
     * @param $nomIngredient
     */
    public function __construct($idIngredient, $nomIngredient)
    {
        $this->idIngredient = $idIngredient;
        $this->nomIngredient = $nomIngredient;
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
    public function getNomIngredient()
    {
        return $this->nomIngredient;
    }

    /**
     * @param mixed $nomIngredient
     */
    public function setNomIngredient($nomIngredient)
    {
        $this->nomIngredient = $nomIngredient;
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