<?php
use \Firebase\JWT\JWT;
use Phalcon\DI\FactoryDefault;
class AuthController {

    public function loginAction(){
        $user = array(
            "id_usuario"=> 1,
            "username"  => "jorge siachoque",
        );

        $getConfig = $this->getConfig();
        return $getConfig;
        $this->response->setJsonContent(array(
            "status"  => 200,
            "expira" =>3600,
            "token" => JWT::encode($getConfig + $user, $this->getConfigApp()->key)
        ));

        //devolvemos un 200, todo ha ido bien
        $this->response->setStatusCode(200, "OK");
        $this->response->send();
        /* try{
            $sql = "select * from usuarios";

            //$data = $this->db->query($sql);;
            $data = $this->db->fetchAll($sql);
            return [
                "code" => 200,
                "status" => "success",
                "data" => $data
            ];

        } catch (Exception $e) {
            return [
                "code" => 500,
                "status" => "error",
                "message" => $e->getMessage()
            ];
        } */
    }

}
