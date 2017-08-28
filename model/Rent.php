<?php
class Rent
{
    private $idProprio;
    private $idLoueur;
    private $idAppart;
    private $debutLoc;
    private $finLoc;
    private $prix;

    public function __construct($donnees = array())
    {
        $this->hydrate($donnees);
    }

    public function getIdProprio(){
	return $this->idProprio;
	}

	public function setIdProprio($idProprio){
		$this->idProprio = $idProprio;
	}

	public function getIdLoueur(){
		return $this->idLoueur;
	}

	public function setIdLoueur($idLoueur){
		$this->idLoueur = $idLoueur;
	}

	public function getIdAppart(){
		return $this->idAppart;
	}

	public function setIdAppart($idAppart){
		$this->idAppart = $idAppart;
	}

	public function getDebutLoc(){
		return $this->debutLoc;
	}

	public function setDebutLoc($debutLoc){
		$this->debutLoc = $debutLoc;
	}

	public function getFinLoc(){
		return $this->finLoc;
	}

	public function setFinLoc($finLoc){
		$this->finLoc = $finLoc;
	}

	public function getPrix(){
		return $this->prix;
	}

	public function setPrix($prix){
		$this->prix = $prix;
	}
        public function hydrate($donnees)
        {
            foreach($donnees as $key =>$value)
            {   
                $method = "set". ucfirst($key);
                if(method_exists($this,$method))
                {
                $this->$method($value);
                }
            }
        }
}