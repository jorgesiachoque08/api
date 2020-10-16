<?php

class Empresas extends \Phalcon\Mvc\Model
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
    public $did;

    /**
     *
     * @var integer
     */
    public $verification_digit;

    /**
     *
     * @var string
     */
    public $nombre_empresa;

    /**
     *
     * @var string
     */
    public $email_contacto;

    /**
     *
     * @var string
     */
    public $celular;

    /**
     *
     * @var string
     */
    public $telefono;

    /**
     *
     * @var string
     */
    public $direccion;

    /**
     *
     * @var string
     */
    public $nombre_contacto;

    /**
     *
     * @var integer
     */
    public $active;

    /**
     *
     * @var integer
     */
    public $extension;

    /**
     *
     * @var string
     */
    public $lat;

    /**
     *
     * @var string
     */
    public $long;

    /**
     *
     * @var integer
     */
    public $city_id;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $usercreate;

    /**
     *
     * @var integer
     */
    public $type_task_pago_id;

    /**
     *
     * @var integer
     */
    public $bienestar;

    /**
     *
     * @var string
     */
    public $bienestar_saldo;

    /**
     *
     * @var string
     */
    public $bienestar_descuento;

    /**
     *
     * @var integer
     */
    public $tipo_empresa;

    /**
     *
     * @var string
     */
    public $payment_type;

    /**
     *
     * @var integer
     */
    public $number_employees;

    /**
     *
     * @var integer
     */
    public $salesman;

    /**
     *
     * @var integer
     */
    public $id_category;

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
     * Method to set the value of field nombre_empresa
     *
     * @param string $nombre_empresa
     * @return $this
     */
    public function setNombreEmpresa($nombre_empresa)
    {
        $this->nombre_empresa = $nombre_empresa;

        return $this;
    }

    /**
     * Method to set the value of field email_contacto
     *
     * @param string $email_contacto
     * @return $this
     */
    public function setEmailContacto($email_contacto)
    {
        $this->email_contacto = $email_contacto;

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
     * Method to set the value of field nombre_contacto
     *
     * @param string $nombre_contacto
     * @return $this
     */
    public function setNombreContacto($nombre_contacto)
    {
        $this->nombre_contacto = $nombre_contacto;

        return $this;
    }

    /**
     * Method to set the value of field active
     *
     * @param integer $active
     * @return $this
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Method to set the value of field extension
     *
     * @param integer $extension
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Method to set the value of field lat
     *
     * @param string $lat
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Method to set the value of field long
     *
     * @param string $long
     * @return $this
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Method to set the value of field city_id
     *
     * @param integer $city_id
     * @return $this
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;

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
     * Method to set the value of field type_task_pago_id
     *
     * @param integer $type_task_pago_id
     * @return $this
     */
    public function setTypeTaskPagoId($type_task_pago_id)
    {
        $this->type_task_pago_id = $type_task_pago_id;

        return $this;
    }

    /**
     * Method to set the value of field bienestar
     *
     * @param integer $bienestar
     * @return $this
     */
    public function setBienestar($bienestar)
    {
        $this->bienestar = $bienestar;

        return $this;
    }

    /**
     * Method to set the value of field bienestar_saldo
     *
     * @param string $bienestar_saldo
     * @return $this
     */
    public function setBienestarSaldo($bienestar_saldo)
    {
        $this->bienestar_saldo = $bienestar_saldo;

        return $this;
    }

    /**
     * Method to set the value of field bienestar_descuento
     *
     * @param string $bienestar_descuento
     * @return $this
     */
    public function setBienestarDescuento($bienestar_descuento)
    {
        $this->bienestar_descuento = $bienestar_descuento;

        return $this;
    }

    /**
     * Method to set the value of field tipo_empresa
     *
     * @param integer $tipo_empresa
     * @return $this
     */
    public function setTipoEmpresa($tipo_empresa)
    {
        $this->tipo_empresa = $tipo_empresa;

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
     * Returns the value of field did
     *
     * @return string
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Returns the value of field nombre_empresa
     *
     * @return string
     */
    public function getNombreEmpresa()
    {
        return $this->nombre_empresa;
    }

    /**
     * Returns the value of field email_contacto
     *
     * @return string
     */
    public function getEmailContacto()
    {
        return $this->email_contacto;
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
     * Returns the value of field telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
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
     * Returns the value of field nombre_contacto
     *
     * @return string
     */
    public function getNombreContacto()
    {
        return $this->nombre_contacto;
    }

    /**
     * Returns the value of field active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Returns the value of field extension
     *
     * @return integer
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Returns the value of field lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Returns the value of field long
     *
     * @return string
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Returns the value of field city_id
     *
     * @return integer
     */
    public function getCityId()
    {
        return $this->city_id;
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
     * Returns the value of field usercreate
     *
     * @return integer
     */
    public function getUsercreate()
    {
        return $this->usercreate;
    }

    /**
     * Returns the value of field type_task_pago_id
     *
     * @return integer
     */
    public function getTypeTaskPagoId()
    {
        return $this->type_task_pago_id;
    }

    /**
     * Returns the value of field bienestar
     *
     * @return integer
     */
    public function getBienestar()
    {
        return $this->bienestar;
    }

    /**
     * Returns the value of field bienestar_saldo
     *
     * @return string
     */
    public function getBienestarSaldo()
    {
        return $this->bienestar_saldo;
    }

    /**
     * Returns the value of field bienestar_descuento
     *
     * @return string
     */
    public function getBienestarDescuento()
    {
        return $this->bienestar_descuento;
    }

    /**
     * Returns the value of field tipo_empresa
     *
     * @return integer
     */
    public function getTipoEmpresa()
    {
        return $this->tipo_empresa;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->skipAttributes(
            ['telefono']
        );

        $this->belongsTo('id', 'EmpresasParam', 'empresas_id', array('alias' => 'EmpresasParam'));
        $this->hasMany('id', 'EmpresasPreciosServicio', 'empresas_id', array('alias' => 'EmpresasPreciosServicio'));
        $this->hasMany('id', 'Movimientos', 'empresas_id', array('alias' => 'Movimientos'));
        $this->hasMany('id', 'TblUsers', 'empresas_id', array('alias' => 'TblUsers'));
        $this->belongsTo('city_id', 'City', 'id', array('alias' => 'City'));
        $this->belongsTo('type_task_pago_id', 'TypeTaskPago', 'id', array('alias' => 'TypeTaskPago'));
        
        $this->belongsTo('id_category', 'CategoryCompany', 'id', array('alias' => 'CategoryCompany'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Empresas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Empresas
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
        return 'empresas';
    }

}
