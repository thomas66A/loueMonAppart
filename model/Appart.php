<?php
class Appart{
    private $idPropio;
    private $type;
    private $nbCouchage;
    private $prix; 
    private $description;
    private $numAppart;
    private $etage;
    private $numRue;
    private $nomRue;
    private $codepostal;
    private $ville;
    private $pays;
    private $dispo;

    public function __construct($donnees = array())
    {
        $this->hydrate($donnees);
    }

    public function getIdPropio(){
		return $this->idPropio;
	}

	public function setIdPropio($idPropio){
		$this->idPropio = $idPropio;
	}

	public function getType(){
		return $this->type;
	}

	public function setType($type){
		$this->type = $type;
	}

    public function getNbCouchage(){
		return $this->nbCouchage;
	}

	public function setNbCouchage($nbCouchage){
		$this->type = $nbCouchage;
	}

	public function getPrix(){
		return $this->prix;
	}

	public function setPrix($prix){
		$this->prix = $prix;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function getNumAppart(){
		return $this->numAppart;
	}

	public function setNumAppart($numAppart){
		$this->numAppart = $numAppart;
	}

	public function getEtage(){
		return $this->etage;
	}

	public function setEtage($etage){
		$this->etage = $etage;
	}

	public function getNumRue(){
		return $this->numRue;
	}

	public function setNumRue($numRue){
		$this->numRue = $numRue;
	}

	public function getNomRue(){
		return $this->nomRue;
	}

	public function setNomRue($nomRue){
		$this->nomRue = $nomRue;
	}

	public function getCodepostal(){
		return $this->codepostal;
	}

	public function setCodepostal($codepostal){
		$this->codepostal = $codepostal;
	}

	public function getVille(){
		return $this->ville;
	}

	public function setVille($ville){
		$this->ville = $ville;
	}

	public function getPays(){
		return $this->pays;
	}

	public function setPays($pays){
		$this->pays = $pays;
	}

	public function getDispo(){
		return $this->dispo;
	}

	public function setDispo($dispo){
		$this->dispo = $dispo;
	}

    public function hydrate($donnees)
        {
            foreach($donnees as $key =>$value)
            {   $key = preg_replace("#_#","",$key);
                $method = "set". ucfirst($key);
                if(method_exists($this,$method))
                {
                $this->$method($value);
                }
            }
        }

}