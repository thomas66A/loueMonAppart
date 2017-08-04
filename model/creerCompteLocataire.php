<?php

class registerService
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
            $this->error['nom'] = 'Le nom de l\'utilisateur n\'est pas renseigner';
        }

        if(empty($this->params['prenom'])){
            $this->error['prenom'] = 'Le prenom de l\'utilisateur n\'est pas renseigner';
        }

        if(empty($this->params['email'])){
            $this->error['email'] = 'Le email n\'est pas renseigner';
        }

        if(empty($this->params['telephone'])){
            $this->error['telephone'] = 'Le nom de l\'utilisateur n\'est pas renseigner';
        }

        if(empty($this->params['password'])){
            $this->error['password'] = 'Le mot de passe n\'est pas renseigner' ;
        }

        if(empty($this->params['password2'])){
            $this->error['password2'] = 'la confirmation du mot de passe n\'est pas renseigner';
        }
    

        if($this->params['password'] != $this->params['password2']){
            $this->error['comparePassword'] = 'les mots de passe ne correspondent pas';
        }

        $pass = $this->params['password'];
        $pass = strlen($pass);
        if($pass<8 || $pass>16){
            $this->error['passwordLength'] = 'Votre mot de passe doit avoir entre 8 a 16 caractere';
        }

        if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $this->params['email']))
        {
           $this->error['password'] = 'Votre email n\'est pas conforme'; 
        }

        if(empty($this->error) == false)
        return $this->error;
    
        $this->user = $this->checkAll();
        if(empty($this->user)){
            $this->error['identifiant'] = 'Pas d\'enregistrement sous ce nom';
            return $this->error;
        }
        else
        {
            return $this->user;
        }
        }
        public function checkAll(){
            $username = $this->params['username'];
            $password = $this->params['email'];
            $connexion = new PDO('mysql:host=localhost;dbname=locappart;charset=UTF8','root','root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $objet = $connexion->prepare('SELECT id, username, email FROM user WHERE username=:username AND email=:email');
            $objet->execute(array(
                'email' => $this->params['email'],
                'username' => $this->params['username']
            ));
            $user = $objet->fetchAll(PDO::FETCH_ASSOC);
            if(empty($user)){
                        $objet = $connexion->prepare('INSERT INTO locataire VALUES (username=:username, email=:email, password=:password)');
                        $objet->execute(array(
                        'email' => $this->params['email'],
                        'username' => $this->params['username'],
                        'password' => $this->params['password']
                        ));
                return $user;
            }
            return false;
        }
}