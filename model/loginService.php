<?php

class loginService
{
    private $params;
    private $error;
    private $user;

    public function getParams()
    {
        return $this->params;
    }
    public function setParams($params)
    {
        $this->params=$params;
    }
    public function getError()
    {
        return $this->error;
    }
    public function setError($error)
    {
        $this->error=$error;
    }
    public function getUser()
    {
        return $this->User;
    }
    public function setUser($user)
    {
        $this->user=$user;
    }

    public function launchControls()
        {
        if(empty($this->params['nom'])){
            $this->error['nom'] = 'nom utilisateur manquant';
        }
        if(empty($this->params['password'])){
            $this->error['password'] = 'mot de passe manquant';
        }
        
        if(empty($this->error) == false)
        {
        return $this->error;
        }
        $this->user = $this->checkUsernamePassword();
        if(empty($this->user)){
            $this->error['identifiant'] = 'Nom utilisateur ou le mot de passe incorrect';
            
            return $this->error;
        }
        else
        { 
            $_SESSION['user'] = $this->user;
            return $this->user;
        }
        }

    public function checkUsernamePassword(){
            $nom = $this->params['nom'];
            $password = $this->params['password'];
            $connexion = new PDO('mysql:host=localhost;dbname=locappart;charset=UTF8','root','root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $objet = $connexion->prepare('SELECT id, nom FROM user WHERE nom=:nom AND password=:password');
            $objet->execute(array(
                'password' => $password,
                'nom' => $nom
            ));
            $user = $objet->fetchAll(PDO::FETCH_ASSOC);
            if(empty($user)==false){           
                return $user;
            }
            return false;
        }
}
