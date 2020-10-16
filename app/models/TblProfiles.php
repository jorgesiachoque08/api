<?php

class TblProfiles extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $first_name;

    /**
     *
     * @var string
     */
    public $last_name;

    /**
     *
     * @var integer
     */
    public $tipo_usuario;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var integer
     */
    public $city_ip;

    /**
     *
     * @var string
     */
    public $did;

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
    public $telefono_fijo;

    /**
     *
     * @var string
     */
    public $placa;

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field first_name
     *
     * @param string $first_name
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Method to set the value of field last_name
     *
     * @param string $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Method to set the value of field tipo_usuario
     *
     * @param integer $tipo_usuario
     * @return $this
     */
    public function setTipoUsuario($tipo_usuario)
    {
        $this->tipo_usuario = $tipo_usuario;

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
     * Method to set the value of field city_ip
     *
     * @param integer $city_ip
     * @return $this
     */
    public function setCityIp($city_ip)
    {
        $this->city_ip = $city_ip;

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
     * Method to set the value of field telefono_fijo
     *
     * @param string $telefono_fijo
     * @return $this
     */
    public function setTelefonoFijo($telefono_fijo)
    {
        $this->telefono_fijo = $telefono_fijo;

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
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field first_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Returns the value of field last_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Returns the value of field tipo_usuario
     *
     * @return integer
     */
    public function getTipoUsuario()
    {
        return $this->tipo_usuario;
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
     * Returns the value of field city_ip
     *
     * @return integer
     */
    public function getCityIp()
    {
        return $this->city_ip;
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
     * Returns the value of field telefono_fijo
     *
     * @return string
     */
    public function getTelefonoFijo()
    {
        return $this->telefono_fijo;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('city_ip', 'Ciudad', 'id', array('alias' => 'Ciudad'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TblProfiles[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TblProfiles
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
        return 'tbl_profiles';
    }

}
