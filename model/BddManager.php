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

    public function getLastId()
    {
        $query = 'SELECT MAX(id) FROM appartement';
        $array = array();
        $appartementId = $this->findId($query,$array);
        return $appartementId;
    }
    
    
    
}