<?php
session_start();
require 'flight/Flight.php';
require 'model/loginService.php';
require 'model/registerService.php';
Flight::render('header', array('heading' => 'hello'), 'header');
Flight::render('footer', array('test' => 'word'), 'footer');

Flight::route('/', function(){
    Flight::render('accueil');
});

Flight::route('/signup', function(){
    Flight::render('signup');
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
    Flight::redirect('accueil');
});
Flight::route('/deconnec', function(){
    session_destroy();
    Flight::redirect('/');
});

Flight::route('POST /registerService', function(){
    unset($_SESSION['erreur']);
    $service = new loginService();
    $service->setParams(Flight::request()->data->getData());
    $service->launchControls();
    if($service->getError()){
        $_SESSION['erreur']=$service->getError();
        Flight::redirect('/');
    }
    Flight::redirect('accueil');
});



Flight::start();
?>