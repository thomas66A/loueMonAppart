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
        if($pass<3 || $pass>16){
            $this->error['passwordLength'] = 'Votre mot de passe doit avoir entre 8 a 16 caractere';
        }

        if (!preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $this->params['email']))
        {
           $this->error['email'] = 'Votre email n\'est pas conforme'; 
        }

        if(empty($this->error) == false)
        {
        // var_dump($this->error['passwordLength']);
        //     die();
        return $this->error;
        }
        $this->user = $this->checkAll();
        if(empty($this->user)){
            $this->error['identifiant'] = 'Locataire deja existant';
            return $this->error;
        }
        else
        {
            return $this->user;
        }
        }
        public function checkAll(){
            $nom = $this->params['nom'];
            $email = $this->params['email'];
            $connexion = new PDO('mysql:host=localhost;dbname=locappart;charset=UTF8','root','root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $objet = $connexion->prepare('SELECT nom, email FROM locataire WHERE nom=:nom AND email=:email');
            $objet->execute(array(
                'email' => $this->params['email'],
                'nom' => $this->params['nom']
            ));
            $user = $objet->fetchAll(PDO::FETCH_ASSOC);
            if(empty($user)){
                        $prenom = $this->params['prenom'];
                        $date = date('d-m-y');
                        $password = $this->params['password'];
                        $telephone = $this->params['telephone'];
                        $dejaLoc = 0;
                        $objet = $connexion->prepare('INSERT INTO locataire VALUES (
                            nom=:nom,
                            prenom=:prenom,
                            email=:email,
                            password=:password,
                            telephone=:telephone,
                            date_inscription=:dateI,
                            deja_loc=:deja
                            )');
                        $objet->execute(array(
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'password' => $password,
                        'telephone' => $telephone,
                        'dateI' => $date,
                        'deja' => $dejaLoc
                        ));
                return $user;
            }
            return false;
        }
}