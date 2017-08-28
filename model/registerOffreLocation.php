<?php

class registerOffreLocation
{
    private $params;
    private $error;
    private $appart;
    private $files;

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
    public function getAppart()
    {
        return $this->appart;
    }
    public function setAppart($appart)
    {
        $this->appart=$appart;
    }
    public function getFiles()
    {
        return $this->files;
    }
    public function setFiles($files)
    {
        $this->files=$files;
    }
    public function launchControls()
        {
        if(empty($this->params['idProprio'])){
            $this->error['idProprio'] = 'L\'id propriétaire n\'est pas renseigner';
        }

        if(empty($this->params['type'])){
            $this->error['type'] = 'Le type de logement n\'est pas renseigner';
        }

        if(empty($this->params['nbCouchage'])){
            $this->error['nbCouchage'] = 'Le nombre de couchage n\'est pas renseigner';
        }

        if(empty($this->params['prix'])){
            $this->error['prix'] = 'Le prix de la location n\'est pas renseigner';
        }

        if(empty($this->params['description'])){
            $this->error['description'] = 'Vous n\'avez pas decrit votre offre de location';
        }

        if(empty($this->params['etage']) && $this->params['etage'] !== "0"){
            $this->error['etage'] = 'le numero d\'étage n\'est pas renseigner';        
        }
    
        if(empty($this->params['numRue'])){
            $this->error['numRue'] = 'le numero de rue n\'est pas renseigner';
        }
        
        if(empty($this->params['nomRue'])){
            $this->error['nomRue'] = 'le nom de la rue n\'est pas renseigner';
        }

        if(empty($this->params['codepostal'])){
            $this->error['codepostal'] = 'le code postal n\'est pas renseigner';
        }

        if(empty($this->params['ville'])){
            $this->error['ville'] = 'le nom de la ville n\'est pas renseigner';
        }

        if(empty($this->params['pays'])){
            $this->error['pays'] = 'le nom du pays n\'est pas renseigner';
        }

        if(empty($this->params['dispo']) && $this->params['dispo'] !== "0"){
            $this->error['dispo'] = 'la disponibilité du logement n\'est pas renseigner';
        }
        $bdd = new BddManager();
        $LastIdAppart = $bdd->getLastId();
        $NvIdAppart = $LastIdAppart[0] + 1;
        $fichier = basename($this->files['photo1']['name']);
        if(!empty($fichier))
        {
        $laphoto="image" . "-" . $NvIdAppart . "-" . $this->params['idProprio'];
            if(isset($fichier))
            {                
                include("service/uploadphoto.php");   
                $original="image/".$laphoto.".jpg";
                
           }
        }
        else
        {
            $original="/loueMonAppart/image/imageVide.jpg";
        }
            

        if(empty($this->error) == false)
        {
        return $this->error;
        }
        $this->appart = $this->includeNewAppart($original,$NvIdAppart);
        
        return $this->appart;
        
        }
        public function includeNewAppart($original,$NvIdAppart){
            
            $connexion = new PDO('mysql:host=localhost;dbname=locappart;charset=UTF8','root','root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $objet = $connexion->prepare('INSERT INTO appartement SET 
                            idProprio=:idProprio,
                            type=:type,
                            nbCouchage=:nbCouchage,
                            prix=:prix,
                            description=:description,
                            numAppart=:numAppart,
                            etage=:etage,
                            numRue=:numRue,
                            nomRue=:nomRue,
                            codepostal=:codepostal,
                            ville=:ville,
                            pays=:pays,
                            dispo=:dispo,
                            lienPhoto=:lienPhoto
                            ');
                        $objet->execute(array(
                            'idProprio' =>$this->params['idProprio'],
                            'type' =>$this->params['type'],
                            'nbCouchage' =>$this->params['nbCouchage'],
                            'prix' =>$this->params['prix'],
                            'description'=>$this->params['description'],
                            'numAppart' =>$NvIdAppart,
                            'etage' =>$this->params['etage'],
                            'numRue' =>$this->params['numRue'],
                            'nomRue' =>$this->params['nomRue'],
                            'codepostal' =>$this->params['codepostal'],
                            'ville' =>$this->params['ville'],
                            'pays' =>$this->params['pays'],
                            'dispo' =>$this->params['dispo'],
                            'lienPhoto' =>$original                        
                        ));
                        $appart = true;
                return $appart;
            
        }
}