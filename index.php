<?php
session_start();
require 'flight/Flight.php';
require 'autoloader.php';


Flight::render('header', array('heading' => 'hello'), 'header');
Flight::render('footer', array('test' => 'word'), 'footer');
//unset($_SESSION['erreur']);

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/accueil', function(){
    Flight::render('accueil');
});

Flight::route('/creerCompteUserView', function(){
    Flight::render('creerCompteUserView');
});

Flight::route('/afficheAppartViews', function(){
    $bdd = new bddManager();
    $affiche = $bdd->getAllById();
    Flight::set('affiche', $affiche);  
    Flight::render('afficheAppartViews');
});

Flight::route('/creerOffreLocationView', function(){
    Flight::render('creerOffreLocationView');
});

Flight::route('/louerAppartViews/@id', function($id){
    Flight::render('louerAppartViews');
});

Flight::route('/reservationAppartViews/@id', function($id){

    $bdd = new BddManager();
    $afficheAppart = $bdd->getAppartById($id);
    Flight::set('appart', $afficheAppart);
    $bbd2 = new BddManager();
    $afficheDisponibilite = $bbd2->getDisponibilite($id);
    Flight::set('disponibilite',$afficheDisponibilite);
    Flight::render('reservationAppartViews');
});

Flight::route('POST /loginService', function(){
    unset($_SESSION['erreur']);
    $service = new loginService();
    $service->setParams(Flight::request()->data->getData());
    $service->launchControls();
    if($service->getError()){
        $_SESSION['erreur']=$service->getError();
        Flight::redirect('/');
    }
    Flight::redirect('/');
});
Flight::route('/deconnec', function(){
    session_destroy();
    Flight::redirect('/');
});

Flight::route('POST /registerService', function(){
    unset($_SESSION['erreur']);
    $service = new registerService();
    $service->setParams(Flight::request()->data->getData());
    $service->launchControls();
    if($service->getError()){
        $_SESSION['erreur']=$service->getError();
        Flight::redirect('/creerCompteUserView');
    }
    else
        Flight::redirect('/');
});

Flight::route('POST /registerOffreLocation', function(){
    unset($_SESSION['erreur']);
    $service = new registerOffreLocation();
    $service->setParams(Flight::request()->data->getData());
    $service->setFiles(Flight::request()->files->getData());
    $service->launchControls();
    if($service->getError()){
        $_SESSION['erreur']=$service->getError();
        Flight::redirect('/creerOffreLocationView');
    }
    else
        Flight::redirect('/');
});
Flight::route('POST /reservationAppart', function(){
    unset($_SESSION['erreur']);
    $service = new reservationAppart();
    $service->setParams(Flight::request()->data->getData());
    $id = $_POST['idAppart'];
    $fac = $service->ControleDonnee();
    if($service->getError()){
        $_SESSION['erreur']=$service->getError();
        Flight::redirect('/reservationAppartViews/'.$id);
    }
    else
        Flight::redirect('/');
});
Flight::route('/factureViews/@id', function($id){

Flight::render('/factureViews');
});

Flight::start();
?>