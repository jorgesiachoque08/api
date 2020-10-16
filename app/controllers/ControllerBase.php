<?php

use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;
use Phalcon\Translate\Adapter\NativeArray as NativeArray;
use Phalcon\Http\Client\Request as RequestCli;

class ControllerBase extends Controller {

    /**
     * @desc - array con los lenguajes disponibles en la app
     */
    protected $_avalaibleLangs = array("es", "en");

    protected function initialize() {
    }

    /**
     * @desc - obtenemos las traducciones por la sesiÃ³n del usuario, por defecto espaÃ±ol
     */
    public function getTranslation() {
        //obtenemos el archivo con las traducciones
        require __dir__ . "/../messages/" . ($this->session->has("language") ?
                        $this->session->get("language") : 'es') . ".php";

        //Variable $messages_overview disponible en todas las vistas (Generalidades)
        $this->view->messages = new NativeArray(array(
            "content" => $overview
        ));

        $this->view->cancelbots = new NativeArray(array(
            "content" => $cancelbots
        ));

        $this->view->company_data = new NativeArray(array(
            "content" => $companyData
        ));
    }

    /**
     * Valida si ya existe el nit asociado a una empresa
     *
     * Valida si el nit enviado como parámetro existe en la plataforma
     * 
     * @param integer $nit identificador único de la empresa
     */
    public function validateNit($nit, $companyId = null) {

        $condition = '';
        if (!is_null($companyId)) {
            $condition = ' AND id <> ' . $companyId;
        }

        $companyNit = Empresas::findFirst(
                        array(
                            "conditions" => "did = :nit:" . $condition,
                            "bind" => array('nit' => $nit)
                        )
        );

        //Si ya existe el NIT genero un error para mostrar
        if (!empty($companyNit)) {
            $errorDescription = $this->view->messages['duplicate_nit'];
            $return = new Response();
            $return->setStatusCode(400, 'Bad Request');
            $return->send();
            $this->json_component->getFormat($errorDescription);
        }
    }

    /**
     * Validar servicio
     *
     * Valida si un sevicio existe en la base de datos
     * 
     * @param array $taskId Id del servicio buscado
     * @return object Objeto con los datos del servicio
     *
     */
    public function validateServiceUser($uuId, $user) {

        $userData = TblUsers::findFirst([
                    "conditions" => "id = :user:",
                    "bind" => array("user" => $user)
        ]);

        if (isset($userData->user_type) && $userData->user_type == 4 && $userData->administrator == 1) {
            $task = Task::findFirst([
                        "conditions" => "uuid = :uuid: AND (id_company = :company: OR solicitante = :user:)",
                        "bind" => array('uuid' => $uuId, "company" => $userData->empresas_id, "user" => $user)
            ]);
        } else {
            //Busco el servicio asociado con el usuario
            $task = Task::findFirst([
                        "conditions" => "uuid = :uuid: AND solicitante = :user:",
                        "bind" => array('uuid' => $uuId, "user" => $user)
            ]);
        }


        //Valido que exista el servicio
        if (empty($task)) {
            return false;
        }

        return $task;
    }

    /**
     * Validar descarga
     *
     * Valida si se puede descargar la factura de un servicio
     * 
     * @param integer $uuId identificador del servicio a facturar
     * @param integer $user id del usuario solicitante
     * @return boolean se puede o no descargar factura
     *
     */
    public function validateDownload($id, $user, $return = false) {
        $task = $this->validateServiceUser($id, $user);
        $response = false;
        if (!$task) {
            if (!$return) {
                $errorDescription = $this->view->messages['nonexistent_service_user'];
                $return = new Response();
                $return->setStatusCode(404, 'Not Found');
                $return->send();
                $this->json_component->getFormat($errorDescription);
            }
        } else {
            if (!($task->estado_pago != 1 || $task->estado != 5 || $task->type_task_id == 4 )) {
                $messenger = TblUsers::findFirst(
                                array(
                                    "conditions" => "id = :messenger: AND user_type = 2",
                                    "bind" => array('messenger' => $task->id_resource)
                                )
                );

                if (!empty($messenger)) {
                    if (!$return) {
                        return $task;
                    } else {
                        $response = true;
                    }
                }
            }
        }
        return $response;
    }

    public function businessAdd() {
        try {

            $conn = $this->rethinDB;
            $result_s1 = r\db("db01")->table("general_data")->get(1)->run($conn);
            $data = array(
                "business" => $result_s1["business"] + 1,
            );
            $result_s1["business"] = ($result_s1["business"] + 1);
            r\db("db01")->table("general_data")->get(1)->update($data)->run($conn);
        } catch (Exception $e) {
            //En caso de error se devuelve la transacción
            $return = new Response();
            $return->setStatusCode(500, 'Internal Server Error');
            $return->send();
            $this->json_component->getFormat($e->getMessage());
        }
    }

    /* CÓDIGOS DE RESPUESTA */

    public function _statusCode($code) {
        $response = new Response();
        $response->setStatusCode($code, $this->getMessageStatus($code));
        $response->send();
    }

    public function getMessageStatus($code) {

        $arrayMessages = [
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Moved Temporarily',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Time-out',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Large',
            415 => 'Unsupported Media Type',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Time-out',
            505 => 'HTTP Version not supported'
        ];

        if (isset($arrayMessages[$code])) {
            return $arrayMessages[$code];
        }
        return '';
    }

    /////
    //BASECONTROLER
    ///
    public function _companyprice($city, $type_service, $company_id) {
        $key = $city . "&" . $type_service . "&" . $company_id . "&";

        $resutl = array();
        if (empty($this->cache->get($key))) {
            $base = EmpresasPreciosServicio::find(array(
                        "conditions" => "city = :id_city: and id_type_task = :id_type_task: and empresas_id = :company_id:   ",
                        "bind" => array('id_city' => $city, 'id_type_task' => $type_service, "company_id" => $company_id)
            ));
            if ($base->count() > 0) {
                foreach ($base as $price) {
                    $resutl["base"] = $price->valor_base;
                    $resutl["distance"] = $price->distancia_base;
                    $resutl["km_add"] = $price->km_add;
                    $resutl["km_roundtrip"] = $price->ida_vuelta;
                    $resutl["add_stop"] = $price->parada_add;
                    $resutl["cash_commission"] = $price->comision_porcentaje;
                    $resutl["credit_commission"] = $price->comision_porcentaje_p;
                    $resutl["name_geoapps"] = $price->Ciudad->name_geoapps;
                    $resutl["night_surcharge"] = $price->night_surcharge;
                    $resutl["type"] = 2;
                    $resutl["time_add"] = $price->time_add;
                }
            } else {
                $resutl = $this->_baseprice($city, $type_service);
            }
            $this->cache->save($key, $resutl, 100);
        } else {
            $resutl = $this->cache->get($key);
        }
        return $resutl;
    }

    public function _baseprice($city, $type_service) {
        $key = $city . "&" . $type_service . "&";
        if (empty($this->cache->get($key))) {
            $base = TypeTaskCity::find(
                            array("conditions" => "id_city = :id_city: and id_type_task = :id_type_task: ",
                                "bind" => array('id_city' => $city, 'id_type_task' => $type_service)
            ));
            $resutl = array();
            if ($base->count() > 0) {
                foreach ($base as $price) {

                    $resutl["base"] = $price->valor;
                    $resutl["distance"] = $price->distancia;
                    $resutl["km_add"] = $price->km_add;
                    $resutl["km_roundtrip"] = $price->ida_vuelta;
                    $resutl["add_stop"] = $price->parada_add;
                    $resutl["cash_commission"] = $price->comision_porcentaje;
                    $resutl["credit_commission"] = $price->comision_porcentaje_p;

                    $resutl["name_geoapps"] = $price->Ciudad->name_geoapps;
                    $resutl["night_surcharge"] = $price->night_surcharge;
                    $resutl["type"] = 1;
                    $resutl["time_add"] = $price->time_add;
                }
            }
            $this->cache->save($key, $resutl, 10000);
        } else {
            $resutl = $this->cache->get($key);
        }
        return $resutl;
    }

    public function _SelectTaskRethinkDb($id_task) {
        $conn = $this->rethinDB;
        return r\db("db01")->table('tasks')->get($id_task)->run($conn);
    }

    public function _userDomi($idUser, $city, $type_service) {
        $wellness = 0;
        $welfareValue = 0;
        $welfareBalance = 0;
        $payment_type = 1;
        $balance_ = array();
        $key = "_id_user_Domi&" . $idUser . "&";
        if (empty($this->cache->get($key))) {
            $userData = TblUsers::findFirst(
                            array("conditions" => "id = :id_user: ",
                                "bind" => array('id_user' => $idUser)
            ));
            if ($userData) {
                $this->cache->save($key, $userData, 100);
            } else {
                $this->json_component->getFormat("Usuario inexistente", array(), array(), "Error User");
            }
        } else {
            $userData = $this->cache->get($key);
        }
        $base = new BaseController();
        if (!empty($userData->empresas_id)) {
            $baseprice = $this->_companyprice($city, $type_service, $userData->empresas_id);
            $type_task_pago_id = $userData->Empresas->type_task_pago_id;
            $balance_ = $base->_balanceBusiness($userData->empresas_id);
        } else {
            $baseprice = $this->_baseprice($city, $type_service); //OK CACHE
            $type_task_pago_id = $userData->getTypeTaskPagoId();
            $balance_ = $base->_balance($idUser);
        }
        $balancet = isset($balance_["acumulado"]) ? $balance_["acumulado"] : 0;
        if (empty($baseprice)) {
            $this->_statusCode(400);
            $this->json_component->getFormat("Ciudad o tipo de sevicio inexitente");
        }

        return array(
            "wellness" => $wellness,
            "welfareValue" => $welfareValue,
            "welfareBalance" => $welfareBalance,
            "payment_type" => $payment_type,
            "user" => $userData,
            "baseprice" => $baseprice,
            "id_city" => $city,
            "type_service" => $type_service,
            "type_task_pago_id" => $type_task_pago_id,
            "empresas_id" => $userData->empresas_id,
            "balancet" => (int) $balancet,
        );
    }

    public function _addresVerificationCityDom($address_, $ciudad, $nearby_city, $count = 1, $id_company = null) {
        $address = $this->_quitar_tildes($address_);
        $address_status = 0;
        $type = 0;
        $status = 0;
        $recharge = 0;
        $NearbyCity = $this->_NearbyCityDom($ciudad, $nearby_city);
        if ($NearbyCity) {
            $type = $NearbyCity["type"];
            $status = $NearbyCity["type"];
            $ciudad = $NearbyCity["name_geoapps"];
            $recharge = $NearbyCity["recharge"];
        } else {
            $this->_status400();
            $message = "Ciudad aledaña Invalida";
            $this->json_component->getFormat($message, array(), array(), "NearbyCity overrides");
        }

        $address = $this->_addresVerificationCityN($address, $ciudad);
        if (isset($address["message"])) {
            if ($type == 2) {
                $data = array("data" => (array) $NearbyCity);
                $address = array("response" => $data);
                $status = 2;
            } else {
                if ($count == 1) {
                    $this->_status400();
                    $message = "Dirección no válida " . $address_ . "  " . $ciudad . " " . $nearby_city . " -- " . $address["message"];
                    if ($id_company == $this->params->id_grupo_exito) {
                        $messages = "Dirección no válida " . $address_ . "  " . $ciudad . " " . $nearby_city . " -- " . $address["message"];
                        foreach ($this->params->grupo_exito_notification as $phone) {
                            $this->_SMSEnviar($phone, "MU-GRUPO EXITO: " . $messages);
                        }
                    }
                    $this->json_component->getFormat($message);
                }
                $address["response"] = array();
                $address_status = 1;
            }
        }
        $address = $address["response"];
        $address["nearbycity"] = $type;
        $address["recharge"] = $recharge;
        $address["status"] = $status;
        $address["address_status"] = $address_status;
        $address["address"] = $address_;

        return $address;
    }

    public function _addresVerificationCity($address, $ciudad) {
        $address = $this->_quitar_tildes($address);
        $type = 0;
        $recharge = 0;
        $NearbyCity = $this->_NearbyCity($ciudad);
        foreach ($NearbyCity as $datas) {
            if (strpos(strtolower($address), $datas["nearby_city"]) !== false) {
                $type = $datas["type"];
                $recharge = $datas["recharge"];
            }
        }
        if ($type != 0) {
            $address = $this->_addresVerificationCity2($address, $ciudad);
            if (isset($address["message"])) {
                $this->_status400();
                $message = "Dirección no válida";
                $this->json_component->getFormat($message);
            }
            $address = $address["response"]["features"][0];
        } else {
            $address = $this->_addresVerificationCity_($address, $ciudad);
            if (isset($address["message"])) {
                $this->_status400();
                $message = "Dirección no válida";
                $this->json_component->getFormat($message);
            }
            $address = $address["response"];
        }
        $address["nearbycity"] = $type;
        $address["recharge"] = $recharge;
        return $address;
    }

    function _quitar_tildes($cadena) {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        return str_replace($no_permitidas, $permitidas, $cadena);
    }

    public function _NearbyCityDom($citybase, $cityNerby) {
        $key = "_NearbyCityDom&" . $citybase . "&-" . $cityNerby;
        if (empty($this->cache->get($key))) {
            $datas = NearbyCity::findFirst(array(
                        "conditions" => "citybase = :citybase: AND ( nearby_city=:nearby_city: or name_geoapps=:nearby_city: ) ",
                        "bind" => array('citybase' => $citybase, "nearby_city" => $cityNerby),
                        "columns" => "id, nearby_city,type,recharge,address_base,name_geoapps",
                        'order' => 'id DESC'
                            )
            );
            $this->cache->save($key, $datas, 1000);
        } else {
            $datas = $this->cache->get($key);
        }
        return $datas;
    }

    public function _NearbyCity($citybase) {
        $key = "_NearbyCity&" . $citybase;
        if (empty($this->cache->get($key))) {
            $datas = NearbyCity::find(array(
                        "conditions" => "citybase = :citybase:  ",
                        "bind" => array('citybase' => $citybase),
                        "columns" => "id, nearby_city,type,recharge",
                        'order' => 'id DESC'
                            )
            );
            $this->cache->save($key, $datas, 1000);
        } else {
            $datas = $this->cache->get($key);
        }
        return $datas;
    }

    public function _addresVerificationCityN($address, $ciudad) {
        $key = $ciudad . "&" . urlencode($address) . "&";
        $url1 = $this->params->urlGeoapps . "co/" . $ciudad . "?address=" . urlencode($address);
        $url = $this->params->urlGeoapps2 . "co/" . $ciudad . "?address=" . urlencode($address);
        if (empty($this->cache->get($url))) {
            $base = new BaseController();
            $jsons = $base->_getCurtGeoapps2($url, true);
            if ($jsons->head->http_code == 200 || $jsons->head->http_code == 404) {
                $json = $jsons->data;
                $this->cache->save($key, $jsons->data, 1000);
            } else {
                $LogLupap = new LogLupap();
                $LogLupap->url = $url;
                $LogLupap->http_code = $jsons->head->http_code;
                $LogLupap->result = json_encode($jsons);
                $LogLupap->save();
                $jsons = $base->_getCurtGeoapps2($url1, true);
                if ($jsons->head->http_code == 200 || $jsons->head->http_code == 404) {
                    $json = $jsons->data;
                    $this->cache->save($key, $jsons->data, 1000);
                } else {
                    if ($this->db->isUnderTransaction()) {
                        $this->db->rollback();
                        $LogLupap = new LogLupap();
                        $LogLupap->url = $url1;
                        $LogLupap->http_code = $jsons->head->http_code;
                        $LogLupap->result = json_encode($jsons);
                        $LogLupap->save();
                    }
                    $this->_status400();
                    $this->json_component->getFormat("Problemas con LUPAP");
                    $json["message"] = "Problemas con LUPAP";
                }
            }
        } else {
            $json = $this->cache->get($url);
        }
        if ($json["response"]["type"] == "FeatureCollection") {
            $json["response"] = $json["response"]["features"][0];
        }
        return $json;
    }

    public function _addresVerificationCity_($address, $ciudad) {

        $key = $ciudad . "&" . urlencode($address) . "&";
        $url = $this->params->urlGeoapps2 . "co/" . $ciudad . "?address=" . urlencode($address);
        if (empty($this->cache->get($url))) {
            $base = new BaseController();
            $json = $base->_getCurtGeoapps($url, true);
            $this->cache->save($key, $json, 100);
        } else {
            $json = $this->cache->get($url);
        }
        if ($json["response"]["type"] == "FeatureCollection") {
            $json["response"] = $json["response"]["features"][0];
        }
        return $json;
    }

    public function _getCurt($url, $assoc = false) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $json = curl_exec($curl);
        return json_decode($json, $assoc);
    }

    //CALCULAR DISTANCIA EN 2 PUNTOS ATRAVEZ DE outer.project-osrm.com 
    public function _Distance($origin, $destination, $city_id) {
        $result = array();
        if ($city_id == 10) {
            $url = $this->params->urlRouter . $origin . ";" . $destination;
        } else {
            $url = $this->params->urlRouter2 . "" . $origin . ";" . $destination;
        }
        if (empty($this->cache->get($url))) {
            $json = $this->_getCurt($url, true);
            if ($json["code"] == "Ok") {
                $result["total_distance"] = ($json["routes"][0]["distance"] / 1000);
                $result["total_time"] = $json["routes"][0]["duration"];
                $this->cache->save($url, $result, (10000 * 600 * 600));
            } else {
                $origin_ = explode(",", $origin);
                $destination_ = explode(",", $destination);
                $totalkm = $this->distanciaLineal($origin_[1], $origin_[0], $destination_[1], $destination_[0]);
                $result["total_distance"] = (int) $totalkm;
                $result["total_time"] = 0;
            }
        } else {
            $result = $this->cache->get($url);
        }
        return $result;
    }

    public function _setMovimientos($accumulated, $cash_resource, $resource_id, $type, $description, $accumulated_nr, $task_id = NULL, $empresas_id = NULL, $discount_nr = '', $userCreate = 1, $increment = 0) {

        if ($accumulated < $accumulated_nr) {
            $discount_nr = $accumulated_nr - $accumulated;
            $accumulated_nr = $accumulated;
        }
        if ($accumulated_nr < 0) {
            $accumulated_nr = 0;
        }

        $movements = new Movimientos;
        $movements->setAcumulado($accumulated);
        $movements->setMonto($cash_resource);
        $movements->setUsuario($resource_id);
        $movements->setTypeMovimientosId($type);
        $movements->setDescripcion($description);
        $movements->setAcumuladoNr($accumulated_nr);
        $movements->setTaskId($task_id);
        $movements->setEmpresasId($empresas_id);
        $movements->setFecha(date("Y-m-d"));
        $movements->setUsercreate($userCreate);
        $movements->setDescuentoNr($discount_nr);
        $movements->setCodPlatam($increment);

        if (!$movements->save()) {
            foreach ($movements->getMessages() as $message) {
                $this->_statusCode(400);
                $this->json_component->getFormat($message->getMessage());
            }
        }

        return $movements->id;
    }

    public function _setRefunds($accumulated, $cash_resource, $resource_id, $type, $description, $accumulated_nr, $task_id, $empresas_id = NULL, $userCreate = 1) {
        if ($accumulated < $accumulated_nr) {
            $accumulated_nr = $accumulated;
        }
        $refunds = new Reembolsos;
        $refunds->acumulado = $accumulated;
        $refunds->monto = $cash_resource;
        $refunds->usuario = $resource_id;
        $refunds->type_movimientos_id = $type;
        $refunds->descripcion = $description;
        $refunds->acumulado_nr = $accumulated_nr;
        $refunds->task_id = $task_id;
        $refunds->empresas_id = $empresas_id;
        $refunds->fecha = date("Y-m-d");
        $refunds->usercreate = $userCreate;

        if (!$refunds->save()) {
            foreach ($refunds->getMessages() as $message) {
                $this->_statusCode(400);
                $this->json_component->getFormat($message->getMessage());
            }
        }

        return $refunds->id;
    }

    public function _setTaskHistory($type_task_status_id, $task_id, $recurso_id = NULL, $lat = NULL, $long = NULL, $task_places_id = NULL, $distanciaL = '0', $tipo_parada = NULL, $create_users_id = 1, $tipo_cancelacion = 0, $descripcion = "", $penalizacion = "", $status_code = NULL, $is_fake_location = NULL, $id_point = NULL) {
        $taskHistory = new TaskHistory;
        $taskHistory->setTypeTaskStatusId($type_task_status_id);
        $taskHistory->setTaskId($task_id);
        $taskHistory->setRecursoId($recurso_id);
        $taskHistory->setLat($lat);
        $taskHistory->setLong($long);
        $taskHistory->setDistancia($distanciaL);
        $taskHistory->setTaskPlacesId($task_places_id);
        $taskHistory->setTipoParada($tipo_parada);
        $taskHistory->setTipoCancelacion($tipo_cancelacion);
        $taskHistory->setDescripcion($descripcion);
        $taskHistory->setCreateUsersId($create_users_id);
        $taskHistory->setPenalizacion($penalizacion);
        $taskHistory->status_code_verification = $status_code;
        $taskHistory->is_fake_location = (bool) $is_fake_location;
        $taskHistory->id_point = $id_point;

        $taskHistory->datecreate = date("Y-m-d H:i:s");
        $taskHistory->save();
        return $taskHistory->id;
    }

    public function _newtime($start_date, $start_time, $type_service, $night_surcharge_base, $type = 0) {
        $newdate = strtotime("5 minutes", strtotime(date("Y-m-d H:i:s")));
        $is_holiday = 0;
        $status = 100;
        $night_surcharge = 0;
        if ($type == 0) {
            $dateservice = strtotime($start_date . " " . $start_time);
            if ($newdate >= $dateservice) {
                $start_date = date('Y-m-d');
                $start_time = date('H:i:00');
                $status = 2;
            }
        }

        if (in_array($start_date, (array) $this->params['Holidays'])) {
            $night_surcharge = $night_surcharge_base;
        } else {
            $time_num = date('H', strtotime($start_time));
            $day_num = date('N', strtotime($start_date));
            if ($day_num == 7) {
                $is_holiday = 1;
            }
            if ($is_holiday == 1 || ($time_num >= 21 || $time_num < 7)) {
                $night_surcharge = $night_surcharge_base;
            }
        }
        return array(
            "start_time" => $start_time,
            "start_date" => $start_date,
            "status" => $status,
            "night_surcharge" => $night_surcharge,
        );
    }

    public function _UpdateRethinkDb($date, $data, $table = "couriers", $index = "global_courier_id") {
        if ($table == 'tasks') {
            $this->updateSearch($date);
        }
        $conn = $this->rethinDB;
        $result = r\db("db01")->table($table)->get($date)->update($data)->run($conn);
        return ((array) $result);
    }

    public function _DeleteRethinkDb($id, $table) {
        $conn = $this->rethinDB;
        $result = r\db("db01")->table($table)->get($id)->delete()->run($conn);
        return ((array) $result);
    }

    public function _UpdateTaskRethinkDb($task, $data) {
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray);
        $global_task_ids = array(
            "global_task_id" => (int) $task
        );
        $result = r\db("db01")->table("tasks")->filter($global_task_ids)->update($data)->run($conn);
        $this->updateSearch($task);
        return ((array) $result);
    }

    public function _UpdateStatusRelanceRethinkDb($id_task, $status) {
        $this->_rethindUpdateTask($id_task);
    }

    public function updateCouriesRethink($companyId, $arrayCouriers) {
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray, "", 0, false);
        return r\db("db01")->table("couriers_per_company")->get($companyId)->update(["couriers" => $arrayCouriers])->run($conn);
    }

    public function _CreateRethinkDb($data, $table = "couriers") {
        $status = false;
        if ($table == 'tasks') {
            $this->updateSearch($data['global_task_id']);
            $status = true;
        }
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray, "", 0, $status);
        return r\db("db01")->table($table)->insert($data)->run($conn);
    }

    public function _status400() {
        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(400);
        $response->send();
    }

    //Referidos
    public function _referidosEnd($user_id) {
        echo $user_id;
        echo "@@@:)";
    }

    public function Timerating($task_id, $type_task_id, $recurso_id) {

        $taskasig = TaskHistory::findFirst(
                        array(
                            "conditions" => "task_id = :task_id: AND type_task_status_id=3 AND recurso_id=:recurso_id:  order by id DESC",
                            "columns" => "datecreate, type_task_status_id",
                            "bind" => array('task_id' => $task_id, 'recurso_id' => $recurso_id)
                        )
        );
        $qespera = $taskasig->datecreate;
        $taskllegada = TaskHistory::findFirst(
                        array(
                            "conditions" => "task_id = :task_id: AND type_task_status_id=4 AND recurso_id=:recurso_id:  order by id DESC",
                            "columns" => "datecreate, type_task_status_id",
                            "bind" => array('task_id' => $task_id, 'recurso_id' => $recurso_id)
                        )
        );
        $tllegada = $taskllegada->datecreate;
        $segDif = $this->DifSegundos($qespera, $tllegada);
        if ($type_task_id == 4) {
            $maxvalTime = 900;
        } else {
            $maxvalTime = 3600;
        }
        $valoracion = 0;
        if ($segDif > 0) {
            $valoracion = $maxvalTime / $segDif;
        }
        if ($valoracion > 1) {
            $valoracion = 1;
        }
        $calf = 5 * ($valoracion);
        $this->Calificar($task_id, "6", $calf, "2");
    }

    /*
      Diferencias entre fechas dada en segundos;
     */

    public function DifSegundos($fechaInicial, $fechaFinal) {
        return strtotime($fechaFinal) - strtotime($fechaInicial);
    }

    protected function Calificar($task_id, $id_pregunta, $calf, $type, $version = null) {
        $calificacion = new CalificaCalificacion;
        $calificacion->task_id = $task_id;
        $calificacion->califica_preguntas_id = $id_pregunta;
        $calificacion->calificacion = $calf;
        $calificacion->dispositivo = $type; //2=SISTEMA
        $calificacion->version = $version;
        $calificacion->save();
    }

    public function RatingDistance($task_id) {
        $taskasig = TaskHistory::findFirst(
                        array(
                            "conditions" => "task_id = :task_id: AND type_task_status_id=4  GROUP BY  task_id ",
                            "columns" => " AVG(distancia) as distance",
                            "bind" => array('task_id' => $task_id)
                        )
        );

        $prom_dist = $taskasig->distance;
        if ($prom_dist > 0) {
            $est = (100 / $prom_dist);
            if ($est > 1) {
                $est = 1;
            }
            $calf = 5 * ($est);
        } else {
            $calf = 0;
        }
        $this->Calificar($task_id, "5", $calf, "2");
        $Score = new ScoreController();
        $Score->qualifyingServiceAction($task_id);
    }

    public function promedioUser($id_user) {
        echo $id_user;
        $taskasig = TaskHistory::findFirst(
                        array(
                            "conditions" => "task_id = :task_id: AND type_task_status_id=4  GROUP BY  task_id ",
                            "columns" => " AVG(distancia) as distance",
                            "bind" => array('task_id' => $task_id)
                        )
        );
    }

    public function refererend($id_user) {
        $users = TblUsers::findFirst(array(
                    "conditions" => "id = :id_user: ",
                    "bind" => array('id_user' => $id_user)
        ));
        if ($users->pago_referido == 1) {
            $task_R = Task::findFirst(array(
                        "conditions" => "id_resource = :id: AND estado=5 ",
                        "columns" => "count(id) as total",
                        "bind" => array('id' => $id_user),
            ));
            if ($task_R["total"] >= 2 && $task_R["total"] <= 10) {
                $procal = CalificacionFinal::findFirst(array(
                            "conditions" => "resource = :id_user: ",
                            "columns" => "avg(calificacion_total)  as prom",
                            "bind" => array('id_user' => $id_user)
                ));
                if ($procal["prom"] >= 3) {
                    $resource = Recursos::findFirst(array(
                                "conditions" => "tbl_users_id = :id_user: ",
                                "columns" => "id,celular,nombre",
                                "bind" => array('id_user' => $users->q_refiere)
                    ));
                    $message = "¡Felicitaciones! Tu apadrinado" . $users->Recursos1["0"]->nombre . " ha realizado su tercer servicio. Has ganado 12.000 créditos de retiro.";
                    $this->_SumMovements($users->q_refiere, 12000, 35, "Pago por 3 servicio del referido " . $id_user);
                    $this->_SMSEnviar($resource->celular, $message);
                    $users->pago_referido = 2;
                    $users->save();
                }
            } else if ($task_R["total"] > 10) {
                $users->pago_referido = 3;
                $users->save();
            }
        }
    }

    public function _SumMovements($idUser, $value, $id_movements, $description, $nr = 0) {
        $movement = $this->_balance($idUser);
        $accumulated_nr = ($movement->acumulado_nr + $nr);
        $accumulated = $movement->acumulado + $value;
        $this->_setMovimientos(round($accumulated, 0), $value, $idUser, $id_movements, $description, $accumulated_nr);
    }

    public function _balance($id_resource) {
        return Movimientos::findFirst(array(
                    "conditions" => "usuario = :id_user:  ",
                    "order" => "id  DESC",
                    "columns" => "id, acumulado,acumulado_nr",
                    "bind" => array('id_user' => $id_resource)
        ));
    }

    public function _SMSEnviar($movil, $message) {
        $username = $this->params->user_infobit;
        $password = $this->params->pwd_infobit;
        $headers = array(
            "Content-Type: application/json",
        );
        $datos = array(
            "from" => "InfoSMS",
            "to" => "+57" . (int) $movil,
            "text" => $message,
        );
        $objectData = json_encode($datos);
        $rest = curl_init();
        curl_setopt($rest, CURLOPT_URL, $this->params->url_infobit);
        curl_setopt($rest, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($rest, CURLOPT_POST, 1);
        curl_setopt($rest, CURLOPT_POSTFIELDS, $objectData);
        curl_setopt($rest, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($rest, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($rest);
        curl_close($rest);
        $Logsms = new LogSms();
        $Logsms->phone = $movil;
        $Logsms->message = $message;
        $Logsms->result = $result;
        $Logsms->save();
    }

    public function _rethindUpdateTask($task_id) {
        $shop_pay = 0;
        $place_number = null;
        $type_place = null;
        $DeliveryCon = new DeliveryController();
        $task = Task::findFirst(array("conditions" => "id = :id_task:  ", "bind" => array('id_task' => $task_id)));
        $resultzone = array();
        if ($task->type_task_id == 4) {
            $cronbase = new CrontController();
            $resultzone = $cronbase->SearchAvailability($task->TaskPlaces[0]->OGR_FID, $task->TaskPlaces[0]->store_id, $task->id);
        }
        if ($task->TblUsers->empresas_id > 0) {
            $name_company = $task->TblUsers->Empresas->nombre_empresa;
            $phone_company = $task->TblUsers->Empresas->telefono;
        } else {
            $name_company = NULL;
            $phone_company = NULL;
        }
        $arraysPlaces_ = array();
        $cont = 0;
        $task_place_changed = NULL;
        $last_address = NULL;
        $statustoken = 0;
        $global_cash = 0;
        foreach ($task->taskPlaces as $places) {
            foreach ($places->Products as $products_) {
                if ($products_->sku == $this->params->skutoken) {
                    $statustoken = 1;
                }
            }
            if ($places->estado_p > 0) {
                $task_place_changed = (int) $places->id;
                $place_number = $places->tipo_task_places;
                $type_place = $places->estado_p;
            }
            if ($cont == 1) {
                $last_address = $places->address;
            }
            if ($cont == 0) {
                $description = $task->descripcion . "\n -" . $places->descripcion;
            } else {
                $description = $places->descripcion;
            }

            $producPlacesT = $DeliveryCon->productPlaces($cont, $task->getId(), $places->store_id);

            if ($places->type == 0) {
                $name_s = $name_company;
            } else {
                $name_s = "Entregando";
            }
            if ($places->type == 2) {
                $placestype = 0;
            } else {
                $placestype = $places->type;
            }
            $global_cash = $global_cash + ($places->valor_compra - $places->products_value);
            $personal_name = $places->client_name;
            $personal_phone = $places->client_phone;
            $evidencs = isset($places->TaskPlacesComplement->evidence) ? $places->TaskPlacesComplement->evidence : 0;
            $arraysPlacesvuelta = array(
                "token" => (String) $places->token,
                "type" => (int) $placestype,
                "address_name" => $name_s,
                "address" => (string) $places->direccion,
                "address_" => (string) $places->address,
                "city_name" => (string) $places->ciudad,
                "city_name_lupap" => (string) $places->ciudad,
                "description" => (string) $task->descripcion . "- " . $description,
                "position" => 0,
                "status" => (int) $places->estado_p,
                "latitude" => (float) $places->lat,
                "longitude" => (float) $places->long,
                "global_task_place_id" => (int) $places->id,
                "needs_photo_evidence" => false,
                "needs_signature_evidence" => false,
                "personal_name" => (string) $personal_name,
                "personal_phone" => (string) $personal_phone,
                "personal_document" => (string) $places->document,
                "payment_type" => (int) $places->paiment_type,
                "products_value" => (int) $places->products_value,
                "domicile_value" => (int) $places->domicile_value,
                "order_id" => (Double) $places->order_id,
                "products" => (array) $producPlacesT,
                "evidence" => (bool) $evidencs,
                "cash" => (int) ($places->valor_compra - $places->products_value),
                "evidence_msg" => (String) isset($places->TaskPlacesComplement->evidence_messaje) ? $places->TaskPlacesComplement->evidence_messaje : "",
                "verification_token" => (String) $DeliveryCon->verification_token($places->token, $places->type, $task->TblUsers->empresas_id, $task->getCiudadId()),
                "token_nota_credito" => (String) $DeliveryCon->verification_token_3($places->order_id, $places->type, $task->TblUsers->empresas_id),
                "change_task_status_code" => (string) isset($places->TaskPlacesComplement->status_code) ? $places->TaskPlacesComplement->status_code : null,
            );
            $cont++;
            $arraysPlaces_[] = $arraysPlacesvuelta;
        }
        ///////////
        if ($task->type_task_id == 4) {
            $arraysPlaces_[0]["token"] = (String) $arraysPlaces_[0]["token"] . " - Orden ID : " . $arraysPlaces_[0]["order_id"] . " - CC : " . $arraysPlaces_[1]["personal_document"];
            $arraysPlaces_[1]["token"] = (String) $arraysPlaces_[0]["token"];
            $arraysPlaces_[0]["personal_name"] = (String) $arraysPlaces_[1]["personal_name"];
            $arraysPlaces_[0]["personal_phone"] = (String) $arraysPlaces_[1]["personal_phone"];
            $arraysPlaces_[0]["payment_type"] = (int) $arraysPlaces_[1]["payment_type"];
            $arraysPlaces_[0]["products_value"] = (int) $arraysPlaces_[1]["products_value"];
            $arraysPlaces_[0]["description"] = (String) $task->getDescripcion() . "\n" . $arraysPlaces_[0]["description"] . " \n" . $arraysPlaces_[1]["description"];
            $arraysPlaces_[1]["description"] = $arraysPlaces_[0]["description"];
            if ($statustoken == 1) {
                $arraysPlaces_[0]["verification_token"] = null;
            }
        }



        ///PAGO DE SERVICIOS
        $total = ($task->valor_total - $task->recargo_seguro) + $task->valor_descuento;

        $base = new BaseController();
        $setPaymentRules = $base->getPaymentRules($task->ciudad_id, $task->type_task_id, $total, $task->id_company, 1);

        $bonus = 0;
        if (isset($task->BonusRelaunch->total_bonus)) {
            $bonus = (int) $task->BonusRelaunch->total_bonus;
        }

        $commission_ = $total * ($setPaymentRules->percentage_e / 100);
        $profit_before_bonus = ($total - $commission_);
        $gain = $profit_before_bonus + $bonus;

        if ($task->estado_pago == 1) {
            $value_receivables = $task->valor_total;
        } else {
            $value_receivables = 0;
        }
        $evidence_video_url = "";
        $shop_pay = $value_receivables;
        if ($task->TblUsers->empresas_id > 0) {
            $name_company = $task->TblUsers->empresas->nombre_empresa;
            $phone_company = $task->TblUsers->empresas->telefono;
            if (isset($task->Empresas->EmpresasParam) && !empty($task->Empresas->EmpresasParam->evidence_video_url)) {
                $evidence_video_url = $task->Empresas->EmpresasParam->evidence_video_url;
            }
        } else {
            $name_company = NULL;
            $phone_company = NULL;
        }
        //IpRethinkDB
        $datetime = new DateTime($task->fecha_inicio . " " . $task->hora_inicio);
        $datestatus = new DateTime(date("Y-m-d H:i:s"));
        $end_users_name = null;
        $end_users_phone = null;

        if ($task->type_task_id == 4) {
            $end_users = ClientesTerceros::findFirst(array("conditions" => "task_id = :id_task:  ", "bind" => array('id_task' => $task_id)));
            $end_users_name = $end_users->nombre;
            $end_users_phone = $end_users->telefono;
            $value_receivables = $task->getValorDeclarado();
            $shop_pay = $task->getValorDeclarado();
            if ($task->tipo_pago_terceros > 1 && $task->getTypeTaskCargaId() != 4) {
                $value_receivables = 0;
                $shop_pay = 0;
            } elseif ($task->getEstadoPago() == 1 && $task->getTypeTaskCargaId() == 5) {
                $value_receivables = $value_receivables + $task->getTotalOtro();
                $shop_pay = $task->getValorDeclarado();
            } elseif ($task->getEstadoPago() == 1) {
                $value_receivables = $value_receivables + $task->getValorTotal();
                $shop_pay = $task->getValorDeclarado();
            }
        } elseif ($task->type_task_id == 7) {
            $value_receivables = $task->getTotalOtro();
        }

        $city_id = $task->getCiudadId();
        if ($city_id == 6 || $city_id == 7) {
            $city_id = 1;
        }

        $datapoint = $this->SeachPointRethinDB($task);

        $base = new BaseController();
        $arrayRethin = array(
          //  "id" => (int) $task->id,
            "os" => $task->os,
            "cc" => $task->cc,
            "evidence_video_url" => $evidence_video_url,
            "global_cash" => $global_cash,
            "declared_value" => (int) $task->getValorDeclarado(),
            "is_new_api" => true,
            "is_round_trip" => (bool) $task->ida_vuelta,
            "first_address" => $arraysPlaces_[0]["address_"],
            "first_latitude" => (float) $arraysPlaces_[0]["latitude"],
            "first_longitude" => (float) $arraysPlaces_[0]["longitude"],
            "global_task_id" => (int) $task->id,
            "task_type_id" => (int) $task->type_task_id,
            "commission" => (int) $commission_,
            "insurance" => (int) $task->recargo_seguro,
            "user_payment_type" => (int) $task->tipo_pago_terceros,
            "profit" => (int) $gain,
            "bonus" => (int) $bonus,
            "profit_before_bonus" => (int) $profit_before_bonus,
            "money_to_collect" => (int) $value_receivables,
            "shop_pay" => (int) $shop_pay,
            "distance" => (int) $task->distancia,
            "price" => (int) $task->valor_total,
            "global_courier_id" => (int) $task->id_resource,
            "resource_first_name" => ((int) $task->id_resource > 0) ? $task->Recursos->nombres : "",
            "resource_last_name" => ((int) $task->id_resource > 0) ? $task->Recursos->apellidos : "",
            "city_name" => $task->Ciudad->nombre,
            "tracking_number" => (string) (isset($task->TaskDetail->tracking_number) ? $task->TaskDetail->tracking_number : null), //numero de guia Deprisa
            "place_number" => (string) (isset($task->TaskDetail->place_number) ? $task->TaskDetail->place_number : null), //Tipo de parada Deprisa ,1 recogida y 2 entrega
            //"status_name" => $task->TypeTaskStatus->nombre,
            "status_name" => (string) $this->status_description((int) $task->getEstado(), $place_number, $type_place),
            "status_description" => (string) $this->status_description((int) $task->getEstado(), $place_number, $type_place),
            "round" => (int) 1,
            "last_address" => $last_address,
            "start_date" => r\ISO8601($datetime->format(DateTime::ISO8601)),
            "city_id" => (int) $city_id,
            "uuid" => $task->uuid,
            "status_id" => (int) $task->estado,
            "payment_type_id" => (int) $task->estado_pago,
            "complementary_price" => (int) $task->total_otro,
            "company_name" => $name_company,
            "company_phone" => $phone_company,
            "global_company_id" => (int) $task->TblUsers->empresas_id,
            "customer_name" => $task->TblUsers->TblProfiles[0]->nombre,
            "customer_email" => $task->TblUsers->email,
            "customer_phone" => $task->TblUsers->TblProfiles[0]->telefono,
            "global_customer_id" => (int) $task->solicitante,
            "status_date" => r\ISO8601($datestatus->format(DateTime::ISO8601)),
            "end_user_name" => (String) $end_users_name,
            "end_user_phone" => (String) $end_users_phone,
            "segmentation" => (int) $task->getTipoSegmentacionId(),
            "equipment_array" => $base->SegmentationFeatures($task->getTipoSegmentacionId()),
            "end_user_email" => null,
            "task_place_changed" => (int) $task_place_changed,
            "task_places" => $arraysPlaces_,
            "availabilities" => (array) $resultzone,
            "point_name" => $datapoint["pointName"],
            "point_id_client" => $datapoint["id_point_client"],
            "point_id" => $datapoint["id_point"],
            'location' => r\point($arraysPlaces_[0]["latitude"], $arraysPlaces_[0]["longitude"])
        );

        $arrayRethin['user_experience'] = (int) $task->TblUsers->TblProfiles[0]->experience;
        if (!empty($task->id_company)) {
            $arrayRethin['user_experience'] = (int) $task->Empresas->experience;
        }

        //  $arrayRethin = array_map("utf8_encode", $arrayRethin );

        $results = $this->StatusTaskRethindb($task->id);
        if ($results) {
            $this->_UpdateTaskRethinkDb($task->id, $arrayRethin);
        } else {
            $this->CreateTaskRethindb($arrayRethin);
        }

        $this->updateSearch($task->id);
    }

    public function status_description($status_id, $num_place = null, $type_status = null) {
        $new_status = array(
            "1" => "Creado",
            "2" => "En espera de asignación",
            "3" => "Asignado",
            "4" => "parada",
            "5" => "finalizado",
            "6" => "Cancelado"
        );
        if ($status_id == 4) {
            if ($type_status == 1) {
                $result = "Llego a parada " . $num_place;
            } else if ($type_status == 2) {
                $result = "Salio a parada " . $num_place;
            } else {
                $result = "Parada " . $num_place;
            }
        } else {
            $result = $new_status[(int) $status_id];
        }
        return $result;
    }

    public function _sendPushCustomers($user_, $texto_, $task_id_, $task_lat_, $task_long_) {

        $url = 'https://api.parse.com/1/push';
        $appId = 'OEvkcD6jAJkRbCkhLk9yEfJ6nrRkLm9Lr8vtUHM1';

        $restKey = 'GTuz972zJKtIfBD50FA6qn15XkE8iVHqmRF52Tvr';

        $headers = array(
            "Content-Type: application/json",
            "X-Parse-Application-Id: " . $appId,
            "X-Parse-REST-API-Key: " . $restKey
        );
        $objectData = '{
            "where": {
                "userID": "' . $user_ . '"
            },
            "data": {
                "alert": "' . $texto_ . '",
                "badge":"Increment",
                "task_id":"' . $task_id_ . '",
                "lat":"' . $task_lat_ . '",
                "long":"' . $task_long_ . '"
            }
        }';
        $rest = curl_init();
        curl_setopt($rest, CURLOPT_URL, $url);
        curl_setopt($rest, CURLOPT_POST, 1);
        curl_setopt($rest, CURLOPT_POSTFIELDS, $objectData);
        curl_setopt($rest, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($rest, CURLOPT_RETURNTRANSFER, true);
        curl_exec($rest);
        curl_close($rest);
    }

    /**
     * Valida existencia de un usuario
     *
     * Valida si un usuario existe (o no) en la plataforma
     * 
     * @param string $field campo por el cual se va a buscar el usuario
     * @param string $value valor de la busqueda
     * @param exist Indica si se debe validar que exista o que NO exista el usuario
     *
     * @return integer Identificador del usuario o false en caso de no cumplir la condición
     */
    public function verifyUser($field, $value, $exist = false) {

        //Busco un usuario por el campo enviado
        $user = TblUsers::findFirst(
                        array(
                            "conditions" => $field . " = :field:",
                            "bind" => array('field' => $value)
                        )
        );

        //Si el usuario existe o no (Según el caso)
        if ($exist) {
            return empty($user) ? false : $user->id;
        } else {
            return empty($user) ? true : false;
        }
    }

    /**
     * Envio de correos electrónicos
     *
     * Envia un correo con la información enviada como parámetro
     *
     * @param email $email Correo del destinatario
     * @param integer $rule Identificador de la regla de la plataforma de envios de correo
     * @param String $content html o mesaje que se enviará en el correo
     */
    public function _sendMail($email, $rule, $content, $title = "Mensajeros Urbanos") {
        $this->mail->Subject = $title;
        $this->mail->Body = $content;
        $this->mail->addAddress($email, $email);
        $this->mail->send();
        $this->mail->ClearAddresses();
    }

    /**
     * Envio de correos electrónicos
     *
     * Envia un correo con la información enviada como parámetro
     *
     * @param email $email Correo del destinatario
     * @param integer $rule Identificador de la regla de la plataforma de envios de correo
     * @param String $content html o mesaje que se enviará en el correo
     */
    public function BlockingHistory($type, $time, $id_resource, $user_create, $locking_reason, $status, $description = null) {
        $BlockingHistory = new BlockingHistory();
        $BlockingHistory->blocking_type = $type;
        $BlockingHistory->creation_date = date("Y-m-d H:i:s");
        $BlockingHistory->blocking_time = $time;
        $BlockingHistory->id_resource = $id_resource;
        $BlockingHistory->user_create = $user_create;
        $BlockingHistory->locking_reason = $locking_reason;
        $BlockingHistory->status = $status;
        $BlockingHistory->description = $description;
        $BlockingHistory->save();
    }

    /**
     * Guardar UTM 
     *
     * Guarda los UTM  que llegan la crear el servicio.
     *
     * @param utm $utm Arreglo de datos UTM
     * 
     */
    public function UtmCreate($utms, $id_user, $task_id = null) {
        foreach ($utms as $utm) {
            $UtmTask = new UtmTask();
            $UtmTask->task_id = $task_id;
            $UtmTask->user_id = $id_user;
            $UtmTask->utm_campaign = $utm->utm_campaign;
            $UtmTask->utm_source = $utm->utm_source;
            $UtmTask->utm_medium = $utm->utm_medium;
            $UtmTask->utm_term = $utm->utm_term;
            $UtmTask->utm_content = $utm->utm_content;
            $UtmTask->utm_date_cache = $utm->utm_date_cache;
            $UtmTask->utm_origen_front = $utm->utm_origen_front;
            $UtmTask->save();
        }
    }

    public function AuthPlacetopay() {
        $auth = new stdClass();
        $auth->login = $this->params->userPlacetopay;
        $auth->seed = date('c');
        $auth->tranKey = sha1($auth->seed . $this->params->keyPlacetopay, false);

        return $auth;
    }

    public function distanciaLineal($point1_lat, $point1_long, $point2_lat, $point2_long) {
        $degrees = rad2deg(acos((sin(deg2rad((float)$point1_lat)) * sin(deg2rad((float)$point2_lat))) + (cos(deg2rad((float)$point1_lat)) * cos(deg2rad((float)$point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));
        $distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
        return round($distance, 3);
    }

    public function deleteTildes($cadena) {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        return str_replace($no_permitidas, $permitidas, $cadena);
    }

    /**
     * Envio de correos electrónicos
     *
     * Envia un correo con la información enviada como parámetro
     *
     * @param email $email Correo del destinatario
     * @param integer $rule Identificador de la regla de la plataforma de envios de correo
     * @param String $content html o mesaje que se enviará en el correo
     */
    public function sendMailGeneric($email, $rule, $content, $secret, $title = "Mensajeros Urbanos") {
        $this->mail->Subject = $title;
        $this->mail->Body = $content;
        $this->mail->addAddress($email, $email);
        $this->mail->send();
        $this->mail->ClearAddresses();
    }

    public function updateIntercomMessenger($userId, $updateUser = true) {

        $messenger = Recursos::findFirstByTblUsersId($userId);

        $equipment = "";
        foreach ($messenger->RecursoCaracteristica as $value) {
            if (empty($equipment)) {
                $equipment = $value->TypeCaracteristicaRecursos->nombre;
            } else {
                $equipment.= ', ' . $value->TypeCaracteristicaRecursos->nombre;
            }
        }

        //Actualización Intercom
        $arrayData = [];
        $arrayData['user_id'] = $messenger->TblUsers1->id;
        $arrayData['name'] = $messenger->nombre;

        if (!$updateUser) {
            $arrayData['created_at'] = strtotime(date('Y-m-d H:i:s'));
        }

        $arrayData['phone'] = $messenger->telefono;
        $arrayData['email'] = $messenger->TblUsers1->email;

        $arrayData['custom_attributes']['tipo usuario'] = "Mensajero";
        $arrayData['custom_attributes']['disponible'] = $messenger->status == 1 ? 'SI' : 'NO';
        $arrayData['custom_attributes']['ciudad'] = $messenger->Ciudad->nombre;
        $arrayData['custom_attributes']['equipamiento'] = $equipment;
        $arrayData['custom_attributes']['activo para mensajeria'] = $messenger->corporativo == 1 ? 'Activo' : 'Inactivo';
        $arrayData['custom_attributes']['activo para domicilios'] = $messenger->domiciliario == 1 ? 'Activo' : 'Inactivo';
        $arrayData['custom_attributes']['tipo vehiculo'] = $messenger->TypeRecurso->nombre;
        $arrayData['custom_attributes']['vip'] = $messenger->vip == 1 ? 'VIP Mensajería' : ($messenger->vip == 2 ? 'VIP Domicilios' : ($messenger->vip == 3 ? 'VIP Total' : 'NO VIP'));
        $arrayData['custom_attributes']['seguridad social'] = $messenger->ss == 1 ? 'SI' : 'NO';
        $arrayData['custom_attributes']['celular'] = $messenger->celular;
        $arrayData['custom_attributes']['celular 2'] = $messenger->celular_2;
        $arrayData['custom_attributes']['celular daviplata'] = $messenger->celular_daviplata;

        $arrayData['avatar']['type'] = 'avatar';
        $arrayData['avatar']['image_url'] = $this->params['urlResources'] . '/images/recursos/foto' . $messenger->id . '.jpg';

        $provider = RequestCli::getProvider();
        $provider->setBaseUri($this->params['url_intercom']);
        $provider->header->set('Accept', 'application/json');
        $provider->header->set('Content-Type', 'application/json');
        $provider->header->set('Authorization', 'Bearer ' . $this->params['token_intercom']);

        $return = $provider->post('', json_encode($arrayData))->body;
        return json_decode($return, true);
    }

    function NotificationCompanyStatus($business_id) {
        return Task::findFirst(array(
                    "conditions" => "id_company = :company_id:  ", "order" => "id  DESC",
                    "columns" => "id, date_created,uuid,name_company", "bind" => array('company_id' => $business_id)
        ));
    }

    /**
     * Alamceno registro en el historial de disponibilidad
     *
     * Cada vez que existe una acción sobre un servicio de disponibilidad se agrega un registro para tener trazabilidad
     * Nota: No se valida si se guarda o no, este es solo un historial que en caso de fallar no debe devolcer toda la transacción
     *
     * @param integer $id Identificador de la disponibilidad
     * @param String $type Tipo de registro (Ej. create, update, cancel, etc)
     * @param integer $userCreate Usuario que realiza la operación
     * @param String $content Json con el contenido variable del registro de log
     */
    public function createHistoryAvailability($id, $type, $userCreate, $content) {
        $history = new AvailabilityHistory();
        $history->availability_id = $id;
        $history->json_content = $content;
        $history->type = $type;
        $history->user_create = $userCreate;
        $history->save();
    }

    /**
     * Alamceno registro en el historial de roles
     *
     * Cada vez que existe una acción sobre un rol almaceno el historial
     * Nota: No se valida si se guarda o no, este es solo un historial que en caso de fallar no debe devolcer toda la transacción
     *
     * @param integer $id Identificador del rol
     * @param String $type Tipo de registro (Ej. create, update, cancel, etc)
     * @param integer $userCreate Usuario que realiza la operación
     * @param String $content Json con el contenido variable del registro de log
     */
    public function createHistoryRol($id, $type, $userCreate, $content) {
        $history = new HistoryRoles();
        $history->role_id = $id;
        $history->json_content = $content;
        $history->type = $type;
        $history->user_create = $userCreate;
        $history->save();
    }

    /**
     * Alamceno registro en el historial de empresas
     *
     * Cada vez que existe una acción sobre une empresa
     * Nota: No se valida si se guarda o no, este es solo un historial que en caso de fallar no debe devolcer toda la transacción
     *
     * @param integer $id Identificador de la empresa
     * @param String $type Tipo de registro (Ej. create, update, cancel, etc)
     * @param integer $userCreate Usuario que realiza la operación
     * @param String $content Json con el contenido variable del registro de log
     */
    public function createHistoryComapny($id, $type, $userCreate, $content) {
        $history = new HistoryCompany();
        $history->company_id = $id;
        $history->json_content = $content;
        $history->type = $type;
        $history->user_create = $userCreate;
        $history->save();
    }

    /**
     * Alamceno registro en el historial de usuarios
     *
     * Cada vez que existe una acción sobre un usuario almaceno el historial
     * Nota: No se valida si se guarda o no, este es solo un historial que en caso de fallar no debe devolcer toda la transacción
     *
     * @param integer $id Identificador del usuario
     * @param String $type Tipo de registro (Ej. create, update, cancel, etc)
     * @param integer $userCreate Usuario que realiza la operación
     * @param String $content Json con el contenido variable del registro de log
     */
    public function createHistoryUser($id, $type, $userCreate, $content) {

        $history = new HistoryUser();
        $history->user_id = $id;
        $history->json_content = $content;
        $history->type = $type;
        $history->user_create = $userCreate;
        $history->save();
    }

    /**
     * Almacena el log de modificaciones de un mensajero
     * Nota: No se valida si se guarda o no, este es solo un historial que en caso de fallar no debe devolcer toda la transacción
     *
     * @param integer $userCreate Usuario que realiza la operación
     * @param integer $userId Identificador del mensajero
     * @param String $content Json con el contenido variable del registro de log
     * @param String $type Tipo de registro (Ej. create, update, cancel, etc)
     */
    public function saveHistoryMessenger($userCreate, $userId, $content, $type) {

        $history = new HistoryMessenger();
        $history->user_id = $userId;
        $history->json_content = $content;
        $history->type = $type;
        $history->user_create = $userCreate;
        $history->save();
    }

    public function ConnectRethinDb2($ips) {
        $ips = json_encode($ips);
        $ips = json_decode($ips, true);
        if (!empty($ips)) {
            $rand = array_rand((array) $ips, 1);
            try {
                $IpRethinkDB = $ips[$rand];
                return r\connect($IpRethinkDB, null, null, null, 3);
            } catch (Exception $ex) {
                unset($ips[$rand]);
                return $this->ConnectRethinDb($ips, $rand);
            }
        } else {
            echo "error";
        }

        return $this->ConnectRethinDb($ips, $rand);
    }

    public function ConnectRethinDb($ips, $message = "", $type = 0, $status = false) {
        $ips = json_encode($ips);
        $ips = json_decode($ips, true);
        if (!empty($ips)) {
            $rand = array_rand((array) $ips, 1);
            try {
                $IpRethinkDB = $ips[$rand];
                return r\connect($IpRethinkDB, null, null, null, 2);
            } catch (Exception $ex) {
                unset($ips[$rand]);
                return $this->ConnectRethinDb($ips, $ex->getMessage(), $type, $status);
            }
        } else {
            if ($status) {
                foreach ($this->params->sms_rethinkdb_error as $phone) {
                    $this->_SMSEnviar($phone, "RethinkDB-MU : ERROR " . $message . "--" . date("Y-m-d H:i:s"));
                }
            }
            throw new UnexpectedValueException($message);
        }
//        return $conn = r\connect($this->params->IpRethinkDB);
    }

    /*
     * Actualiza la información de un servicio en el buscador (elastic search)
     */

    public function updateSearch($taskId) {
        $task = Task::query();
        $task->columns([
            'Task.id',
            'Task.uuid',
            'start_date' => 'CONCAT(Task.fecha_inicio," ", Task.hora_inicio)',
            'origin_address' => 'p.direccion',
            'city_id' => 'Task.ciudad_id',
            'city_name' => 'c.nombre',
            'Task.type_task_id',
            'type_task_name' => 't.nombre',
            'client_type' => 'u.user_type',
            'client_id' => 'Task.solicitante',
            'client_name' => 'pe.nombre',
            'company_id' => 'e.id',
            'company_name' => 'e.nombre_empresa',
            'order_id' => 'p.order_id',
            'order_id_2' => 'en.order_id',
            'final_client_document' => 'en.document',
            'final_client_name' => 'en.client_name',
            'final_client_phone' => 'en.client_phone',
            'task_status_id' => 'Task.estado',
            'task_status_name' => 's.nombre',
            'start_date_unix' => 'UNIX_TIMESTAMP(TIMESTAMP(Task.fecha_inicio,Task.hora_inicio))'
        ]);
        $task->where("Task.id = :task_id:");
        $task->join("TaskPlaces", "p.task_id = Task.id and p.tipo_task_places = 1", "p", "LEFT");
        $task->join("TaskPlaces", "en.task_id = Task.id and en.tipo_task_places = 2", "en", "LEFT");
        $task->join("Ciudad", "c.id = Task.ciudad_id", "c", "LEFT");
        $task->join("TypeTask", "t.id = Task.type_task_id", "t", "INNER");
        $task->join("TblUsers", "u.id = Task.solicitante", "u", "INNER");
        $task->join("TblProfiles", "pe.user_id = u.id", "pe", "INNER");
        $task->join("TypeTaskStatus", "s.id = Task.estado", "s", "INNER");
        $task->join("Empresas", "e.id = u.empresas_id", "e", "LEFT");
        $parameters = ["task_id" => $taskId];
        $task->bind($parameters);

        $response = $task->execute()->toArray();
        //$this->writeLog("[QUERY ".$taskId."] ".json_encode($response), "/logs/log_elastic.txt");

        if (!empty($response)) {
            if (empty($response[0]['order_id'])) {
                $response[0]['order_id'] = $response[0]['order_id_2'];
            }
            unset($response[0]['order_id_2']);

            $provider = RequestCli::getProvider();
            $provider->setBaseUri($this->params['url_elastic'] . '/task/' . $taskId);
            $response = $provider->post('', json_encode($response[0]));
            //$this->writeLog(json_encode($response), "/logs/log_elastic.txt");
        }
    }

    /*
     * Actualiza la información de un mensajero en el buscador (elastic search)
     */

    public function updateResourceSearch($resourceId) {
        $resource = Recursos::query();

        $resource->columns([
            'Recursos.tbl_users_id as id',
            'Recursos.id as resource_id',
            'Recursos.nombres as name',
            'Recursos.apellidos as lastname',
            'u.username',
            'Recursos.did as document',
            'Recursos.celular as cellphone',
            'Recursos.celular_daviplata as cellphone_daviplata',
            'u.email',
            'u.status as status_id',
            'IF(u.status = 0, "Bloqueado", 
                IF(u.status = 1, "Activo",
                    IF(u.status = 2, "Pre-registrado",
                        IF(u.status = 3, "Descartado", "No registra")
            ))) as status_name'
        ]);

        $resource->where("Recursos.tbl_users_id = :resource_id:");
        $resource->join("TblUsers", "u.id = Recursos.tbl_users_id", "u", "INNER");
        $parameters = ["resource_id" => $resourceId];
        $resource->bind($parameters);

        $response = $resource->execute()->toArray();

        if (!empty($response)) {
            $response[0]['url_photo'] = $this->params['urlResources'] . '/images/recursos/foto' . $resourceId . '.jpg';

            $provider = RequestCli::getProvider();
            $provider->setBaseUri($this->params['url_elastic'] . '/resource/' . $resourceId);
            $response = $provider->post('', json_encode($response[0]));
        }
    }

    /*
     * Actualiza la información de una empresa en el buscador (elastic search)
     */

    public function updateCompanySearch($companyId) {
        $company = Empresas::query();

        $company->columns([
            'Empresas.id',
            'Empresas.did as nit',
            'Empresas.nombre_empresa as name',
            'Empresas.email_contacto as email',
            'Empresas.telefono as phone',
            'Empresas.celular as cellphone',
            'Empresas.type_task_pago_id as payment_type_id',
            'p.nombre as payment_type_name',
            'Empresas.active as status_id',
            'IF(Empresas.active = 0, "Inactivo", "Activo") as status_name'
        ]);

        $company->where("Empresas.id = :company_id:");
        $company->join("TypeTaskPago", "p.id = Empresas.type_task_pago_id", "p", "LEFT");
        $parameters = ["company_id" => $companyId];
        $company->bind($parameters);

        $response = $company->execute()->toArray();

        if (!empty($response)) {
            $provider = RequestCli::getProvider();
            $provider->setBaseUri($this->params['url_elastic'] . '/company/' . $companyId);
            $response = $provider->post('', json_encode($response[0]));
        }
    }

    /*
     * Actualiza la información de un usuario en elastic
     */

    public function updateUserSearch($userId) {
        $query = TblProfiles::query();

        $query->columns([
            'TblProfiles.user_id as id',
            'TblProfiles.did as cc',
            'u.username as username',
            'TblProfiles.nombre as name',
            'TblProfiles.telefono_fijo as phone',
            'TblProfiles.telefono as cellphone',
            'u.email as email',
            'u.user_type as user_type_id',
            'IF(u.user_type = 3, "Persona","Empresa") as user_type_name',
            'u.type_task_pago_id as payment_type_id',
            'tp.nombre as payment_type_name',
            'u.status as status_id',
            'IF(u.status = 1, "Activo","Inactivo") as status_name',
            'u.create_at as datecreate',
            'UNIX_TIMESTAMP(u.create_at) as datecreate',
        ]);

        $query->where("TblProfiles.user_id = :user_id:");
        $query->join("TblUsers", "u.id = TblProfiles.user_id", "u", "INNER");
        $query->join("TypeTaskPago", "tp.id = u.type_task_pago_id", "tp", "LEFT");
        $parameters = ["user_id" => $userId];
        $query->bind($parameters);

        $response = $query->execute()->toArray();

        if (!empty($response)) {
            $provider = RequestCli::getProvider();
            $provider->setBaseUri($this->params['url_elastic'] . '/user/' . $userId);
            $response = $provider->post('', json_encode($response[0]));
        }
    }

    /*
     * Actualiza el estado de pedido en SALVATORS.
     */

    public function ChangeStatusSalvators($uuid) {
        $params = array(
            "UUID" => (string) $uuid,
            "Hora" => (string) date("H:i:s")
        );
        $client = new SoapClient("http://190.85.82.194:5981/MUrbanos.asmx?wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
        $client->__soapCall('ActualizaHoraEntrega', [$params]);
    }

    public function PredictionsZone() {
        echo "date init  " . date("Y-m-d H:i:s");
//  set_time_limit(0);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->params->demand_url);
        curl_setopt($ch, CURLOPT_USERPWD, $this->params->demand_user . ":" . $this->params->demand_pwd);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //   curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        //  curl_setopt($ch, CURLOPT_TIMEOUT, 0);
        $curl_errno = curl_errno($ch);
        $json = curl_exec($ch);
        print_r($json);
        echo "date curl  " . date("Y-m-d H:i:s");
        $json1 = json_decode($json, false);
        $data = DemandZone::find();
        $data->delete();
        foreach ($json1->prediccion as $data) {
            $DemandZone = new DemandZone();
            $DemandZone->demanda = $data->demanda;
            $DemandZone->hour = $data->hora;
            $DemandZone->courier = $data->mensajeros;
            $DemandZone->zone = $data->zona;
            $DemandZone->save();
        }
        echo "date End  " . date("Y-m-d H:i:s");
        curl_close($ch);
    }

    public function insuranceDelivery($declared_value) {
        $declared_price = 0;
        if (date("Y-m-d") >= $this->params->new_declared_percentage_date) {
            if ($declared_value >= 0 && $declared_value <= 500000) {
                $declared_price = $declared_value * $this->params->declared_percentage_delivery_array[0];
            } elseif ($declared_value >= 500001 && $declared_value <= 2000000) {
                $declared_price = $declared_value * $this->params->declared_percentage_delivery_array[1];
            }
        }
        return (int) $declared_price;
    }

    public function CallSend($movil, $message) {
        $username = $this->params->user_infobit;
        $password = $this->params->pwd_infobit;
        $headers = array(
            "Content-Type: application/json",
        );
        $datos = array(
            "from" => "6868",
            "to" => $movil,
            "text" => $message,
            "language" => "es"
        );
        $messages = array(
            "messages" => $datos
        );
        $objectData = json_encode($messages);
        print_r($objectData);

        $rest = curl_init();
        curl_setopt($rest, CURLOPT_URL, "https://api.infobip.com/tts/3/multi");
        curl_setopt($rest, CURLOPT_USERPWD, $username . ":" . $password);
        curl_setopt($rest, CURLOPT_POST, 1);
        curl_setopt($rest, CURLOPT_POSTFIELDS, $objectData);
        curl_setopt($rest, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($rest, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($rest);
        curl_close($rest);
        $ndatas = json_decode($result, false);
        foreach ($ndatas->messages as $ndata) {
            $Logsms = new LogCall();
            $Logsms->phone = $ndata->to;
            $Logsms->message = $message;
            $Logsms->result = json_encode($ndata);
            $Logsms->save();
        }
    }

    /* ESCRIBE UN LOG EN UN ARCHIVO ESPECIFICADO */

    public function writeLog($cadena, $url) {
        //$arch = fopen(realpath( '.' )."/logs/log_oauth.txt", "a+"); 
        $arch = fopen(realpath('.') . $url, "a+");
        fwrite($arch, "[" . date("Y-m-d H:i:s") . "] " . $cadena . "\n");
        fclose($arch);
    }

    //Envio de correos si un servicio pasa de x distancia (Alpina)
    public function EmailDistance($task, $emails) {

        $tpData = $task->TaskPlaces->toArray();
        $title = "Servicio de Km alto: pedido # " . $tpData[0]["order_id"];

        $template2 = "<h3>Servicio de Km alto </h3>";
        $template2.="<h3>id pedido " . $tpData[0]["order_id"] . "</h3>";
        $template2.="<h3>uuid MU " . $task->uuid . "</h3>";
        $template2.="<h3>Nombre cliente " . $tpData[1]["client_name"] . "</h3>";
        $template2.="<h3>Celular cliente " . $tpData[1]["client_phone"] . "</h3>";
        $template2.="<h3>Direccion de origen " . $tpData[0]["direccion"] . "</h3>";
        $template2.="<h3>Direccion de destino " . $tpData[1]["direccion"] . "</h3>";
        $Base = new ControllerBase();
        foreach ($emails as $email) {
            $Base->_sendMail($email, 502, $template2, $title);
        }
    }

    public function JsonTaskNew($task_id, $task, $status_type = 1) {
        $shop_pay = 0;
        $place_number = null;
        $type_place = null;
        $DeliveryCon = new DeliveryController();
        $resultzone = array();
        $evidence_video_url = null;
        if ($task->type_task_id == 4) {
            $cronbase = new CrontController();
            $resultzone = $cronbase->SearchAvailability($task->TaskPlaces[0]->OGR_FID, $task->TaskPlaces[0]->store_id, $task->id, $status_type);
        }
        if ($task->TblUsers->empresas_id > 0) {
            $name_company = $task->TblUsers->Empresas->nombre_empresa;
            $phone_company = $task->TblUsers->Empresas->telefono;
            if (isset($task->Empresas->EmpresasParam) && !empty($task->Empresas->EmpresasParam->evidence_video_url)) {
                $evidence_video_url = $task->Empresas->EmpresasParam->evidence_video_url;
            }
        } else {
            $name_company = NULL;
            $phone_company = NULL;
        }
        $arraysPlaces_ = array();
        $cont = 0;
        $task_place_changed = NULL;
        $last_address = NULL;
        $statustoken = 0;
        $global_cash = 0;

        foreach ($task->taskPlaces as $places) {
            if ($task->type_task_id == 4) {
                foreach ($places->Products as $products_) {
                    if ($products_->sku == $this->params->skutoken) {
                        $statustoken = 1;
                    }
                }
            }
            if ($places->estado_p > 0) {
                $task_place_changed = (int) $places->id;
                $place_number = $places->tipo_task_places;
                $type_place = $places->estado_p;
            }
            if ($cont == 1) {
                $last_address = $places->address;
            }
            if ($cont == 0) {
                $description = $task->descripcion . "\n -" . $places->descripcion;
            } else {
                $description = $places->descripcion;
            }
            if ($task->type_task_id == 4) {
                $producPlacesT = $DeliveryCon->productPlaces($cont, $task->getId(), $places->store_id);
            } else {
                $producPlacesT = array();
            }

            if ($places->type == 0) {
                $name_s = $name_company;
            } else {
                $name_s = "Entregando";
            }
            if ($places->type == 2) {
                $placestype = 0;
            } else {
                $placestype = $places->type;
            }
            $global_cash = $global_cash + ($places->valor_compra - $places->products_value);
            $personal_name = $places->client_name;
            $personal_phone = $places->client_phone;
            $evidencs = isset($places->TaskPlacesComplement->evidence) ? $places->TaskPlacesComplement->evidence : 0;
            $arraysPlacesvuelta = array(
                "token" => (String) $places->token,
                "type" => (int) $placestype,
                "address_name" => $name_s,
                "address" => (string) $places->direccion,
                "address_" => (string) $places->address,
                "city_name" => (string) $places->ciudad,
                "city_name_lupap" => (string) $places->ciudad,
                "description" => (string) $task->descripcion . "- " . $description,
                "position" => 0,
                "status" => (int) $places->estado_p,
                "latitude" => (float) $places->lat,
                "longitude" => (float) $places->long,
                "global_task_place_id" => (int) $places->id,
                "needs_photo_evidence" => false,
                "needs_signature_evidence" => false,
                "personal_name" => (string) $personal_name,
                "personal_phone" => (string) $personal_phone,
                "personal_document" => (string) $places->document,
                "payment_type" => (int) $places->paiment_type,
                "products_value" => (int) $places->products_value,
                "domicile_value" => (int) $places->domicile_value,
                "order_id" => (Double) $places->order_id,
                "products" => (array) $producPlacesT,
                "evidence" => (bool) $evidencs,
                "cash" => (int) ($places->valor_compra - $places->products_value),
                "evidence_msg" => (String) isset($places->TaskPlacesComplement->evidence_messaje) ? $places->TaskPlacesComplement->evidence_messaje : "",
                "verification_token" => (String) $DeliveryCon->verification_token($places->token, $places->type, $task->TblUsers->empresas_id, $task->getCiudadId()),
                "token_nota_credito" => (String) $DeliveryCon->verification_token_3($places->order_id, $places->type, $task->TblUsers->empresas_id),
                "change_task_status_code" => (string) isset($places->TaskPlacesComplement->status_code) ? $places->TaskPlacesComplement->status_code : null,
            );
            $cont++;
            $arraysPlaces_[] = $arraysPlacesvuelta;
        }

        ///////////
        if ($task->type_task_id == 4) {
            $arraysPlaces_[0]["token"] = (String) $arraysPlaces_[0]["token"] . " - Orden ID : " . $arraysPlaces_[0]["order_id"] . " - CC : " . $arraysPlaces_[1]["personal_document"];
            $arraysPlaces_[1]["token"] = (String) $arraysPlaces_[0]["token"];
            $arraysPlaces_[0]["personal_name"] = (String) $arraysPlaces_[1]["personal_name"];
            $arraysPlaces_[0]["personal_phone"] = (String) $arraysPlaces_[1]["personal_phone"];
            $arraysPlaces_[0]["payment_type"] = (int) $arraysPlaces_[1]["payment_type"];
            $arraysPlaces_[0]["products_value"] = (int) $arraysPlaces_[1]["products_value"];
            $arraysPlaces_[0]["description"] = (String) $task->getDescripcion() . "\n" . $arraysPlaces_[0]["description"] . " \n" . $arraysPlaces_[1]["description"];
            $arraysPlaces_[1]["description"] = $arraysPlaces_[0]["description"];
            if ($statustoken == 1) {
                $arraysPlaces_[0]["verification_token"] = null;
            }
        }
        ///PAGO DE SERVICIOS
        $total = ($task->valor_total - $task->recargo_seguro) + $task->valor_descuento;
        $base = new BaseController();
        $setPaymentRules = $base->getPaymentRules($task->ciudad_id, $task->type_task_id, $total, $task->id_company, 1);
        $bonus = 0;
        if (isset($task->BonusRelaunch->total_bonus)) {
            $bonus = (int) $task->BonusRelaunch->total_bonus;
        }

        $commission_ = $total * ($setPaymentRules->percentage_e / 100);
        $profit_before_bonus = ($total - $commission_);
        $gain = $profit_before_bonus + $bonus;

        if ($task->estado_pago == 1) {
            $value_receivables = $task->valor_total;
        } else {
            $value_receivables = 0;
        }
        $shop_pay = $value_receivables;
        if ($task->TblUsers->empresas_id > 0) {
            $name_company = $task->TblUsers->empresas->nombre_empresa;
            $phone_company = $task->TblUsers->empresas->telefono;
        } else {
            $name_company = NULL;
            $phone_company = NULL;
        }
        //IpRethinkDB
        $datetime = new DateTime($task->fecha_inicio . " " . $task->hora_inicio);
        $datestatus = new DateTime(date("Y-m-d H:i:s"));
        $end_users_name = null;
        $end_users_phone = null;

        if ($task->type_task_id == 4) {
            $end_users = ClientesTerceros::findFirst(array("conditions" => "task_id = :id_task:  ", "bind" => array('id_task' => $task_id)));
            $end_users_name = $end_users->nombre;
            $end_users_phone = $end_users->telefono;
            $value_receivables = $task->getValorDeclarado();
            $shop_pay = $task->getValorDeclarado();
            if ($task->tipo_pago_terceros > 1 && $task->getTypeTaskCargaId() != 4) {
                $value_receivables = 0;
                $shop_pay = 0;
            } elseif ($task->getEstadoPago() == 1 && $task->getTypeTaskCargaId() == 5) {
                $value_receivables = $value_receivables + $task->getTotalOtro();
                $shop_pay = $task->getValorDeclarado();
            } elseif ($task->getEstadoPago() == 1) {
                $value_receivables = $value_receivables + $task->getValorTotal();
                $shop_pay = $task->getValorDeclarado();
            }
        } elseif ($task->type_task_id == 7) {
            $value_receivables = $task->getTotalOtro();
        }

        $city_id = $task->getCiudadId();
        if ($city_id == 6 || $city_id == 7) {
            $city_id = 1;
        }
        $datapoint = $this->SeachPointRethinDB($task);
        $base = new BaseController();
        $arrayRethin = array(
            //"id" => (int) $task->id,
            "os" => $task->os,
            "cc" => $task->cc,
            "evidence_video_url" => $evidence_video_url,
            "global_cash" => $global_cash,
            "declared_value" => (int) $task->getValorDeclarado(),
            "is_new_api" => true,
            "is_round_trip" => (bool) $task->ida_vuelta,
            "first_address" => $arraysPlaces_[0]["address_"],
            "first_latitude" => (float) $arraysPlaces_[0]["latitude"],
            "first_longitude" => (float) $arraysPlaces_[0]["longitude"],
            "global_task_id" => (int) $task->id,
            "task_type_id" => (int) $task->type_task_id,
            "commission" => (int) $commission_,
            "insurance" => (int) $task->recargo_seguro,
            "user_payment_type" => (int) $task->tipo_pago_terceros,
            "profit" => (int) $gain,
            "bonus" => (int) $bonus,
            "profit_before_bonus" => (int) $profit_before_bonus,
            "money_to_collect" => (int) $value_receivables,
            "shop_pay" => (int) $shop_pay,
            "distance" => (int) $task->distancia,
            "price" => (int) $task->valor_total,
            "global_courier_id" => (int) $task->id_resource,
            "resource_first_name" => ((int) $task->id_resource > 0) ? $task->Recursos->nombres : "",
            "resource_last_name" => ((int) $task->id_resource > 0) ? $task->Recursos->apellidos : "",
            "city_name" => $task->Ciudad->nombre,
            "tracking_number" => (string) (isset($task->TaskDetail->tracking_number) ? $task->TaskDetail->tracking_number : null), //numero de guia Deprisa
            "place_number" => (string) (isset($task->TaskDetail->place_number) ? $task->TaskDetail->place_number : null), //Tipo de parada Deprisa ,1 recogida y 2 entrega
            //"status_name" => $task->TypeTaskStatus->nombre,
            "status_name" => (string) $this->status_description((int) $task->getEstado(), $place_number, $type_place),
            "status_description" => (string) $this->status_description((int) $task->getEstado(), $place_number, $type_place),
            "round" => (int) 1,
            "last_address" => $last_address,
            "start_date" => r\ISO8601($datetime->format(DateTime::ISO8601)),
            "city_id" => (int) $city_id,
            "uuid" => $task->uuid,
            "status_id" => (int) $task->estado,
            "payment_type_id" => (int) $task->estado_pago,
            "complementary_price" => (int) $task->total_otro,
            "company_name" => $name_company,
            "company_phone" => $phone_company,
            "global_company_id" => (int) $task->TblUsers->empresas_id,
            "customer_name" => $task->TblUsers->TblProfiles[0]->nombre,
            "customer_email" => $task->TblUsers->email,
            "customer_phone" => $task->TblUsers->TblProfiles[0]->telefono,
            "global_customer_id" => (int) $task->solicitante,
            "status_date" => r\ISO8601($datestatus->format(DateTime::ISO8601)),
            "end_user_name" => (String) $end_users_name,
            "end_user_phone" => (String) $end_users_phone,
            "segmentation" => (int) $task->getTipoSegmentacionId(),
            "equipment_array" => $base->SegmentationFeatures($task->getTipoSegmentacionId()),
            "end_user_email" => null,
            "task_place_changed" => (int) $task_place_changed,
            "task_places" => $arraysPlaces_,
            "availabilities" => (array) $resultzone,
//            "point_name" => $pointName,
            "parking_surcharge" => (int) $task->parking_surcharge,
            "point_name" => $datapoint["pointName"],
            "point_id_client" => $datapoint["id_point_client"],
            "point_id" => $datapoint["id_point"],
            'location' => r\point($arraysPlaces_[0]["latitude"], $arraysPlaces_[0]["longitude"])
        );

        $arrayRethin['user_experience'] = (int) $task->TblUsers->TblProfiles[0]->experience;
        if (!empty($task->id_company)) {
            $arrayRethin['user_experience'] = (int) $task->Empresas->experience;
        }
        return $arrayRethin;
    }

    public function NewrethindUpdateTask($task) {

        $arrayRethin = $this->JsonTaskNew($task->id, $task);
        $results = $this->StatusTaskRethindb($task->id);
        if ($results) {
            $this->_UpdateTaskRethinkDb($task->id, $arrayRethin);
        } else {
            $this->CreateTaskRethindb($arrayRethin);
        }
        $this->updateSearch($task->id);
    }

    public function StatusTaskRethindb($task_id) {
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray, "", 0, true);
        $global_task_ids = array(
            "global_task_id" => (int) $task_id
        );
        return r\db("db01")->table("tasks")->filter($global_task_ids)->count()->run($conn);
    }

    public function CreateTaskRethindb($arrayRethin) {
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray, "", 0, true);
        return r\db("db01")->table("tasks")->insert($arrayRethin)->run($conn);
    }

    public function SearchTaskRethindb($task_id) {
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray, "", 0, true);
        $global_task_ids = array(
            "global_task_id" => (int) $task_id
        );
        $results = array();
        $result = r\db("db01")->table("tasks")->filter($global_task_ids)->run($conn);
        foreach ($result as $datas) {
            $results = $datas;
        }
        return (array) $results;
    }

    public function DeleteRethinDB($task_id) {
        $conn = $this->ConnectRethinDb((array) $this->params->IpRethinkDBarray, "", 0, true);
        $global_task_ids = array(
            "global_task_id" => (int) $task_id
        );
        return r\db("db01")->table("tasks")->filter($global_task_ids)->delete()->run($conn);
    }

    public function SeachPointRethinDB($task) {
        $pointName = null;
        $id_point_client = null;
        $id_point = null;
        if ($task->type_task_id == 4) {
            $point_status = 1;
            if (isset($task->TaskPlaces[0]->ClientPoints) && !empty($task->TaskPlaces[0]->ClientPoints) ) {
                if ($task->TaskPlaces[0]->ClientPoints->id_company == $task->id_company) {
                    $pointName = $task->TaskPlaces[0]->ClientPoints->name;
                    $id_point_client = $task->TaskPlaces[0]->ClientPoints->id_point_client;
                    $id_point = $task->TaskPlaces[0]->ClientPoints->id;
                    $point_status = 0;
                }
            }
            if ($point_status) {
                foreach ($task->Points as $valuePoint) {
                    if ($valuePoint->id_company == $task->id_company) {
                        $pointName = $valuePoint->name;
                        $id_point_client = $valuePoint->id_point_client;
                        $id_point = $valuePoint->id;
                        break;
                    }
                }
            }
        }
        return array(
            "id_point" => (int) $id_point,
            "id_point_client" => (string) $id_point_client,
            "pointName" => (string) $pointName,
        );
    }

}
