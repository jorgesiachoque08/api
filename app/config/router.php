<?php
// Retrieves all robots
use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;
$jsonController = new AuthController();
$middlewareAuth = new AuthMiddleware();


//include APP_PATH.'/grupoRutas/AuthRouter.php';

$app->setDI($di);

$app->post(
    '/api/login',
    function() use ($jsonController) {
      return json_encode($jsonController->loginAction());
    }
);

$app->get(
  '/api/listarUsuarios',
  function() use ($middlewareAuth) {
    return $middlewareAuth->verificarToken();
    //return json_encode($jsonController->loginAction());
  }
);


$app->notFound(function () use ($app) {
    return json_encode(["status"=>404,"mensaje"=>"Ruta no existe","data"=>false]);
});



//$app->setEventsManager($eventsManager);
$app->handle($_SERVER["REQUEST_URI"]);