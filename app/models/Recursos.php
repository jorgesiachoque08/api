<?php

class Recursos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var string
     */
    public $nombres;

    /**
     *
     * @var string
     */
    public $apellidos;

    /**
     *
     * @var string
     */
    public $volumen;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var integer
     */
    public $type_recurso_id;

    /**
     *
     * @var string
     */
    public $fecha_nacimiento;

    /**
     *
     * @var string
     */
    public $did;

    /**
     *
     * @var string
     */
    public $url_foto;

    /**
     *
     * @var string
     */
    public $url_cedula;

    /**
     *
     * @var string
     */
    public $url_pase;

    /**
     *
     * @var string
     */
    public $url_eps;

    /**
     *
     * @var string
     */
    public $url_rut;

    /**
     *
     * @var string
     */
    public $url_soat;

    /**
     *
     * @var string
     */
    public $url_manipulacion_alimentos;

    /**
     *
     * @var string
     */
    public $url_property_card;

    /**
     *
     * @var string
     */
    public $url_public_receipt;

    /**
     *
     * @var string
     */
    public $url_tecnomecanica;

    /**
     *
     * @var string
     */
    public $telefono;

    /**
     *
     * @var string
     */
    public $celular;

    /**
     *
     * @var string
     */
    public $celular_2;

    /**
     *
     * @var string
     */
    public $celular_daviplata;

    /**
     *
     * @var string
     */
    public $direccion;

    /**
     *
     * @var string
     */
    public $placa;

    /**
     *
     * @var integer
     */
    public $usercreate;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var string
     */
    public $datemodify;

    /**
     *
     * @var integer
     */
    public $tbl_users_id;

    /**
     *
     * @var integer
     */
    public $ciudad_id;

    /**
     *
     * @var integer
     */
    public $estado_recurso;

    /**
     *
     * @var integer
     */
    public $domiciliario;

    /**
     *
     * @var integer
     */
    public $corporativo;

    /**
     *
     * @var integer
     */
    public $ecommerce;

    /**
     *
     * @var integer
     */
    public $vip;

    /**
     *
     * @var integer
     */
    public $ss;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $activacion;

    /**
     *
     * @var string
     */
    public $activacion_lugar;

    /**
     *
     * @var integer
     */
    public $company_id;

    /**
     *
     * @var string
     */
    public $date_status_end;

    /**
     *
     * @var integer
     */
    public $cell_type;

    /**
     *
     * @var integer
     */
    public $eps;

    /**
     *
     * @var integer
     */
    public $origin;

    /**
     *
     * @var integer
     */
    public $service_time;

    /**
     *
     * @var integer
     */
    public $informed;

    /**
     *
     * @var integer
     */
    public $in_availability;

    /**
     *
     * @var integer
     */
    public $elite_group;

    /**
     *
     * @var integer
     */
    public $erp_id;

    /**
     *
     * @var integer
     */
    public $km_week;

    /**
     *
     * @var integer
     */
    public $km_weekend;

    /**
     *
     * @var integer
     */
    public $km_total;

    /**
     *
     * @var string
     */
    public $imei;

    /**
     *
     * @var string
     */
    public $device_model;

    /**
     *
     * @var integer
     */
    public $cash_work;

    /**
     *
     * @var integer
     */
    public $experience;

    /**
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
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Method to set the value of field volumen
     *
     * @param string $volumen
     * @return $this
     */
    public function setVolumen($volumen)
    {
        $this->volumen = $volumen;

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
     * Method to set the value of field type_recurso_id
     *
     * @param integer $type_recurso_id
     * @return $this
     */
    public function setTypeRecursoId($type_recurso_id)
    {
        $this->type_recurso_id = $type_recurso_id;

        return $this;
    }

    /**
     * Method to set the value of field fecha_nacimiento
     *
     * @param string $fecha_nacimiento
     * @return $this
     */
    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;

        return $this;
    }

    /**
     * Method to set the value of field did
     *
     * @param string $did
     * @return $this
     */
    public function setDid($did)
    {
        $this->did = $did;

        return $this;
    }

    /**
     * Method to set the value of field url_cedula
     *
     * @param string $url_cedula
     * @return $this
     */
    public function setUrlCedula($url_cedula)
    {
        $this->url_cedula = $url_cedula;

        return $this;
    }

    /**
     * Method to set the value of field url_pase
     *
     * @param string $url_pase
     * @return $this
     */
    public function setUrlPase($url_pase)
    {
        $this->url_pase = $url_pase;

        return $this;
    }

    /**
     * Method to set the value of field url_rut
     *
     * @param string $url_rut
     * @return $this
     */
    public function setUrlRut($url_rut)
    {
        $this->url_rut = $url_rut;

        return $this;
    }

    /**
     * Method to set the value of field url_foto
     *
     * @param string $url_foto
     * @return $this
     */
    public function setUrlFoto($url_foto)
    {
        $this->url_foto = $url_foto;

        return $this;
    }

    /**
     * Method to set the value of field telefono
     *
     * @param string $telefono
     * @return $this
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Method to set the value of field celular
     *
     * @param string $celular
     * @return $this
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Method to set the value of field direccion
     *
     * @param string $direccion
     * @return $this
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Method to set the value of field placa
     *
     * @param string $placa
     * @return $this
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;

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
     * Method to set the value of field datecreate
     *
     * @param string $datecreate
     * @return $this
     */
    public function setDatecreate($datecreate)
    {
        $this->datecreate = $datecreate;

        return $this;
    }

    /**
     * Method to set the value of field datemodify
     *
     * @param string $datemodify
     * @return $this
     */
    public function setDatemodify($datemodify)
    {
        $this->datemodify = $datemodify;

        return $this;
    }

    /**
     * Method to set the value of field tbl_users_id
     *
     * @param integer $tbl_users_id
     * @return $this
     */
    public function setTblUsersId($tbl_users_id)
    {
        $this->tbl_users_id = $tbl_users_id;

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
     * Method to set the value of field estado_recurso
     *
     * @param integer $estado_recurso
     * @return $this
     */
    public function setEstadoRecurso($estado_recurso)
    {
        $this->estado_recurso = $estado_recurso;

        return $this;
    }

    /**
     * Method to set the value of field domiciliario
     *
     * @param integer $domiciliario
     * @return $this
     */
    public function setDomiciliario($domiciliario)
    {
        $this->domiciliario = $domiciliario;

        return $this;
    }

    /**
     * Method to set the value of field corporativo
     *
     * @param integer $corporativo
     * @return $this
     */
    public function setCorporativo($corporativo)
    {
        $this->corporativo = $corporativo;

        return $this;
    }

    /**
     * Method to set the value of field ecommerce
     *
     * @param integer $ecommerce
     * @return $this
     */
    public function setEcommerce($ecommerce)
    {
        $this->ecommerce = $ecommerce;

        return $this;
    }

    /**
     * Method to set the value of field vip
     *
     * @param integer $vip
     * @return $this
     */
    public function setVip($vip)
    {
        $this->vip = $vip;

        return $this;
    }

    /**
     * Method to set the value of field ss
     *
     * @param integer $ss
     * @return $this
     */
    public function setSs($ss)
    {
        $this->ss = $ss;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

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
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field volumen
     *
     * @return string
     */
    public function getVolumen()
    {
        return $this->volumen;
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
     * Returns the value of field type_recurso_id
     *
     * @return integer
     */
    public function getTypeRecursoId()
    {
        return $this->type_recurso_id;
    }

    /**
     * Returns the value of field fecha_nacimiento
     *
     * @return string
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Returns the value of field did
     *
     * @return string
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Returns the value of field url_cedula
     *
     * @return string
     */
    public function getUrlCedula()
    {
        return $this->url_cedula;
    }

    /**
     * Returns the value of field url_pase
     *
     * @return string
     */
    public function getUrlPase()
    {
        return $this->url_pase;
    }

    /**
     * Returns the value of field url_rut
     *
     * @return string
     */
    public function getUrlRut()
    {
        return $this->url_rut;
    }

    /**
     * Returns the value of field url_foto
     *
     * @return string
     */
    public function getUrlFoto()
    {
        return $this->url_foto;
    }

    /**
     * Returns the value of field telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Returns the value of field celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Returns the value of field direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Returns the value of field placa
     *
     * @return string
     */
    public function getPlaca()
    {
        return $this->placa;
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
     * Returns the value of field datecreate
     *
     * @return string
     */
    public function getDatecreate()
    {
        return $this->datecreate;
    }

    /**
     * Returns the value of field datemodify
     *
     * @return string
     */
    public function getDatemodify()
    {
        return $this->datemodify;
    }

    /**
     * Returns the value of field tbl_users_id
     *
     * @return integer
     */
    public function getTblUsersId()
    {
        return $this->tbl_users_id;
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
     * Returns the value of field estado_recurso
     *
     * @return integer
     */
    public function getEstadoRecurso()
    {
        return $this->estado_recurso;
    }

    /**
     * Returns the value of field domiciliario
     *
     * @return integer
     */
    public function getDomiciliario()
    {
        return $this->domiciliario;
    }

    /**
     * Returns the value of field corporativo
     *
     * @return integer
     */
    public function getCorporativo()
    {
        return $this->corporativo;
    }

    /**
     * Returns the value of field ecommerce
     *
     * @return integer
     */
    public function getEcommerce()
    {
        return $this->ecommerce;
    }

    /**
     * Returns the value of field vip
     *
     * @return integer
     */
    public function getVip()
    {
        return $this->vip;
    }

    /**
     * Returns the value of field ss
     *
     * @return integer
     */
    public function getSs()
    {
        return $this->ss;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'RecursoCaracteristica', 'recurso_id', array('alias' => 'RecursoCaracteristica'));
        $this->belongsTo('ciudad_id', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('tbl_users_id', 'TblUsers', 'id', array('alias' => 'TblUsers1'));
        $this->belongsTo('usercreate', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('type_recurso_id', 'TypeRecurso', 'id', array('alias' => 'TypeRecurso'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recursos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Recursos
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
        return 'recursos';
    }

}
