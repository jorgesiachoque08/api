<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Solicitudes extends \Phalcon\Mvc\Model
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
    public $email;

    /**
     *
     * @var string
     */
    public $telefono;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var string
     */
    public $telefono_fijo;

    /**
     *
     * @var string
     */
    public $empresa;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var integer
     */
    public $fuentes_id;

    /**
     *
     * @var integer
     */
    public $mv_leads_id;

    /**
     *
     * @var integer
     */
    public $tbl_users_id;

    /**
     *
     * @var integer
     */
    public $ciudad;

    /**
     *
     * @var string
     */
    public $como;

    /**
     *
     * @var string
     */
    public $uuid;

    /**
     *
     * @var string
     */
    public $nombre_empresa;

    /**
     *
     * @var string
     */
    public $lead_source;

    /**
     *
     * @var string
     */
    public $industria;

    /**
     *
     * @var integer
     */
    public $numero_empleados;

    /**
     *
     * @var string
     */
    public $utm_campaing;

    /**
     *
     * @var string
     */
    public $utm_source;

    /**
     *
     * @var string
     */
    public $utm_medium;

    /**
     *
     * @var string
     */
    public $utm_term;

    /**
     *
     * @var string
     */
    public $utm_content;

    /**
     *
     * @var integer
     */
    public $agente_;

    /**
     *
     * @var string
     */
    public $date_modify;

    /**
     *
     * @var integer
     */
    public $estado;

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
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

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
     * Method to set the value of field empresa
     *
     * @param string $empresa
     * @return $this
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

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
     * Method to set the value of field fuentes_id
     *
     * @param integer $fuentes_id
     * @return $this
     */
    public function setFuentesId($fuentes_id)
    {
        $this->fuentes_id = $fuentes_id;

        return $this;
    }

    /**
     * Method to set the value of field mv_leads_id
     *
     * @param integer $mv_leads_id
     * @return $this
     */
    public function setMvLeadsId($mv_leads_id)
    {
        $this->mv_leads_id = $mv_leads_id;

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
     * Method to set the value of field ciudad
     *
     * @param integer $ciudad
     * @return $this
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Method to set the value of field como
     *
     * @param string $como
     * @return $this
     */
    public function setComo($como)
    {
        $this->como = $como;

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
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Returns the value of field datecreate
     *
     * @return string
     */
    public function getDatecreate()
    {
        return $this->datecreate;
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
     * Returns the value of field empresa
     *
     * @return string
     */
    public function getEmpresa()
    {
        return $this->empresa;
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
     * Returns the value of field fuentes_id
     *
     * @return integer
     */
    public function getFuentesId()
    {
        return $this->fuentes_id;
    }

    /**
     * Returns the value of field mv_leads_id
     *
     * @return integer
     */
    public function getMvLeadsId()
    {
        return $this->mv_leads_id;
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
     * Returns the value of field ciudad
     *
     * @return integer
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Returns the value of field como
     *
     * @return string
     */
    public function getComo()
    {
        return $this->como;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'MvAcciones', 'solicitudes_id', array('alias' => 'MvAcciones'));
        $this->belongsTo('fuentes_id', 'MvFuentes', 'id', array('alias' => 'MvFuentes'));
        $this->belongsTo('mv_leads_id', 'MvLeads', 'id', array('alias' => 'MvLeads'));
        $this->belongsTo('tbl_users_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Solicitudes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Solicitudes
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
        return 'solicitudes';
    }

}
