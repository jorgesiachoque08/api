<?php
// Retrieves all robots
$jsonController = new AuthController();
$app->get(
    '/api/robots',
    function() use ($jsonController) {
      echo json_encode($jsonController->loginAction());
    }
);

$app->notFound(function () use ($app) {
    return json_encode(["status"=>404,"mensaje"=>"Ruta no existe","data"=>false]);
});

$app->handle($_SERVER["REQUEST_URI"]);