<?php

abstract class AbstractClass
{
    public function getConnexion()
    {
        $connexion = new PDO('mysql:host=localhost;dbname=locappart;charset=UTF8','root','root');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $connexion;
    }

    public function select($query,$array)
    {
        
        $pdo = $this->getConnexion()->prepare($query);
        $pdo->execute($array);
        $result = $pdo->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function insertOrUpdate($query, $array)
    {
        
        $this->getConnexion();
        $pdo = $this->connexion->prepare($query);
        $pdo->execute($array);
        return $this->connexion->lastInsertId();
    }

    protected function Delete($query, $array)
    {
        $this->getConnexion();
        $pdo = $this->connexion->prepare($query);
        $pdo->execute($array);
        return false;
    }
    
    
}