<?php

class reservationAppart{
    private $params;
    private $error;
    private $loc;
    

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
    public function getLoc()
    {
        return $this->loc;
    }
    public function setLoc($loc)
    {
        $this->loc=$loc;
    }

    public function ControleDonnee()
    {
        
        $bdd= new BddManager();
        $afficheDisponibilite = $bdd->getDisponibilite($this->params['idAppart']);
        foreach($afficheDisponibilite as $a => $value)
            {
                $AppartDispo = new Rent($afficheDisponibilite[$a]);
                $debutLocEnCours = strtotime($AppartDispo->getDebutLoc());  
                $finLocEnCours = strtotime($AppartDispo->getFinLoc());
                $debutDemandeLoc = strtotime($this->params['debutLoc']);
                $finDemandeLoc = strtotime($this->params['finLoc']);
                $dateAujourdhui = strtotime(date('y-m-d'));
                if (($debutLocEnCours<=$debutDemandeLoc && $debutDemandeLoc<=$finLocEnCours)||($debutLocEnCours<=$finDemandeLoc && $finDemandeLoc<=$finLocEnCours))
                {
                    $this->error['conflitDate'] = "Vous cherchez à reserver, cet appart, sur une période deja reserver." ;
                }
                if($debutDemandeLoc>=$finDemandeLoc)
                {
                    $this->error['inversion'] = "La date de fin de location est antérieure au debut de location";
                }
                if($dateAujourdhui > $debutDemandeLoc)
                {
                    $this->error['horsDate'] = "Date eronee";
                }
                if($this->params['idProprio']==$this->params['idLocataire'])
                {
                    $this->error['proprio'] = "Un locataire ne peut louer sont propre bien";
                }
                
            }
           
            if(!empty($this->error))
            {
                return $this->error;
            }
            else
            {
                $debutDemandeLoc = strtotime($this->params['debutLoc']);
                $finDemandeLoc = strtotime($this->params['finLoc']);
                $dureeLoc = ceil(($finDemandeLoc - $debutDemandeLoc)/604800);
                $prix=$this->params['prixAppart'];
                $prixTotal = $dureeLoc * $prix;
                $this->loc = $this->includeNewRent($prixTotal);
                return $this->loc;

            }
            

    }
    public function includeNewRent($prixTotal){
            
            $connexion = new PDO('mysql:host=localhost;dbname=locappart;charset=UTF8','root','root');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $objet = $connexion->prepare('INSERT INTO location SET 
                            idProprio=:idProprio,
                            idLoueur=:idLoueur,
                            idAppart=:idAppart,
                            debutLoc=:debutLoc,
                            finLoc=:finLoc,
                            prix=:prix
                            ');
                        $objet->execute(array(
                            'idProprio' =>$this->params['idProprio'],
                            'idLoueur' =>$this->params['idLocataire'],
                            'idAppart' =>$this->params['idAppart'],
                            'debutLoc' =>$this->params['debutLoc'],
                            'finLoc' =>$this->params['finLoc'],
                            'prix' =>$prixTotal
                        ));
                        $loc = $connexion->lastInsertId();
                        
                return $loc;
            
        }
    
}