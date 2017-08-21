<?php
session_start();
require 'flight/Flight.php';
require 'model/loginService.php';
require 'model/creerCompteUser.php';
require 'model/User.php';

Flight::render('header', array('heading' => 'hello'), 'header');
Flight::render('footer', array('test' => 'word'), 'footer');
//unset($_SESSION['erreur']);

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/accueil', function(){
    Flight::render('accueil');
});

Flight::route('/signup', function(){
    Flight::render('signup');
});

Flight::route('/creerCompteUserView', function(){
    Flight::render('creerCompteUserView');
});

Flight::route('/offreLocationView', function(){
    Flight::render('offreLocationView');
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

Flight::route('POST /creerCompteUser', function(){
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


Flight::start();
?>