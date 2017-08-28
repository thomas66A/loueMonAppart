<?php
class BddManager extends AbstractClass
{   public $connexion;
    public function __construct()
    {
    }
    
    public function getAllById()
    {
       
        $query = 'SELECT * FROM appartement';
        $array = array();
        $produit = $this->select($query,$array);

        $lesApparts = [];
        foreach ($produit as $key=>$value)
        {
            $produits = new Appart($produit[$key]);
            array_push($lesApparts, $produits);
        }
        return $lesApparts;
    }

    public function getAppartById($id)
    {
       
        $query = 'SELECT * FROM appartement WHERE id=:id';
        $array = array('id'=>$id);
        $appart = $this->select($query,$array);
        $lappart = new Appart($appart[0]);
        return $lappart;
    }

    public function getLastId()
    {
        $query = 'SELECT MAX(id) FROM appartement';
        $array = array();
        $appartementId = $this->findId($query,$array);
        return $appartementId;
    }

    public function getDisponibilite($id)
    {
        $query = 'SELECT * FROM location WHERE idAppart=:id';
        $array = array('id'=>$id);
        $dispo = $this->select($query, $array);
        $lesDispos = [];
        foreach ($dispo as $key=>$value)
        {
            $AppartDispo = new Rent($dispo[$key]);
            array_push($lesDispos, $AppartDispo);
        }
        return $lesDispos;
    }
    
    
    
}