<?php
class User{
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $date_inscription;
    private $password;
    public function __construct($donnees = array())
    {
        $this->hydrate($donnees);
    }
    	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getTelephone(){
		return $this->telephone;
	}

	public function setTelephone($telephone){
		$this->telephone = $telephone;
	}

	public function getDate_inscription(){
		return $this->date_inscription;
	}

	public function setDate_inscription($date_inscription){
		$this->date_inscription = $date_inscription;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
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