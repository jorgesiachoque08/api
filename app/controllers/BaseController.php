<?php

use Phalcon\Mvc\Controller;

class BaseController extends Controller {

    ////FUNCION CURT
    public function _getCurtGeoapps2($url, $assoc = false) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERPWD, $this->params->UserLupap . ":" . $this->params->KeyLupap);
        $json = curl_exec($curl);
        $head = curl_getinfo($curl);
        $jsons = new stdClass();
        $jsons->data = json_decode($json, $assoc);
        $jsons->head = (Object) $head;

        return $jsons;
    }

    public function _getCurtGeoapps($url, $assoc = false) {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_USERPWD, $this->params->UserLupap . ":" . $this->params->KeyLupap);
        $json = curl_exec($curl);
        return json_decode($json, $assoc);
    }

    public function _getCurt($url, $assoc = false) {
        $base = new ControllerBase();
        return $base->_getCurt($url, $assoc);
    }

    //CALCULAR DISTANCIA EN 2 PUNTOS ATRAVEZ DE outer.project-osrm.com 
    public function _Distance($origin, $destination) {
        $result = array();
        $url = $this->params->urlRouter2 . "" . $origin . ";" . $destination;
        if (empty($this->cache->get($url))) {
            $json = $this->_getCurt($url, true);
            if ($json["code"] == "Ok") {
                $result["total_distance"] = ($json["routes"][0]["distance"] / 1000);
                $result["total_time"] = $json["routes"][0]["duration"];
                $this->cache->save($url, $result, (10000 * 600 * 60));
            } else {
                $origen = explode(",", $origin);
                $destino = explode(",", $destination);
                $result["total_distance"] = $this->_distanciaLineal($origen[0], $origen[1], $destino[0], $destino[1]);
                $result["total_time"] = 0;
            }
        } else {
            $result = $this->cache->get($url);
        }
        return $result;
    }

    public function _baseprice($city, $type_service, $users = 0) {

        $key = $city . "&" . $type_service . "&" . $users . "&";
        if (empty($this->cache->get($key))) {
            $result = array();
            $base = TypeTaskCity::findFirst([
                        "conditions" => "id_city = :id_city: AND id_type_task = :id_type_task:",
                        "bind" => ['id_city' => $city, 'id_type_task' => $type_service]
            ]);
            if (isset($base->valor) === true) {
                $result["base"] = $base->valor;
                $result["distance"] = $base->distancia;
                $result["time_add"] = $base->time_add;
                $result["km_add"] = $base->km_add;
                $result["km_roundtrip"] = $base->ida_vuelta;
                $result["add_stop"] = $base->parada_add;
                $result["cash_commission"] = $base->comision_porcentaje;
                $result["credit_commission"] = $base->comision_porcentaje_p;
                $result["name_geoapps"] = $base->Ciudad->name_geoapps;
            }
            $this->cache->save($key, $result, 10000);
        } else {
            $result = $this->cache->get($key);
        }
        return $result;
    }

    public function UserVip($users) {
//Usuarios con tarifa distinta
        if ($users == "1") {
            return 0;
        }
        $status = 2;
        $user = array("10392");
        if (in_array($users, $user)) {
            $status = 3;
        }
        return $status;
    }

    public function _user($idUser) {
        $wellness = 0;
        $welfareValue = 0;
        $welfareBalance = 0;
        $payment_type = 1;
        $key = "id_user_new&" . $idUser . "&&";
        $userData = TblUsers::findFirst(
                        array("conditions" => "id = :id_user: ",
                            "bind" => array('id_user' => $idUser)
        ));
        $this->cache->save($key, $userData, 100);
        if ($userData->empresas_id) {
            $payment_type = $userData->Empresas->getTypeTaskPagoId();
            if ($userData->Empresas->getBienestar() == 1) {
                $welfareValue = $userData->Empresas->getBienestarSaldo();
                $wellness = $userData->Empresas->getBienestar();
                $date = date("Y-m-");
                $base23 = $this->db->fetchone('SELECT sum(valor_total)+ifnull(sum(total_otro),0) as suma_mes FROM task 
                                        where solicitante = ' . $idUser . ' and fecha_inicio like "' . $date . '%" and estado <> 6');
                if ($welfareValue > $base23["suma_mes"]) {
                    $welfareBalance = ($welfareValue - $base23["suma_mes"]);
                }
            }
            $balance_ = $this->_balanceBusiness($userData->empresas_id);
            $balancet = isset($balance_["acumulado"]) ? $balance_["acumulado"] : 0;
        } else {
            $payment_type = $userData->type_task_pago_id;
            $balance_ = $this->_balance($idUser);
            $balancet = isset($balance_["acumulado"]) ? $balance_["acumulado"] : 0;
        }
        $ntask = Task::find(array(
                    "conditions" => "solicitante = :id_user: and type_task_id=1 ",
                    "bind" => array('id_user' => $idUser)
        ));
        return array(
            "idUser" => $idUser,
            "wellness" => $wellness,
            "welfareValue" => $welfareValue,
            "welfareBalance" => $welfareBalance,
            "counttask" => count($ntask),
            "payment_type" => $payment_type,
            "balancet" => (int) $balancet,
            "user" => $userData
        );
    }

    //////
    public function _VerificationCoordinates($lat, $log) {
        $key = $lat . "&" . $log . "&";
        if (empty($this->cache->get($key))) {
            $url = $this->params->urlGeoapps2 . "reverse?lon=" . $log . "&lat=" . $lat;
            $json = $this->_getCurtGeoapps($url, true);
            $this->cache->save($key, $json, 100);
        } else {
            $json = $this->cache->get($key);
        }
        return $json;
    }

    public function _addresVerificationCity($address, $ciudad, $id_compamny = null) {
        $keyAddress = "&address&" . $address . "&" . $ciudad . "&" . $id_compamny;
        if (empty($this->cache->get($keyAddress))) {
            $originAddress = $address;
            $address = $this->_quitar_tildes($address);
            $citis_newarby = array();
            $type = 0;
            $recharge = 0;
            $NearbyCity = $this->_NearbyCity($ciudad);
            foreach ($NearbyCity as $datas) {
                $citis_newarby[] = $datas["nearby_city"];
                if (strpos(strtolower($address), $datas["nearby_city"]) !== false) {
                    $type = 0;
                    $recharge = $datas["recharge"];
                    $ciudad = $datas["name_geoapps"];
                    break;
                }
            }
            if ($type != 0) {
                $address = $this->_addresVerificationCity2($address, $ciudad);
                if (isset($address["message"])) {
                    $this->_status400();
                    $message = "Dirección no válida " . $originAddress . " -- " . $id_compamny;
                    if ($id_compamny == $this->params->id_company_deprisa) {
                        $this->_statusCode(450, "invalid_address");
                        $this->json_component->getFormat($message, array(), array(), 'invalid_address');
                    } else {
                        $this->json_component->getFormat($message);
                    }
                }
                $address = $address["response"]["features"][0];
            } else {
                $newBase = new ControllerBase();
                //$address = $this->_addresVerificationCity_($address, $ciudad);
                $address = $newBase->_addresVerificationCityN($address, $ciudad);
                if (isset($address["message"])) {
                    $this->_status400();
                    $message = "Dirección no válida - " . $originAddress;
                    if ($id_compamny == $this->params->id_company_deprisa) {
                        $this->_statusCode(450, "invalid_address");
                        $this->json_component->getFormat($message, array(), array(), 'invalid_address');
                    } else {
                        $this->json_component->getFormat($message);
                    }
                }
                $address = $address["response"];
                foreach ($NearbyCity as $datas) {
                    if (strpos(strtolower($address["properties"]["city"]), $datas["nearby_city"]) !== false) {
                        $type = $datas["type"];
                        $recharge = $datas["recharge"];
                    }
                }
            }
            $address["nearbycity"] = $type;
            $address["recharge"] = $recharge;
            $this->cache->save($keyAddress, $address, (100000 * 600));
        } else {
            $address = $this->cache->get($keyAddress);
        }
        return $address;
    }

    public function _addresVerificationCity_($address, $ciudad) {
        $key = $ciudad . "&_" . urlencode($address) . "&";
        if (empty($this->cache->get($key))) {
            $url = $this->params->urlGeoapps2 . "co/" . $ciudad . "?address=" . urlencode($address);
            $json = $this->_getCurtGeoapps($url, true);
            $this->cache->save($key, $json, 100);
        } else {
            $json = $this->cache->get($key);
        }
        if ($json["response"]["type"] == "FeatureCollection") {
            $json["response"] = $json["response"]["features"][0];
        }
        return $json;
    }

    public function _addresVerificationCity2($address, $ciudad) {
        $key = $ciudad . "&-" . urlencode($address) . "&";
        if (empty($this->cache->get($key))) {
            $url = $this->params->urlGeoapps2 . "search?address=" . urlencode($address . " " . $ciudad);
            $json = $this->_getCurtGeoapps($url, true);
            $this->cache->save($key, $json, 100);
        } else {
            $json = $this->cache->get($key);
        }
        return $json;
    }

    public function _UpdateStatusPlaceRethinkDb($id_task, $id_place, $status, $num_place = null) {
        $base = new ControllerBase();
        $base->updateSearch($id_task);
        if ($status == 1) {
            $ntype_place_string = "Llego a parada " . $num_place;
        } else if ($status == 2) {
            $ntype_place_string = "Salio a parada " . $num_place;
        } else {
            $ntype_place_string = "Parada " . $num_place;
        }

        $datestatus = new DateTime(date("Y-m-d H:i:s"));
        $results_ = $base->SearchTaskRethindb($id_task);
        if (!empty($results_)) {
            $results_["status_id"] = 4;
            $results_["status_name"] = $ntype_place_string;
            $results_["status_description"] = $ntype_place_string;
            $results_["status_date"] = r\ISO8601($datestatus->format(DateTime::ISO8601));
            foreach ($results_["task_places"] as $place) {
                if ($id_place == $place["global_task_place_id"]) {
                    $results_ ["task_place_changed"] = $id_place;
                    $place["status"] = $status;
                    $place["status_date"] = r\ISO8601($datestatus->format(DateTime::ISO8601));
                }
            }
        }
        return $base->_UpdateTaskRethinkDb($id_task, $results_);
    }

    ///
    public function _CreateRethinkDb($data, $table = "couriers") {
        if ($table == 'tasks') {
            $base = new ControllerBase();
            $base->updateSearch($data['id']);
        }
        $conn = r\connect($this->params->IpRethinkDB);
        return r\db("db01")->table($table)->insert($data)->run($conn);
    }

    public function conectrethinkAction() {
        $lat = 4.655817;
        $long = -74.065132;
        $recurso_id = 1813;
        $conn = $this->rethinDB;

        for ($i = 0; $i < 20; $i++) {
            $document2 = array(
                'last_known_latitude' => $lat + ($i / 100000),
                'last_known_longitude' => $long + ($i / 100000),
                'date_last_known_location' => r\now(),
                'identification_type' => $i,
            );
            $result = r\db("db01")->table("couriers")->get((int) $recurso_id)->update($document2)->run($conn);
            print_r($result);
        }
    }

    public function _UpdateTaskRethinkDb($date, $data) {
        $base = new ControllerBase();
        $base->updateSearch($date);
        $conn = $base->ConnectRethinDb((array) $this->params->IpRethinkDBarray);
        $result = $base->_UpdateTaskRethinkDb($date, $data);
        return $results = ((array) $result);
    }

    public function _UpdateRethinkDb($date, $data, $table = "couriers", $index = "global_courier_id") {
        if ($table == 'tasks') {
            $base = new ControllerBase();
            $base->updateSearch($date);
        }

        $conn = $this->rethinDB;
        $result = r\db("db01")->table($table)->get($date)->update($data)->run($conn);
        return ((array) $result);
    }

    public function _TrackRethinkDb($track) {
        $base = new ControllerBase();
        $long = $track["long"];
        $lat = $track["lat"];
        $recurso_id = $track["recurso_id"];
        $conn = $base->ConnectRethinDb((array) $this->params->IpRethinkDBarray); //  Clouster -Crear variable en Config
        //$conn = r\connect($this->params->IpRethinkDB);
        $document2 = array(
            'last_known_latitude' => $lat,
            'last_known_longitude' => $long,
            'date_last_known_location' => r\now(),
            'location'=>  r\point($lat, $long)
        );
        $result = r\db("db01")->table("couriers")->get((int) $recurso_id)->update($document2)->run($conn);
        return ((array) $result);
    }

    public function _statusCode($code, $message = "") {
        $response = new \Phalcon\Http\Response();
        $response->setStatusCode($code, $message);
        $response->send();
    }

    public function _status400() {
        $response = new \Phalcon\Http\Response();
        $response->setStatusCode(400);
        $response->send();
    }

    public function _balance($id_resource) {
        return Movimientos::findFirst(
                        array(
                            "conditions" => "usuario = :id_user:  ",
                            "order" => "id  DESC",
                            "columns" => "id, acumulado,acumulado_nr",
                            "bind" => array('id_user' => $id_resource)
                        )
        );
    }

    public function _balanceBusiness($business_id) {
        return Movimientos::findFirst(
                        array(
                            "conditions" => "empresas_id = :id_user:  ",
                            "order" => "id  DESC",
                            "columns" => "id, acumulado",
                            "bind" => array('id_user' => $business_id)
                        )
        );
    }

    public function _setTaskHistory_($type_task_status_id, $task_id, $recurso_id = NULL, $lat = NULL, $long = NULL, $task_places_id = NULL, $distanciaL = '0', $tipo_parada = NULL, $create_users_id = 1, $tipo_cancelacion = 0, $descripcion = "", $penalizacion = "", $datecreate) {
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
        $taskHistory->setDatecreate($datecreate);
        $taskHistory->save();
        return $taskHistory->id;
    }

    public function _setTaskHistory($type_task_status_id, $task_id, $recurso_id = NULL, $lat = NULL, $long = NULL, $task_places_id = NULL, $distanciaL = '0', $tipo_parada = NULL, $create_users_id = 1, $tipo_cancelacion = 0, $descripcion = "", $penalizacion = "", $status_code = NULL, $is_fake_location = NULL) {
        $base = new ControllerBase();
        return $base->_setTaskHistory($type_task_status_id, $task_id, $recurso_id, $lat, $long, $task_places_id, $distanciaL, $tipo_parada, $create_users_id, $tipo_cancelacion, $descripcion, $penalizacion, $status_code, $is_fake_location);
    }

    public function ParkingPayMovements($task_id, $total_value, $resource_id) {
        $movement = $this->_balance($resource_id);
        $accumulated_nr = $movement->acumulado_nr;
        $accumulated = ($movement->acumulado + $total_value);
        $this->_setMovimientos($accumulated, $total_value, $resource_id, 42, "Pago parqueadero Servicio : " . $task_id, $accumulated_nr, $task_id);
    }

    public function _CashMovements($task_id, $total_value, $surcharge_safe, $commission_percentage, $resource_id, $typeCarga = null, $totalOtros = null) {
        $movement = $this->_balance($resource_id);
        $accumulated_nr = $movement->acumulado_nr;
        $accumulated = $movement->acumulado;
        if ($typeCarga == 5 && $totalOtros < 0) {
            $cash_resource = (($total_value - $surcharge_safe) * $commission_percentage / 100) - $totalOtros;
        } else {
            $cash_resource = (($total_value - $surcharge_safe) * $commission_percentage / 100);
        }
        $accumulated = ($accumulated - $cash_resource);
        $this->_setMovimientos($accumulated, $cash_resource * -1, $resource_id, 4, "Asignar Servicio PE: " . $task_id, $accumulated_nr, $task_id);

        if($surcharge_safe > 0) {
            $accumulated = ($accumulated - $surcharge_safe);
            $this->_setMovimientos($accumulated, $surcharge_safe * -1, $resource_id, 4, "Descuento recargo valor declarado, servicio: " . $task_id, $accumulated_nr, $task_id);
        }
    }

    //

    public function _DiscountedMovements($task_id, $discounted_value, $commission_percentage, $resource_id) {
        $movement = $this->_balance($resource_id);
        $accumulated_nr = $movement->acumulado_nr;
        $accumulated = $movement->acumulado;
        //Parte DESCUETNO
        $pos_amount = $discounted_value * ($commission_percentage / 100);
        $accumulated = $accumulated + $pos_amount;
        $movi_id = $this->_setMovimientos($accumulated, $pos_amount, $resource_id, 10, "Pago al Recurso por Servicio PD: " . $task_id, $accumulated_nr, $task_id);
        $this->_RetentionMovements($movi_id, $pos_amount, $this->params->retention, $resource_id, $task_id);
    }

    public function _RetentionMovements($movi_id, $pos_amount, $commission_percentage, $resource_id, $task_id) {

        //Se quita retención de compra de servicios a partir del 2018-10-01
        if (date('Y-m-d') < $this->params->date_lower_retention) {
            $movement = $this->_balance($resource_id);
            $accumulated_nr = $movement->acumulado_nr;
            $accumulated = $movement->acumulado;
            //Parte DESCUETNO-RETENCION
            $retention = $pos_amount * ($commission_percentage / 100);
            $accumulated = $accumulated - $retention;
            $this->_setMovimientos(round($accumulated, 0), $retention * -1, $resource_id, 9, "Retencion por movimiento PD: " . $movi_id, $accumulated_nr, $task_id);
        }
    }

    public function _PayBonus($task_id, $discounted_value, $resource_id) {
        $movement = $this->_balance($resource_id);
        $accumulated_nr = $movement->acumulado_nr;
        $accumulated = $movement->acumulado;
        //Parte DESCUETNO
        $accumulated = $accumulated + $discounted_value;
        $movi_id = $this->_setMovimientos($accumulated, $discounted_value, $resource_id, 37, "Pago de bono relanzamiento : " . $task_id, $accumulated_nr, $task_id);
        $this->_RetentionBonus($movi_id, $discounted_value, $this->params->retention, $resource_id, $task_id);
    }

    public function _RetentionBonus($movi_id, $pos_amount, $commission_percentage, $resource_id, $task_id) {
        //Se quita retención de compra de servicios a partir del 2018-10-01
        if (date('Y-m-d') < $this->params->date_lower_retention) {
            $movement = $this->_balance($resource_id);
            $accumulated_nr = $movement->acumulado_nr;
            $accumulated = $movement->acumulado;
            //Parte DESCUETNO-RETENCION
            $retention = $pos_amount * ($commission_percentage / 100);
            $accumulated = $accumulated - $retention;
            $this->_setMovimientos(round($accumulated, 0), $retention * -1, $resource_id, 38, "Retencion por bono relanzamiento : " . $movi_id, $accumulated_nr, $task_id);
        }
    }

    public function _setMovimientos($accumulated, $cash_resource, $resource_id, $type, $description, $accumulated_nr, $task_id = NULL, $empresas_id = NULL, $userCreate = 1) {

        $movements = new Movimientos;
        if ($accumulated < $accumulated_nr) {
            $movements->descuento_nr = $accumulated_nr - $accumulated;
            $accumulated_nr = $accumulated;
        }
        if ($accumulated_nr < 0) {
            $accumulated_nr = 0;
        }

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
        $movements->save();
        return $movements->id;
    }

    public function _codePromo($code_promo, $total_service, $declared_price, $user, $payment_type, $cityId = 0) {
        $tota_result = $total_service;
        $other_values = 0;
        $status = NULL;
        $code_status = null;
        $id_code = 0;
        $discounted_value = 0;
        if ($this->params->general_discount_status) {
            $discounted_value = ($this->params->general_discount_percentage / 100) * ($total_service - $declared_price);
            $tota_result = $total_service - $discounted_value;
            if ($tota_result < 0) {
                $tota_result = 0;
            }
        } elseif (isset($user["user"]->Empresas->bienestar_descuento) && ((int) $user["user"]->Empresas->getBienestarDescuento()) > 0 && $user["wellness"] != 1) {
            $discounted_value = ($user["user"]->Empresas->getBienestarDescuento() / 100) * ($total_service - $declared_price);
            $tota_result = $total_service - $discounted_value;
            if ($tota_result < 0) {
                $tota_result = 0;
            }
        } elseif ((!empty($code_promo) || $code_promo != 0)) {
            $CodeProm = $this->SearchCodeProm($code_promo, $user, $total_service, $declared_price, 0, $cityId);
            $discounted_value = $CodeProm["discounted_value"];
            $code_status = $CodeProm["code_status"];
            $tota_result = $CodeProm["total_result"];
            $id_code = $CodeProm["id_code"];
        } elseif ($user["wellness"] == 1) {
            $status = 1;
            $tota_result = $total_service;

            if ($total_service > $user["welfareBalance"]) {
                $tota_result = $total_service - $user["welfareBalance"];
                $other_values = $user["welfareBalance"];
                $payment_type = 1;
            }
            if ($tota_result < 0) {
                $tota_result = 0;
            } else {
                if ($tota_result > $declared_price) {
                    $porcentaje = ($user["user"]->Empresas->getBienestarDescuento() / 100) * ($tota_result - $declared_price);
                } else {
                    $porcentaje = ($user["user"]->Empresas->getBienestarDescuento() / 100) * ($tota_result);
                }

                $tota_result = $tota_result - $porcentaje;
                $discounted_value = $discounted_value + $porcentaje;
            }
        }
        $resuts = array(
            "total_services" => $tota_result,
            "discounted_value" => $discounted_value,
            "other_values" => $other_values,
            "status" => $status,
            "payment_type" => $payment_type,
            "idCodeProm" => $id_code,
            "code_status" => $code_status
        );
        return $resuts;
    }

    //USER _PREGADO  Movements
    public function _PrepaidBusinessMov($business_id, $total_value, $user_id, $task_id, $recargoSeguro = 0, $recargoParqueadero = 0) {
        $movement = $this->_balanceBusiness($business_id);
        $accumulated = isset($movement->acumulado) ? $movement->acumulado : 0;
        $accumulated = ($accumulated - $total_value);
        $this->_setMovimientos($accumulated, $total_value * -1, $user_id, 4, "_Descuento por servicio: " . $task_id, NULL, $task_id, $business_id);

        if($recargoSeguro > 0) {
            $accumulated = ($accumulated - $recargoSeguro);
            $this->_setMovimientos($accumulated, $recargoSeguro * -1, $user_id, 54, "_Descuento recargo valor declarado: " . $task_id, NULL, $task_id, $business_id);
        }

        if($recargoParqueadero > 0 ) {
            $accumulated = ($accumulated - $recargoParqueadero);
            $this->_setMovimientos($accumulated, $recargoParqueadero * -1, $user_id, 42, "_Descuento recargo parqueadero: " . $task_id, NULL, $task_id, $business_id);
        }
    }

    //USER _PREGADO  Movements
    public function _PrepaidUserMov($user_id, $total_value, $task_id, $recargoSeguro = 0, $recargoParqueadero = 0) {
        $movement = $this->_balance($user_id);
        $accumulated = isset($movement->acumulado) ? $movement->acumulado : 0;
        $accumulated = ($accumulated - $total_value);
        $this->_setMovimientos($accumulated, $total_value * -1, $user_id, 4, "_Descuento por servicio: " . $task_id, NULL, $task_id, NULL);

        if($recargoSeguro > 0) {
            $accumulated = ($accumulated - $recargoSeguro);
            $this->_setMovimientos($accumulated, $recargoSeguro * -1, $user_id, 54, "_Descuento recargo valor declarado: " . $task_id, NULL, $task_id, NULL);
        }

        if($recargoParqueadero > 0) {
            $accumulated = ($accumulated - $recargoParqueadero);
            $this->_setMovimientos($accumulated, $recargoParqueadero * -1, $user_id, 42, "_Descuento recargo parqueadero: " . $task_id, NULL, $task_id, NULL);
        }
    }

    public function _distanciaLineal($point1_lat, $point1_long, $point2_lat, $point2_long) {
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));
        $distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
        return round($distance, 3);
    }

    public function _distanciaLineal2($point1_lat, $point1_long, $point2_lat, $point2_long) {
        $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));
        $distance = $degrees * 111.13384; // 1 grado = 111.13384 km, basándose en el diametro promedio de la Tierra (12.735 km)
        $distance = ($distance * 1000); //Pasar KM en Metros.
        return round($distance, 3);
    }

    public function _NearbyCity($citybase) {
        $key = "_NearbyCity&_" . $citybase;
        if (empty($this->cache->get($key))) {
            $datas = NearbyCity::find(array(
                        "conditions" => "citybase = :citybase:  ",
                        "bind" => array('citybase' => $citybase),
                        "columns" => "id, nearby_city,type,recharge,name_geoapps",
                        'order' => 'nearby_city ASC'
                            )
            );
            $this->cache->save($key, $datas, 1000);
        } else {
            $datas = $this->cache->get($key);
        }
        return $datas;
    }

    public function _NearbyCityAdd($citybase, $NearbyCity) {
        $key = "_NearbyCity_&" . $citybase . "_&" . $NearbyCity;
        if (empty($this->cache->get($key))) {
            $datas = NearbyCity::findFirst(array(
                        "conditions" => "citybase = :citybase: and name_geoapps  = :name_geoapps:  ",
                        "bind" => array('citybase' => $citybase, 'name_geoapps' => $NearbyCity),
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

    public function _setPuntosHistorial($users_id, $points, $Typepoints, $users__qr = NULL, $type_recurso = NULL) {
        $acumulado = PuntosHistorial::find(
                        array(
                            "conditions" => "usuario_id = :id_user:  ",
                            "bind" => array('id_user' => $users_id),
                            "columns" => "id, acumulado,puntos",
                            'order' => 'id DESC',
                            "limit" => 1
                        )
        );
        $accumulated = isset($acumulado[0]) ? $acumulado[0]["acumulado"] + $points : $points;
        $PuntosHistorial = new PuntosHistorial();
        $PuntosHistorial->setUsuarioId($users_id);
        $PuntosHistorial->setUsuarioGen($users_id);
        $PuntosHistorial->setPuntos($points);
        $PuntosHistorial->setAcumulado($accumulated);
        $PuntosHistorial->setUsercreate(1);
        $PuntosHistorial->setTypePuntosId($Typepoints);
        $PuntosHistorial->setUsuarioQr($users__qr);
        $PuntosHistorial->setTypeRecurso($type_recurso);
        $PuntosHistorial->save();

        return $PuntosHistorial->getId();
    }

    function _quitar_tildes($cadena) {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        return str_replace($no_permitidas, $permitidas, $cadena);
    }

    function eliminar_tildes($cadena) {

        //Codificamos la cadena en formato utf8 en caso de que nos de errores
        $cadena = utf8_encode($cadena);

        //Ahora reemplazamos las letras
        $cadena = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $cadena
        );

        $cadena = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $cadena);

        $cadena = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $cadena);

        $cadena = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $cadena);

        $cadena = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $cadena);

        $cadena = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'), array('n', 'N', 'c', 'C'), $cadena
        );

        return $cadena;
    }

    function _UsersVip($users) {
        $vip = array("11640");
        if (!in_array($users, $vip)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    public function _SelectTaskRethinkDb($id_task) {
        $base = new ControllerBase();
        $conn = $base->ConnectRethinDb((array) $this->params->IpRethinkDBarray);
        $result = r\db("db01")->table('tasks')->get((int) $id_task)->run($conn);
        return (array) $result;
    }

    public function _addrethinkdb($id_user) {
        $resource = Recursos::findFirst(
                        array(
                            "conditions" => "tbl_users_id = :id_user: ",
                            "bind" => array('id_user' => $id_user)
                        )
        );
        if ($resource) {

            $movement = Movimientos::findFirst(
                            array(
                                "conditions" => "usuario = :id_user: ",
                                "order" => "id  DESC",
                                "bind" => array('id_user' => $id_user)
                            )
            );

            $creditsNotDraw = 0;
            $credits = 0;
            if (!empty($movement)) {
                $creditsNotDraw = $movement->acumulado_nr;
                $credits = $movement->acumulado;
            }

            $imgs = $this->params['urlResources'] . '/images/recursos/foto' . $resource->id . '.jpg?date=' . (strtotime("now"));
            $headers = get_headers($imgs);
            $status_ = stripos($headers[0], "200 OK") ? true : false;
            /////
            $type_caracteristica = array();
            foreach ($resource->RecursoCaracteristica as $caracteristicas) {
                $type_caracteristica[] = (int) $caracteristicas->type_caracteristica;
            }
            if ($status_) {
                $imagens = $imgs;
            } else {
                $imagens = $this->params['urlResources'] . '/images/recursos/default.png';
            }
            $conn = r\connect($this->params->IpRethinkDB);
            $results = r\db("db01")->table("couriers")->get((int) $id_user)->run($conn);
            $Score = new ScoreController();
            $Score_data = $Score->returnRatingAction($resource->tbl_users_id);
            $rating = $Score_data["data"]["score"];
            if ($resource->status == 0) {
                $availability = 2;
            } else {
                $availability = $resource->status;
            }

            $datas = array(
                //
                "id" => (int) $resource->tbl_users_id,
                "global_courier_id" => (int) $resource->tbl_users_id,
                "global_resource_id" => (int) $resource->id,
                "name" => $resource->nombre,
                "identification" => $resource->did,
                "identification_type" => 1,
                "credits" => (int) $credits,
                "rating" => $rating,
                "is_vip" => (int) $resource->vip,
                "courier_type" => (int) $resource->type_recurso_id,
                "is_available" => (bool) $resource->status,
                "is_corporate" => (bool) $resource->corporativo,
                "is_delivery" => (bool) $resource->domiciliario,
                "is_express" => (bool) $resource->corporativo,
                "is_ecommerce" => (bool) $resource->ecommerce,
                "experience" => (bool) $resource->experience,
                "phone" => $resource->celular,
                "photo_url" => $imagens,
                "city_id" => (int) $resource->ciudad_id,
                "plate_number" => $resource->placa,
                "email" => $resource->TblUsers1->email,
                "has_social_security" => (int) $resource->ss,
                "is_activation" => (bool) $resource->activacion,
                "equipment" => $type_caracteristica,
                "availability" => (int) $availability,
                "availability_id" => (int) $resource->in_availability,
                "active_task_delivery" => $this->ServicesActves($resource->tbl_users_id, 4),
                "active_tasks_express" => $this->ServicesActves($resource->tbl_users_id, 1),
                "credits_not_draw" => (int) $creditsNotDraw,
                'location'=>  r\point(0, 0)
            );

            if ($resource->date_status_end != '0000-00-00 00:00:00') {
                $datestatus = new DateTime($resource->date_status_end);
                $datas["date_last_availability"] = r\ISO8601($datestatus->format(DateTime::ISO8601));
            }

            if ($results) {
                r\db("db01")->table("couriers")->get((int) $id_user)->update($datas)->run($conn);
            } else {
                $ndatos = array(
                    "conflict" => "replace"
                );
                r\db("db01")->table("couriers")->insert($datas, $ndatos)->run($conn);
            }
        } else {
            echo false;
        }
    }

    public function ServicesActves($tbl_users_id, $type) {

        if ($type == 4) {
            $types = array(4);
        } else {
            $types = array(1, 2, 3, 5, 6, 7, 8);
        }
        $result = array();
        $tasks = Task::find(array(
                    "conditions" => "id_resource = :user_id: AND (estado<5) and type_task_id in ({type:array}) ",
                    "columns" => "id",
                    "bind" => array('user_id' => $tbl_users_id, "type" => $types)
        ));
        if ($tasks) {
            foreach ($tasks as $task) {
                $result[] = (int) $task->id;
            }
        }

        return $result;
    }

    public function _SMSEnviar($movil, $message) {
        $base = new ControllerBase();
        $base->_SMSEnviar($movil, $message);
    }

    public function _SumMovements($idUser, $value, $id_movements, $description, $nr = 0) {
        $movement = $this->_balance($idUser);
        $accumulated_nr = ($movement->acumulado_nr + $nr);
        $accumulated = $movement->acumulado + $value;
        $this->_setMovimientos(round($accumulated, 0), $value, $idUser, $id_movements, $description, $accumulated_nr);
    }

    ////CALIFICACION POR TIEMPO
    public function Timerating($task_id, $type_task_id, $recurso_id) {
        $base = new ControllerBase();
        $base->Timerating($task_id, $type_task_id, $recurso_id);
    }

    public function DifSegundos($fechaInicial, $fechaFinal) {
        $base = new ControllerBase();
        return $base->DifSegundos($fechaInicial, $fechaFinal);
    }

    protected function Calificar($task_id, $id_pregunta, $calf, $type) {
        $base = new ControllerBase();
        $base->Calificar($task_id, $id_pregunta, $calf, $type);
    }

    public function RatingDistance($task_id) {
        $base = new ControllerBase();
        $base->RatingDistance($task_id);
    }

    public function refererend($id_user) {
        $base = new ControllerBase();
        $base->refererend($id_user);
    }

    public function _sendPushCustomers($user_, $texto_, $task_id_, $task_lat_, $task_long_) {
        $base = new ControllerBase();
        $base->_sendPushCustomers($user_, $texto_, $task_id_, $task_lat_, $task_long_);
    }

    //enviamos y recogemos los datos del api de google private 
    function cURL($url, $post = true) {
        $apiURL = 'https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyBLVBgDM1AbzrME-8vtIou3eHiqt2QuDNk';
        $ch = curl_init();
        if ($post) {
            curl_setopt($ch, CURLOPT_URL, $apiURL);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(array('longUrl' => $url)));
        } else {
            curl_setopt($ch, CURLOPT_URL, $this->apiURL . '&shortUrl=' . $url);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $json = curl_exec($ch);
        curl_close($ch);
        return (object) json_decode($json);
    }

    public function _Logs($log_, $result, $task_id, $tokens) {
        $logs = new LogAliados();
        $logs->log = json_encode(json_decode($log_));
        $logs->result = $result;
        $logs->task_id = $task_id;
        $logs->token = $tokens;
        $logs->type = 4;
        $logs->save();
    }

    public function _PolygonCoordinates($lat, $log, $id_city) {
        $sql = "SELECT name, value, status FROM CityPolygon WHERE ST_CONTAINS (polygon, Point(" . $log . ", " . $lat . ")) AND id_city = '" . $id_city . "' ";
        if (empty($this->cache->get($sql))) {
            $querysS = $this->modelsManager->createQuery($sql)->execute();
            $this->cache->save($sql, $querysS, (16000 * 6000));
        } else {
            $querysS = $this->cache->get($sql);
        }

        $key = array(
            "status" => "NO"
        );
        if (!empty($querysS[0])) {
            $key = $querysS[0];
        }
        return $key;
    }

    public function Notificacionterceros($task_id, $num_places = null, $status_place = null, $dataPlace = array(), $existePlace = array()) {
        $task = Task::findFirst(array(
                    "conditions" => "id = :id: ",
                    "bind" => array('id' => $task_id)
        ));

        $log = 0;
        if($task->id_company == 7455) {
            $log = 1;
        }

        $status = array("create", "create", "on_hold", "assigned", "in_progress", "finished", "cancel");
        if ($task->id_company == 4393) {
            $url = $this->params->urlFront . "tf?uuid=" . $task->uuid;
        } else {
            $url = $this->params->urlFront . "track-service-external#?uuid=" . $task->uuid;
        }
        if ($task->id_company == $this->params->id_company_deprisa && $task->estado == 3) {
            $baseDeprisa = new DeprisaController();
            $baseDeprisa->assignedDeprisa($task);
        } elseif ($task->id_company == $this->params->id_company_deprisa && $task->estado > 3) {
            $baseDeprisa = new DeprisaController();
            $baseDeprisa->statusDeprisa($task, $num_places, $status_place, $dataPlace, $existePlace);
        } elseif ($task->id_company == $this->params->id_grupo_exito && $task->estado == 3) {
            $baseGExito = new GrupoexitoController();
            $baseGExito->assignedGrupoExito($task);
        } elseif ($task->id_company == $this->params->id_grupo_exito && $task->estado > 3) {
            $baseGExito = new GrupoexitoController();
            $baseGExito->statusGrupoExito($task, $num_places, $status_place);
        } elseif ($task->os == "NEW API 2.0" && $task->estado > 2 && $task->id_company == 4393) {//FARMATODO
            if ($status_place == 1 || $task->estado == 3 || $task->estado == 5 || $task->estado == 6) {
                $urls = $this->params->url_status_update;
                $statusF = array("CREATE", "CREATE", "ON_HOLD", "ASSIGNED", "PICKING", "FINISHED", "CANCEL");
                if (($num_places == (count($task->TaskPlaces) - 1) && $task->ida_vuelta == 1 && $status_place == 1) ||
                        ($num_places == count($task->TaskPlaces) && $task->ida_vuelta == 0 && $status_place == 1)) {
                    $statusF[4] = "DELIVERED";
                }
                $data_array = array(
                    "uuid" => $task->uuid,
                    "order_no" => $task->TaskPlaces[0]->order_id,
                    "status" => $statusF[(int) $task->estado],
                    "messenger" => $task->resource_name,
                    "phone" => $task->Recursos->celular,
                    "url" => $url
                );

                $this->CurlTerceros($urls, $data_array, null, $log);
            }
        } elseif (($num_places == 2 && $status_place == 1) && $task->id_company == 5316 && $task->os != "domicilios") {//SALVATORS PRODU 5316
            $params = array(
                "UUID" => (string) $task->uuid,
                "Hora" => (string) date("H:i:s")
            );
            $client = new SoapClient("http://190.85.82.194:5981/MUrbanos.asmx?wsdl", array('cache_wsdl' => WSDL_CACHE_NONE));
            $client->__soapCall('ActualizaHoraEntrega', [$params]);
        } elseif (!empty($task->Empresas->EmpresasParam) && !empty($task->Empresas->EmpresasParam->endpoint)) {

            $headers = [];

            $array_detalle = array(
                "uuid" => $task->uuid,
                "status" => $status[(int) $task->estado],
                "status_id" => (int) $task->estado,
                "num_place" => (int) $num_places,
                "status_place" => (int) (is_null($status_place)) ? 1 : $status_place,
                "url" => $url,
                "mensajero" => $task->resource_name,
                "phone" => $task->Recursos->celular,
                "vehicle_plate" => $task->Recursos->placa,
                "photo_url" => $this->url_exists_photo($task->Recursos->id),
            );

            if ($task->type_task_id == 7) {
                $headers = [
                    "auth_key" => $task->Empresas->EmpresasParam->token_id,
                    "channel_name" => $task->Empresas->EmpresasParam->type_data
                ];
                $array_detalle['track_number'] = isset($task->TaskPlaces[0]->order_id) ? $task->TaskPlaces[0]->order_id : "";
            }else if ($task->type_task_id == 4) {
                $array_detalle['order_id'] = isset($task->TaskPlaces[1]->order_id) ? $task->TaskPlaces[1]->order_id : "";
            }

            if ($task->estado == 3 && in_array($task->id_company, (array) $this->params->company_eta)) {
                $array_detalle["unique_id_driver"] = $task->Recursos->did;
                $array_detalle["eta"] = $this->calculate_eta($task->TaskPlaces[0], $task->id_resource);
            }


            $finishCode = isset($data["finish_status"]) ? $data["finish_status"] : 0;

            if ($num_places > 1 and $array_detalle['status_place'] == 2) {
                $array_detalle['finish_status'] = isset($dataPlace['finish_status']) ? $dataPlace['finish_status'] : 0;
                $array_detalle['finish_type'] = isset($this->params->finish_reason[$dataPlace['finish_type']]) ? $this->params->finish_reason[$dataPlace['finish_type']] : "";
                $array_detalle['finish_description'] = isset($dataPlace['finish_description']) ? $dataPlace['finish_description'] : "";
            }

            if ($task->estado == 5) {
                $complement = TaskPlacesComplement::findFirst(array(
                            "conditions" => "id_task = :task_id: AND finished_status = 0",
                            "bind" => array('task_id' => $task->id)
                ));

                if ($task->type_task_id == 7) {
                    $complement = TaskPlacesComplement::findFirst(array(
                            "conditions" => "id_task = :task_id:",
                            "bind" => array('task_id' => $task->id)
                    ));
                }

                if (!empty($complement)) {
                    $freason = $this->params->finish_reason[(int) $complement->finished_type];
                    if ($task->type_task_id == 7) {
                        $freason = $this->params->finish_reason2[(int) $complement->finished_type];
                    }

                    $array_detalle['finish_status'] = (int) $complement->finished_status;
                    $array_detalle['finish_type'] = $freason;
                    $array_detalle['finish_description'] = $complement->finished_description;
                } else {
                    $array_detalle['finish_status'] = 1;
                    if ($task->type_task_id == 7) {
                        $freason = $this->params->finish_reason2[0];
                        $array_detalle['finish_type'] = (string) $freason; 
                    }else{
                      $array_detalle['finish_type'] = (int) 0; 
                    }
                    $array_detalle['finish_description'] = "";
                }
            }

            $datos = array(
                "token" => $task->Empresas->EmpresasParam->token_id,
                "id_company" => $task->id_company,
                "type" => $task->Empresas->EmpresasParam->type_data,
                "date" => date("Y-m-d H:i:s"),
                "details" => $array_detalle,
            );
            if ($task->os != "NEW API 2.0" && $task->id_company != 4393) {
                $this->CurlTerceros($task->Empresas->EmpresasParam->endpoint, $datos, $headers, $log);
            } elseif ($task->os == "NEW API 2.0" && $task->id_company != 4393) {
                $this->CurlTerceros($task->Empresas->EmpresasParam->endpoint, $datos, $headers, $log);
            } elseif ($task->os != "NEW API 2.0" && $task->id_company == 4393) {
                $this->CurlTerceros($task->Empresas->EmpresasParam->endpoint, $datos, $headers, $log);
            }
        }
    }

    function CurlTerceros($urls, $datos, $headersAdd = null, $log = 0) {

        $token = isset($datos["token"]) ? $datos["token"] : "123";
        $headers = array(
            "Content-Type: application/json",
            "X-API-KEY: " . $token
        );

        if (isset($headersAdd['channel_name'])) {
            $headers[] = "auth_key: " . (isset($headersAdd['auth_key']) ? $headersAdd['auth_key'] : "N/A");
            $headers[] = "Channel_Name: " . (isset($headersAdd['channel_name']) ? $headersAdd['channel_name'] : "N/A");
        }

        $objectData = json_encode($datos);
        $rest = curl_init();
        curl_setopt($rest, CURLOPT_URL, $urls);
        curl_setopt($rest, CURLOPT_POST, 1);
        curl_setopt($rest, CURLOPT_POSTFIELDS, $objectData);
        curl_setopt($rest, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($rest, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($rest, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($rest, CURLOPT_TIMEOUT, 2);
        curl_exec($rest);
        curl_close($rest);



        if (isset($headersAdd['channel_name'])) {
            $dataLog = $datos;
            $dataLog['headers'] = $headers;
            $this->_Logs(json_encode($dataLog), json_encode($rest), 1, 'Prueba finalizado');
        }

        if ($log == 1) {
            $dataLog = $datos;
            $dataLog['headers'] = $headers;
            $this->_Logs(json_encode($dataLog), json_encode($rest), 1, 'Prueba Mc Donalds');
        }
    }

    function url_exists_photo($resource_id) {
        $url = $this->params['urlResources'] . '/images/recursos/foto' . $resource_id . '.jpg?date=' . (strtotime("now"));
        $handle = @fopen($url, "r");
        if ($handle == false) {
            return $this->params['urlResources'] . '/images/recursos/default.png?date=' . (strtotime("now"));
        }
        fclose($handle);
        return $url;
    }

    public function SearchCodeProm($code_promo, $user, $total_service, $declared_price, $source = 0, $cityId = 0) {
        //print_r($user); die;
        $id_code = 0;
        $discounted_value = 0;
        $tota_result = $total_service;
        $message = "Sin Descuento";
        $code_status = 0;
        $CodeProm = CodeProm::findFirst(array(
                    "conditions" => "codeprom = :codeprom: and estado <> 0 and fecha_final > now() AND (city_id = 0 or city_id = :city_id:)",
                    "bind" => array('codeprom' => $code_promo, 'city_id' => $cityId),
                    "order" => 'city_id DESC'
        ));


        if (!empty($CodeProm)) {
            $countHistory = CodePromHistory::find(array(
                        "conditions" => "code_prom_id = :codeprom: ",
                        "bind" => array('codeprom' => $CodeProm->id)
            ));
            if ($CodeProm->cantidad >= count($countHistory)) {
                $id_code = $CodeProm->id;
                $contHistory = 0;
                if ($CodeProm->tipo_descuento == 2 || $CodeProm->tipo_descuento == 4) {
                    $codeHistory = CodePromHistory::findFirst(array(
                                "conditions" => "code_prom_id = :codeprom: and tbl_users_id= :idUser: ",
                                "bind" => array('codeprom' => $CodeProm->id, "idUser" => $user["idUser"])
                    ));
                    if (!empty($codeHistory)) {
                        $contHistory = 1;
                    }
                }

                switch (true) {
                    case ($CodeProm->tipo_descuento == 1 && ($user["counttask"] == 0 || $source == 5)): //DESCUENTO PRIMER SERVICIO 
                    case ($CodeProm->tipo_descuento == 2 && ($contHistory == 0 || $source == 5)): //DESCUENTO UNICO CODIGO
                    case ($CodeProm->tipo_descuento == 5 && $user['user']->user_type == 3): //DESCUENTO PN MUCHOS SERVICIOS %
                        $discounted_value = ($CodeProm->descuento / 100) * ($total_service - $declared_price);
                        $tota_result = $total_service - $discounted_value;
                        if ($tota_result < 0) {
                            $tota_result = 0;
                        }
                        $code_status = true;
                        $message = "Codigo Valido ";
                        break;
                    case ($CodeProm->tipo_descuento == 3 && ($user["counttask"] == 0 || $source == 5))://DESCUENTO PRIMER SERVICIO 
                    case ($CodeProm->tipo_descuento == 4 && ($contHistory == 0 || $source == 5))://DESCUENTO UNICO CODIGO
                    case ($CodeProm->tipo_descuento == 6 && $user['user']->user_type == 3)://DESCUENTO PN MUCHOS SERVICIOS $
                        $tota_result = $total_service - $CodeProm->descuento;
                        if ($tota_result < 0) {
                            $tota_result = 0;
                        }
                        $discounted_value = $total_service - $tota_result;
                        $message = "Codigo Valido ";
                        $code_status = true;
                        break;
                    default:
                        $discounted_value = 0;
                        $message = "Código de descuento usado anteriormente ó no es su primer servicio.";
                        $code_status = false;
                        break;
                }
            } else {
                $discounted_value = 0;
                $message = "Código de descuento usado anteriormente.";
                $code_status = 0;
                $id_code = 0;
            }
        } else {
            $discounted_value = 0;
            $message = "Código de descuento usado anteriormente ó no es su primer servicio.";
            $code_status = 0;
            $id_code = 0;
        }

        return [
            "message" => $message,
            "code_status" => $code_status,
            "discounted_value" => $discounted_value,
            "total_result" => $tota_result,
            "id_code" => $id_code
        ];
    }

    public function SaveCodeProm($code_prom_id, $users_id, $task_id, $descuento_apply) {
        $historyid = new CodePromHistory();
        $historyid->code_prom_id = $code_prom_id;
        $historyid->tbl_users_id = $users_id;
        $historyid->task_id = $task_id;
        $historyid->descuento_apply = $descuento_apply;
        $historyid->save();
    }

    //Buscar caracteristicas de segmentacion de un servicio
    public function SegmentationFeatures($id_segmentation) {
        $resourceCategorys = SegmentacionCaracteristicas::find(array("conditions" => "type_segmenacion_id = :type_segmenacion: ", "bind" => array('type_segmenacion' => $id_segmentation)));
        $result = array();
        foreach ($resourceCategorys as $resourceCategory) {
            $result[] = (int) $resourceCategory->type_caracteristica_id;
        }
        return $result;
    }

    public function TaskCront() {
        $date = date('Y-m-d H:i:s', strtotime('+15 minute', strtotime(date("Y-m-d H:i:s"))));
        return Task::find(array("conditions" => " estado=1 and (CONCAT(fecha_inicio, ' ' , hora_inicio)<=:date_init:)  and ciudad_id>0 ", "bind" => array('date_init' => $date)));
    }

    ////
    public function PushNotification($fields, $API_ACCESS_KEY) {
        $headers = array(
            'Authorization: key=' . $API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $json = curl_exec($ch);
        curl_close($ch);
    }

    public function _sendPushClient($user_id, $title, $message, $task_id, $status = 3) {
        $data["users"] = $user_id;
        $data["title"] = $title;
        $data["message"] = $message;
        $data["task_id"] = $task_id;
        $data["status"] = $status;
        $this->SendNotificationClient((Object) $data);
    }

    function searchTokenClient($user_id) {
        $tokens = TokenNotification::find(array("conditions" => "user_id = :users: AND type=2", 'bind' => ['users' => $user_id]));
        $tokenUser = array();
        foreach ($tokens as $token) {
            $tokenUser[] = $token->token;
        }
        return $tokenUser;
    }

    function SendNotificationClient($data) {
        $api_access_key = $this->params->Keyfirebase;
        $msg = array(
            'title' => $data->title,
            'body' => $data->message,
            'vibrate' => 0,
            'sound' => 0
        );
        $msgdata = array(
            'status' => (int) $data->status,
            'task_id' => (int) $data->task_id
        );
        $fields = array();
        $fields["registration_ids"] = $this->searchTokenClient($data->users);
        $fields["notification"] = $msg;
        $fields["data"] = $msgdata;
        // $fields["restricted_package_name"] = $this->params->PackageNameApp;
        $this->PushNotification($fields, $api_access_key);
    }

    public function DetailServiceEmail($task_id) {
        $task_detail = TaskDetail::findFirst([
                    "conditions" => "task_id = :task_id: ",
                    "bind" => ['task_id' => $task_id]]);
        if (!$task_detail) {
            $task_detail = new TaskDetail();
        }
        $task_detail->task_id = (int) $task_id;
        $task_detail->emailassignment = 0;
        $task_detail->save();
    }

    /* Obtiene el valor límite negativo para solicitar servicios */

    public function getNegativeBalance($userData) {
        $negativeBalance = 0;

        if ($userData->empresas_id) {
            $paymentType = $userData->Empresas->type_task_pago_id;
            $dataRule = EmpresasParam::findFirstByEmpresasId($userData->empresas_id);
        } else {
            $paymentType = $userData->type_task_pago_id;
            $dataRule = UsersParam::findFirstByUserId($userData->id);
        }

        if (empty($dataRule) || IS_NULL($dataRule->negative_balance)) {
            if (isset($this->params['negative_balance'][$paymentType])) {
                $negativeBalance = $this->params['negative_balance'][$paymentType];
            }
        } elseif (!IS_NULL($dataRule->negative_balance)) {
            $negativeBalance = $dataRule->negative_balance;
        }

        return $negativeBalance;
    }

    /**
     * Retorna los datos de tarifas para calcular los servicios y los pagos a mensajeros.
     * 1: Reglas para calcular % de dispersión mensajeros y penalizaciones
     * 2: Reglas para calcular el valor de los servicios (Valor base, km adicional, etc)
     * 3: Reglas para calcular el % de valor declarado 
     * */
    public function getPaymentRules($cityId, $serviceType, $range, $comapnyId, $typeRule = 1) {

        //Consulto los datos para la empresa enviada
        //cache en la cunsolta
        $keycache = $this->params->key_payment_rules . $cityId . "&" . $serviceType . "&" . $range . "&" . $comapnyId . "&" . $typeRule;
        if (!$this->cache->get($keycache)) {
            $base1 = PaymentRules::findFirst([
                        "conditions" => "
                type = :type_rule: AND 
                (city_id = :city_id: OR city_id = 0) AND 
                type_task = :type_task_id: AND 
                minimum_range <= :range: AND 
                maximum_range >= :range: AND
                (company_id = :company_id: OR company_id = 0)",
                        "bind" => [
                            'city_id' => $cityId,
                            'type_task_id' => $serviceType,
                            'range' => $range,
                            'company_id' => $comapnyId,
                            'type_rule' => $typeRule
                        ],
                        "order" => "company_id DESC, city_id DESC"
            ]);
            $this->cache->save($keycache, $base1, (18000 * 600));
        }
        $base = $this->cache->get($keycache);
        if ($typeRule == 2) {
            $return = [];
            if (!empty($base)) {
                $return = [
                    "base" => $base->base_value,
                    "distance" => $base->km_included,
                    "km_add" => $base->km_add,
                    "km_roundtrip" => $base->km_roundtrip,
                    "add_stop" => $base->additional_stop,
                    "night_surcharge" => $base->night_surcharge,
                    "time_add" => $base->additional_minute
                ];
            }
            return $return;
        }

        if ($typeRule == 3) {
            if (!empty($base)) {
                return $range * $base->value / 100;
            }

            return [
                "code" => 400,
                "message" => "El valor declarado no es válido, es posible que supere el lìmite autorizado. Por favor verifique",
                "status" => "error"
            ];
        }

        return $base;
    }

    public function Alerts($message) {
        foreach ($this->params['user_sms_service'] as $sms) {
            $base = new ControllerBase();
            $base->_SMSEnviar($sms, $message);
        }
    }

    public function _AddTags($task_id, $task_history, $task_places, $tags_id, $user_id) {
        $logs = new TagsTask();
        $logs->task_id = $task_id;
        $logs->task_history_id = $task_history;
        $logs->task_place_id = $task_places;
        $logs->tags_id = $tags_id;
        $logs->user_id = $user_id;
        $logs->save();
    }

    public function calculate_eta($taskplace, $id_user) {
        $base = new ControllerBase();
        $conn = $base->ConnectRethinDb((array) $this->params->IpRethinkDBarray);
        $results = r\db("db01")->table("couriers")->get((int) $id_user)->run($conn);
        $origin = $results["last_known_longitude"] . "," . $results["last_known_latitude"];
        $destination = $taskplace->long . "," . $taskplace->lat;
        $result = $this->_Distance($origin, $destination);
        return (int) ($result["total_time"] + 120);
    }

    public function _balanceBusinessRefund($business_id) {
        return Reembolsos::findFirst(
                        array(
                            "conditions" => "empresas_id = :id_user:  ",
                            "order" => "id  DESC",
                            "columns" => "id, acumulado",
                            "bind" => array('id_user' => $business_id)
                        )
        );
    }

    public function setMovimientosRefund($accumulated, $cash_resource, $resource_id, $type, $description, $task_id = NULL, $empresas_id = NULL) {

        $movements = new Reembolsos;
        $movements->acumulado = $accumulated;
        $movements->monto = $cash_resource;
        $movements->usuario = $resource_id;
        $movements->type_movimientos_id = $type;
        $movements->descripcion = $description;
        //$movements->setAcumuladoNr($accumulated_nr);
        $movements->task_id = $task_id;
        $movements->empresas_id = $empresas_id;
        $movements->fecha = date("Y-m-d");
        $movements->usercreate = 1;
        $movements->save();
        return $movements->id;
    }

}
