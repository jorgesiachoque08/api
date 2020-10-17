<?php

$AuthController = new AuthController();


include APP_PATH.'/grupoRouter/Auth.php';

/* $app->get(
  '/api/listarUsuarios',
  function() use ($AuthController) {
    return json_encode($AuthController->verificarToken());
  }
); */

$app->notFound(function () use ($app) {
    return json_encode(["status"=>404,"mensaje"=>"Ruta no existe","data"=>false]);
});

$app->handle($_SERVER["REQUEST_URI"]);