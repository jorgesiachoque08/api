<?php
class AuthController extends ControllerBase {

    public function onConstruct() {
        parent::initialize();
    }

    public function loginAction(){
        try{
            $sql = "select * from users";

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
        }
    }

}
