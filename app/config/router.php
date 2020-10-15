<?php
// Retrieves all robots
$app->get(
    '/api/robots',
    function() use ($app,$di) {
      $phql = 'SELECT * FROM usuarios ';
      $connection = $di->get('db');
      $statement = $connection->query($phql);
      echo json_encode($statement);
    }
);

$app->notFound(function () use ($app) {
    return json_encode(["status"=>404,"mensaje"=>"Ruta no existe","data"=>false]);
});

$app->handle($_SERVER["REQUEST_URI"]);