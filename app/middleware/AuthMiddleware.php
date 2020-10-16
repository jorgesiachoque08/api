<?php
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
use Phalcon\Http\Request;
use Phalcon\Http\Response;

class AuthMiddleware {
    protected $request;
    protected $response;


    public function verificarToken(){
        
        $this->request = new Request();
        $this->response = new Response();
        
        $headers = apache_request_headers();
        if(isset($headers['Authorization'])){
            list($jwt) = sscanf( $headers['Authorization'], 'Bearer %s');
            if ($jwt) {
                try {
                    //$config = Factory::fromFile('config/config.php', true);
    
                   
                    //$secretKey = base64_decode($config->get('jwtKey'));
                    
                    /* $token = JWT::decode($jwt, $secretKey, array('HS512'));
    
                    $asset = base64_encode(file_get_contents('https://lorempixel.com/200/300/cats/'));
    
                    header('Content-type: application/json');
                    echo json_encode([
                        'img'    => $asset
                    ]);
     */
                } catch (Exception $e) {
                   
                    header('HTTP/1.0 401 Unauthorized');
                } 
            } else {
                $this->response->setJsonContent(array(
                    "status"=>401,
                    "mensaje"=>"Unauthorized"
                ));

                $this->response->setStatusCode(401, "401 Unauthorized");
                $this->response->send();
            }
        }else{
            $this->response->setJsonContent(array(
                "status"=>403,
                "mensaje"=>"Forbidden"
            ));

            $this->response->setStatusCode(403, "403 Forbidden");
            $this->response->send();
        }
        /*list($jwt) = sscanf( $authHeader->toString(), 'Authorization: Bearer %s');

        if (isset($headers['Authorization']) && !empty($headers['Authorization'])) {
            echo $headers['Authorization'];
        }else{
            return json_encode(["satatus"=>404,"mensaje"=>""]);
        } */

       /*  if ($this->request->isAjax()) {
            if ($this->request->isPost()) {
                $data = $this->request->getRawBody();
                $data = json_decode($data);
                $token= $data->{"refresh_token"};

                //comprobamos si existe el token y no está vacío
                if (empty($token) && $data->{"grant_type"} == "refresh_token") {
                    //devolvemos un 403, Forbidden
                    $this->response->setStatusCode(403, "Forbidden");
                    $this->response->send();
                    die();
                }

                /* try {
                    JWT::$leeway = 60; // 60 seconds
                    $user = JWT::decode($token, $this->getConfigApp()->key, array('HS256'));
                } catch (\Firebase\JWT\ExpiredException $e) {
                    $this->response->setStatusCode(405, $e->getMessage());
                    $this->response->send();
                    die();
                }

                //comprobamos si existe el usuario
                $logged = Usuarios::findFirst(
                    array(
                        "conditions"=> "email = :email: AND password = :password:",
                        "bind"      => array(
                                            "email" => $user->username,
                                            "password" => $user->password
                                        )
                    )
                );

                //si no existe
                if ($logged == false) {
                    //no es un token correcto
                    //devolvemos un 401, Unauthorized
                    $this->response->setStatusCode(401, "Unauthorized");
                    $this->response->send();
                    die();
                }

                $user = array(
                    "id_usuario"=> $logged->id_usuario,
                    "username"  => $logged->email,
                    "password"  => $logged->password
                );

                $getConfig = $this->getConfigToken();

                $this->response->setJsonContent(array(
                    "code"  => 0,
                    "res"   => "success",
                    "token" => JWT::encode($getConfig + $user, $this->getConfigApp()->key)
                ));

                $this->response->setStatusCode(200, "OK");
                $this->response->send();
            } else {
                $this->response->setStatusCode(405, "Method Not Allowed");
                $this->response->send();
            } 
        } else {
            $this->response->setStatusCode(405, "Method Not Allowed");
            $this->response->send();
        } */
        /* $this->response->setContentType('application/json', 'utf-8');
        $this->response->setContent(json_encode(["status"=>405]));
        $this->response->send(); */
    }
    

}