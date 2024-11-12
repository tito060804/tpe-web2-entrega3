<?php
    
    require_once 'libs/router.php';
    
    require_once 'app/controller/cepas.controller.php';
    require_once 'app/controller/vinoteca.controller.php';

    $router = new Router();


    #                 endpoint                     verbo      controller              metodo
     $router->addRoute('vinos'       ,            'GET',     'vinotecaController',   'getAll');
     $router->addRoute('vinos/:id'   ,            'GET',     'vinotecaController',   'getvino'   );
     $router->addRoute('vinos/:id'   ,            'DELETE',  'vinotecaController',   'deletevino');
     $router->addRoute('vinos'   ,                'POST',    'vinotecaController',   'createvino');
     $router->addRoute('vinos/:id'   ,            'PUT',     'vinotecaController',   'updatevino');
     #diferencia de controllers;
     $router->addRoute('cepas'       ,            'GET',     'cepasController'   ,   'getAll');
     $router->addRoute('cepas/:id'   ,            'GET',     'cepasController'   ,   'getcepa'   );
     $router->addRoute('cepas/:id'   ,            'DELETE',  'cepasController'   ,   'deletecepas');
     $router->addRoute('cepas'   ,                'POST',    'cepasController'   ,   'createcepas');
     $router->addRoute('cepas/:id'   ,            'PUT',     'cepasController'   ,   'updatecepas');


    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
