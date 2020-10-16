<?php

class Tasktest extends \Phalcon\Mvc\Model
{

    public function getWriteConnection()
    {
        return \Phalcon\DI::getDefault()->get('db');
    }
    public function getReadConnection()
    {
        return \Phalcon\DI::getDefault()->get('db_read');
    }

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $uuid;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var integer
     */
    public $type_task_id;

    /**
     *
     * @var string
     */
    public $fecha_inicio;

    /**
     *
     * @var string
     */
    public $hora_inicio;

    /**
     *
     * @var string
     */
    public $fecha_final;

    /**
     *
     * @var string
     */
    public $hora_final;

    /**
     *
     * @var string
     */
    public $valor_declarado;

    /**
     *
     * @var string
     */
    public $valor_descuento;

    /**
     *
     * @var string
     */
    public $recargo_distancia;

    /**
     *
     * @var string
     */
    public $recargo_ida_vuelta;

    /**
     *
     * @var string
     */
    public $recargo_seguro;

    /**
     *
     * @var string
     */
    public $recargo_tiempo;

    /**
     *
     * @var integer
     */
    public $tiempo_adicional;

    /**
     *
     * @var string
     */
    public $valor_total;

    /**
     *
     * @var string
     */
    public $comision;

    /**
     *
     * @var string
     */
    public $total_otro;

    /**
     *
     * @var integer
     */
    public $estado;

    /**
     *
     * @var integer
     */
    public $solicitante;

    /**
     *
     * @var integer
     */
    public $estado_pago;

    /**
     *
     * @var integer
     */
    public $type_task_carga_id;

    /**
     *
     * @var string
     */
    public $code_prom;

    /**
     *
     * @var integer
     */
    public $ciudad_id;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var string
     */
    public $date_modify;

    /**
     *
     * @var integer
     */
    public $user_modify;

    /**
     *
     * @var integer
     */
    public $usercreate;

    /**
     *
     * @var integer
     */
    public $distancia;

    /**
     *
     * @var integer
     */
    public $paradas;

    /**
     *
     * @var string
     */
    public $recargo_paradas;

    /**
     *
     * @var integer
     */
    public $ida_vuelta;

    /**
     *
     * @var integer
     */
    public $term;

    /**
     *
     * @var string
     */
    public $cc;

    /**
     *
     * @var string
     */
    public $factura;

    /**
     *
     * @var integer
     */
    public $mix;

    /**
     *
     * @var integer
     */
    public $fuente;

    /**
     *
     * @var string
     */
    public $os;

    /**
     *
     * @var integer
     */
    public $tipo_pago_terceros;

    /**
     *
     * @var integer
     */
    public $tipo_segmentacion_id;

    /**
     *
     * @var integer
     */
    public $tipo_recurso;

    /**
     *
     * @var integer
     */
    public $id_resource;

    /**
     *
     * @var string
     */
    public $resource_name;

    /**
     *
     * @var integer
     */
    public $id_company;

    /**
     *
     * @var string
     */
    public $name_company;

    /**
     *
     * @var string
     */
    public $phone_company;

    /**
     *
     * @var string
     */
    public $customer_name;

    /**
     *
     * @var string
     */
    public $customer_email;

    /**
     *
     * @var string
     */
    public $customer_phone;

    /**
     *
     * @var string
     */
    public $status_date;

    /**
     *
     * @var string
     */
    public $activation;

    /**
     *
     * @var integer
     */
    public $night_surcharge;

    /**
     *
     * @var integer
     */
    public $parking_surcharge;

    /**
     *
     * @var string
     */
    public $tags_edit;

    /**
     *
     * @var double
     */
    public $rating;

    /**
     *
     * @var double
     */
    public $rating_distance;

    /**
     *
     * @var double
     */
    public $rating_time;

    /**
     *
     * @var double
     */
    public $rating_client;

    /**
     *
     * @var integer
     */
    public $resolved;

    /**
     * 
     * $night_surcharge
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field uuid
     *
     * @param string $uuid
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Method to set the value of field type_task_id
     *
     * @param integer $type_task_id
     * @return $this
     */
    public function setTypeTaskId($type_task_id)
    {
        $this->type_task_id = $type_task_id;

        return $this;
    }

    /**
     * Method to set the value of field fecha_inicio
     *
     * @param string $fecha_inicio
     * @return $this
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * Method to set the value of field hora_inicio
     *
     * @param string $hora_inicio
     * @return $this
     */
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    /**
     * Method to set the value of field fecha_final
     *
     * @param string $fecha_final
     * @return $this
     */
    public function setFechaFinal($fecha_final)
    {
        $this->fecha_final = $fecha_final;

        return $this;
    }

    /**
     * Method to set the value of field hora_final
     *
     * @param string $hora_final
     * @return $this
     */
    public function setHoraFinal($hora_final)
    {
        $this->hora_final = $hora_final;

        return $this;
    }

    /**
     * Method to set the value of field valor_declarado
     *
     * @param string $valor_declarado
     * @return $this
     */
    public function setValorDeclarado($valor_declarado)
    {
        $this->valor_declarado = $valor_declarado;

        return $this;
    }

    /**
     * Method to set the value of field valor_descuento
     *
     * @param string $valor_descuento
     * @return $this
     */
    public function setValorDescuento($valor_descuento)
    {
        $this->valor_descuento = $valor_descuento;

        return $this;
    }

    /**
     * Method to set the value of field recargo_distancia
     *
     * @param string $recargo_distancia
     * @return $this
     */
    public function setRecargoDistancia($recargo_distancia)
    {
        $this->recargo_distancia = $recargo_distancia;

        return $this;
    }

    /**
     * Method to set the value of field recargo_ida_vuelta
     *
     * @param string $recargo_ida_vuelta
     * @return $this
     */
    public function setRecargoIdaVuelta($recargo_ida_vuelta)
    {
        $this->recargo_ida_vuelta = $recargo_ida_vuelta;

        return $this;
    }

    /**
     * Method to set the value of field recargo_seguro
     *
     * @param string $recargo_seguro
     * @return $this
     */
    public function setRecargoSeguro($recargo_seguro)
    {
        $this->recargo_seguro = $recargo_seguro;

        return $this;
    }

    /**
     * Method to set the value of field valor_total
     *
     * @param string $valor_total
     * @return $this
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    /**
     * Method to set the value of field comision
     *
     * @param string $comision
     * @return $this
     */
    public function setComision($comision)
    {
        $this->comision = $comision;

        return $this;
    }

    /**
     * Method to set the value of field total_otro
     *
     * @param string $total_otro
     * @return $this
     */
    public function setTotalOtro($total_otro)
    {
        $this->total_otro = $total_otro;

        return $this;
    }

    /**
     * Method to set the value of field estado
     *
     * @param integer $estado
     * @return $this
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Method to set the value of field solicitante
     *
     * @param integer $solicitante
     * @return $this
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * Method to set the value of field estado_pago
     *
     * @param integer $estado_pago
     * @return $this
     */
    public function setEstadoPago($estado_pago)
    {
        $this->estado_pago = $estado_pago;

        return $this;
    }

    /**
     * Method to set the value of field type_task_carga_id
     *
     * @param integer $type_task_carga_id
     * @return $this
     */
    public function setTypeTaskCargaId($type_task_carga_id)
    {
        $this->type_task_carga_id = $type_task_carga_id;

        return $this;
    }

    /**
     * Method to set the value of field code_prom
     *
     * @param string $code_prom
     * @return $this
     */
    public function setCodeProm($code_prom)
    {
        $this->code_prom = $code_prom;

        return $this;
    }

    /**
     * Method to set the value of field ciudad_id
     *
     * @param integer $ciudad_id
     * @return $this
     */
    public function setCiudadId($ciudad_id)
    {
        $this->ciudad_id = $ciudad_id;

        return $this;
    }

    /**
     * Method to set the value of field date_created
     *
     * @param string $date_created
     * @return $this
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;

        return $this;
    }

    /**
     * Method to set the value of field date_modify
     *
     * @param string $date_modify
     * @return $this
     */
    public function setDateModify($date_modify)
    {
        $this->date_modify = $date_modify;

        return $this;
    }

    /**
     * Method to set the value of field user_modify
     *
     * @param integer $user_modify
     * @return $this
     */
    public function setUserModify($user_modify)
    {
        $this->user_modify = $user_modify;

        return $this;
    }

    /**
     * Method to set the value of field usercreate
     *
     * @param integer $usercreate
     * @return $this
     */
    public function setUsercreate($usercreate)
    {
        $this->usercreate = $usercreate;

        return $this;
    }

    /**
     * Method to set the value of field distancia
     *
     * @param integer $distancia
     * @return $this
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Method to set the value of field paradas
     *
     * @param integer $paradas
     * @return $this
     */
    public function setParadas($paradas)
    {
        $this->paradas = $paradas;

        return $this;
    }

    /**
     * Method to set the value of field recargo_paradas
     *
     * @param string $recargo_paradas
     * @return $this
     */
    public function setRecargoParadas($recargo_paradas)
    {
        $this->recargo_paradas = $recargo_paradas;

        return $this;
    }

    /**
     * Method to set the value of field ida_vuelta
     *
     * @param integer $ida_vuelta
     * @return $this
     */
    public function setIdaVuelta($ida_vuelta)
    {
        $this->ida_vuelta = $ida_vuelta;

        return $this;
    }

    /**
     * Method to set the value of field term
     *
     * @param integer $term
     * @return $this
     */
    public function setTerm($term)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * Method to set the value of field cc
     *
     * @param string $cc
     * @return $this
     */
    public function setCc($cc)
    {
        $this->cc = $cc;

        return $this;
    }

    /**
     * Method to set the value of field factura
     *
     * @param string $factura
     * @return $this
     */
    public function setFactura($factura)
    {
        $this->factura = $factura;

        return $this;
    }

    /**
     * Method to set the value of field mix
     *
     * @param integer $mix
     * @return $this
     */
    public function setMix($mix)
    {
        $this->mix = $mix;

        return $this;
    }

    /**
     * Method to set the value of field fuente
     *
     * @param integer $fuente
     * @return $this
     */
    public function setFuente($fuente)
    {
        $this->fuente = $fuente;

        return $this;
    }

    /**
     * Method to set the value of field os
     *
     * @param string $os
     * @return $this
     */
    public function setOs($os)
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Method to set the value of field tipo_pago_terceros
     *
     * @param integer $tipo_pago_terceros
     * @return $this
     */
    public function setTipoPagoTerceros($tipo_pago_terceros)
    {
        $this->tipo_pago_terceros = $tipo_pago_terceros;

        return $this;
    }

    /**
     * Method to set the value of field tipo_segmentacion_id
     *
     * @param integer $tipo_segmentacion_id
     * @return $this
     */
    public function setTipoSegmentacionId($tipo_segmentacion_id)
    {
        $this->tipo_segmentacion_id = $tipo_segmentacion_id;

        return $this;
    }

    /**
     * Method to set the value of field tipo_recurso
     *
     * @param integer $tipo_recurso
     * @return $this
     */
    public function setTipoRecurso($tipo_recurso)
    {
        $this->tipo_recurso = $tipo_recurso;

        return $this;
    }

    /**
     * Method to set the value of field id_resource
     *
     * @param integer $id_resource
     * @return $this
     */
    public function setIdResource($id_resource)
    {
        $this->id_resource = $id_resource;

        return $this;
    }

    /**
     * Method to set the value of field resource_name
     *
     * @param string $resource_name
     * @return $this
     */
    public function setResourceName($resource_name)
    {
        $this->resource_name = $resource_name;

        return $this;
    }

    /**
     * Method to set the value of field id_company
     *
     * @param integer $id_company
     * @return $this
     */
    public function setIdCompany($id_company)
    {
        $this->id_company = $id_company;

        return $this;
    }

    /**
     * Method to set the value of field name_company
     *
     * @param string $name_company
     * @return $this
     */
    public function setNameCompany($name_company)
    {
        $this->name_company = $name_company;

        return $this;
    }

    /**
     * Method to set the value of field phone_company
     *
     * @param string $phone_company
     * @return $this
     */
    public function setPhoneCompany($phone_company)
    {
        $this->phone_company = $phone_company;

        return $this;
    }

    /**
     * Method to set the value of field customer_name
     *
     * @param string $customer_name
     * @return $this
     */
    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    /**
     * Method to set the value of field customer_email
     *
     * @param string $customer_email
     * @return $this
     */
    public function setCustomerEmail($customer_email)
    {
        $this->customer_email = $customer_email;

        return $this;
    }

    /**
     * Method to set the value of field customer_phone
     *
     * @param string $customer_phone
     * @return $this
     */
    public function setCustomerPhone($customer_phone)
    {
        $this->customer_phone = $customer_phone;

        return $this;
    }

    /**
     * Method to set the value of field status_date
     *
     * @param string $status_date
     * @return $this
     */
    public function setStatusDate($status_date)
    {
        $this->status_date = $status_date;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Returns the value of field type_task_id
     *
     * @return integer
     */
    public function getTypeTaskId()
    {
        return $this->type_task_id;
    }

    /**
     * Returns the value of field fecha_inicio
     *
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Returns the value of field hora_inicio
     *
     * @return string
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Returns the value of field fecha_final
     *
     * @return string
     */
    public function getFechaFinal()
    {
        return $this->fecha_final;
    }

    /**
     * Returns the value of field hora_final
     *
     * @return string
     */
    public function getHoraFinal()
    {
        return $this->hora_final;
    }

    /**
     * Returns the value of field valor_declarado
     *
     * @return string
     */
    public function getValorDeclarado()
    {
        return $this->valor_declarado;
    }

    /**
     * Returns the value of field valor_descuento
     *
     * @return string
     */
    public function getValorDescuento()
    {
        return $this->valor_descuento;
    }

    /**
     * Returns the value of field recargo_distancia
     *
     * @return string
     */
    public function getRecargoDistancia()
    {
        return $this->recargo_distancia;
    }

    /**
     * Returns the value of field recargo_ida_vuelta
     *
     * @return string
     */
    public function getRecargoIdaVuelta()
    {
        return $this->recargo_ida_vuelta;
    }

    /**
     * Returns the value of field recargo_seguro
     *
     * @return string
     */
    public function getRecargoSeguro()
    {
        return $this->recargo_seguro;
    }

    /**
     * Returns the value of field valor_total
     *
     * @return string
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * Returns the value of field comision
     *
     * @return string
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * Returns the value of field total_otro
     *
     * @return string
     */
    public function getTotalOtro()
    {
        return $this->total_otro;
    }

    /**
     * Returns the value of field estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Returns the value of field solicitante
     *
     * @return integer
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * Returns the value of field estado_pago
     *
     * @return integer
     */
    public function getEstadoPago()
    {
        return $this->estado_pago;
    }

    /**
     * Returns the value of field type_task_carga_id
     *
     * @return integer
     */
    public function getTypeTaskCargaId()
    {
        return $this->type_task_carga_id;
    }

    /**
     * Returns the value of field code_prom
     *
     * @return string
     */
    public function getCodeProm()
    {
        return $this->code_prom;
    }

    /**
     * Returns the value of field ciudad_id
     *
     * @return integer
     */
    public function getCiudadId()
    {
        return $this->ciudad_id;
    }

    /**
     * Returns the value of field date_created
     *
     * @return string
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Returns the value of field date_modify
     *
     * @return string
     */
    public function getDateModify()
    {
        return $this->date_modify;
    }

    /**
     * Returns the value of field user_modify
     *
     * @return integer
     */
    public function getUserModify()
    {
        return $this->user_modify;
    }

    /**
     * Returns the value of field usercreate
     *
     * @return integer
     */
    public function getUsercreate()
    {
        return $this->usercreate;
    }

    /**
     * Returns the value of field distancia
     *
     * @return integer
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * Returns the value of field paradas
     *
     * @return integer
     */
    public function getParadas()
    {
        return $this->paradas;
    }

    /**
     * Returns the value of field recargo_paradas
     *
     * @return string
     */
    public function getRecargoParadas()
    {
        return $this->recargo_paradas;
    }

    /**
     * Returns the value of field ida_vuelta
     *
     * @return integer
     */
    public function getIdaVuelta()
    {
        return $this->ida_vuelta;
    }

    /**
     * Returns the value of field term
     *
     * @return integer
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * Returns the value of field cc
     *
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * Returns the value of field factura
     *
     * @return string
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Returns the value of field mix
     *
     * @return integer
     */
    public function getMix()
    {
        return $this->mix;
    }

    /**
     * Returns the value of field fuente
     *
     * @return integer
     */
    public function getFuente()
    {
        return $this->fuente;
    }

    /**
     * Returns the value of field os
     *
     * @return string
     */
    public function getOs()
    {
        return $this->os;
    }

    /**
     * Returns the value of field tipo_pago_terceros
     *
     * @return integer
     */
    public function getTipoPagoTerceros()
    {
        return $this->tipo_pago_terceros;
    }

    /**
     * Returns the value of field tipo_segmentacion_id
     *
     * @return integer
     */
    public function getTipoSegmentacionId()
    {
        return $this->tipo_segmentacion_id;
    }

    /**
     * Returns the value of field tipo_recurso
     *
     * @return integer
     */
    public function getTipoRecurso()
    {
        return $this->tipo_recurso;
    }

    /**
     * Returns the value of field id_resource
     *
     * @return integer
     */
    public function getIdResource()
    {
        return $this->id_resource;
    }

    /**
     * Returns the value of field resource_name
     *
     * @return string
     */
    public function getResourceName()
    {
        return $this->resource_name;
    }

    /**
     * Returns the value of field id_company
     *
     * @return integer
     */
    public function getIdCompany()
    {
        return $this->id_company;
    }

    /**
     * Returns the value of field name_company
     *
     * @return string
     */
    public function getNameCompany()
    {
        return $this->name_company;
    }

    /**
     * Returns the value of field phone_company
     *
     * @return string
     */
    public function getPhoneCompany()
    {
        return $this->phone_company;
    }

    /**
     * Returns the value of field customer_name
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * Returns the value of field customer_email
     *
     * @return string
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * Returns the value of field customer_phone
     *
     * @return string
     */
    public function getCustomerPhone()
    {
        return $this->customer_phone;
    }

    /**
     * Returns the value of field status_date
     *
     * @return string
     */
    public function getStatusDate()
    {
        return $this->status_date;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->hasMany('id', 'CalificaCalificacion', 'task_id', array('alias' => 'CalificaCalificacion'));
        $this->hasMany('id', 'ClientesTerceros', 'task_id', array('alias' => 'ClientesTerceros'));
        $this->hasMany('id', 'CodePromHistory', 'task_id', array('alias' => 'CodePromHistory'));
        $this->hasMany('id', 'Movimientos', 'task_id', array('alias' => 'Movimientos'));
        $this->hasMany('id', 'TaskHistory', 'task_id', array('alias' => 'TaskHistory'));
        $this->hasMany('id', 'TaskPlaces', 'task_id', array('alias' => 'TaskPlaces'));
        $this->hasMany('id', 'Track', 'task_id', array('alias' => 'Track'));
        $this->belongsTo('id', 'BonusRelaunch', 'task_id', array('alias' => 'BonusRelaunch'));
        $this->belongsTo('id_company', 'Empresas', 'id', array('alias' => 'Empresas'));
        $this->belongsTo('id_resource', 'Recursos', 'tbl_users_id', array('alias' => 'Recursos'));
        $this->belongsTo('ciudad_id', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('solicitante', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('type_task_id', 'TypeTask', 'id', array('alias' => 'TypeTask'));
        $this->belongsTo('type_task_carga_id', 'TypeTaskCarga', 'id', array('alias' => 'TypeTaskCarga'));
        $this->belongsTo('estado_pago', 'TypeTaskPago', 'id', array('alias' => 'TypeTaskPago'));
        $this->belongsTo('estado', 'TypeTaskStatus', 'id', array('alias' => 'TypeTaskStatus'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Task[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Task
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'task';
    }

}
