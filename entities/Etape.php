<?php

class Etape{
    private $idEtape;
    private $description;

    /**
     * Etape constructor.
     * @param $idEtape
     * @param $description
     */
    public function __construct($idEtape, $description)
    {
        $this->idEtape = $idEtape;
        $this->description = $description;
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}