<?php
session_start();
require 'flight/Flight.php';
require 'model/loginService.php';
require 'model/creerCompteLocataire.php';
Flight::render('header', array('heading' => 'hello'), 'header');
Flight::render('footer', array('test' => 'word'), 'footer');

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/accueil', function(){
    Flight::render('accueil');
});

Flight::route('/signup', function(){
    Flight::render('signup');
});

Flight::route('/creerCompteLocataireView', function(){
    Flight::render('creerCompteLocataireView');
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

Flight::route('POST /creerCompteLocataire', function(){
    unset($_SESSION['erreur']);
    $service = new loginService();
    $service->setParams(Flight::request()->data->getData());
    $service->launchControls();
    if($service->getError()){
        $_SESSION['erreur']=$service->getError();
        Flight::redirect('/creerCompteLocataireView');
    }
    Flight::redirect('/');
});



Flight::start();
?>