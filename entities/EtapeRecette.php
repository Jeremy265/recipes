<?php

class EtapeRecette{
    private $idRecette;
    private $idEtape;

    /**
     * EtapeRecette constructor.
     * @param $idRecette
     * @param $idEtape
     */
    public function __construct($idRecette, $idEtape)
    {
        $this->idRecette = $idRecette;
        $this->idEtape = $idEtape;
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
    public function getIdEtape()
    {
        return $this->idEtape;
    }

    /**
     * @param mixed $idEtape
     */
    public function setIdEtape($idEtape)
    {
        $this->idEtape = $idEtape;
    }
}