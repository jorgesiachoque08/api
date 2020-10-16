<?php

class TaskPlacessl extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $tipo_task_places;

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
     * @var string
     */
    public $address;

    /**
     *
     * @var string
     */
    public $direccion;

    /**
     *
     * @var integer
     */
    public $postcode;

    /**
     *
     * @var string
     */
    public $localidad;

    /**
     *
     * @var string
     */
    public $neighborhood;

    /**
     *
     * @var string
     */
    public $ciudad;

    /**
     *
     * @var string
     */
    public $estado;

    /**
     *
     * @var string
     */
    public $pais;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var integer
     */
    public $estado_p;

    /**
     *
     * @var integer
     */
    public $valor_compra;

    /**
     *
     * @var string
     */
    public $client_name;

    /**
     *
     * @var string
     */
    public $client_phone;

    /**
     *
     * @var string
     */
    public $client_email;

    /**
     *
     * @var integer
     */
    public $paiment_type;

    /**
     *
     * @var integer
     */
    public $products_value;

    /**
     *
     * @var integer
     */
    public $domicile_value;

    /**
     *
     * @var string
     */
    public $order_id;

    /**
     *
     * @var string
     */
    public $document;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var integer
     */
    public $type;

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
     * Method to set the value of field tipo_task_places
     *
     * @param integer $tipo_task_places
     * @return $this
     */
    public function setTipoTaskPlaces($tipo_task_places)
    {
        $this->tipo_task_places = $tipo_task_places;

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
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Method to set the value of field postcode
     *
     * @param integer $postcode
     * @return $this
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Method to set the value of field localidad
     *
     * @param string $localidad
     * @return $this
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Method to set the value of field neighborhood
     *
     * @param string $neighborhood
     * @return $this
     */
    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    /**
     * Method to set the value of field ciudad
     *
     * @param string $ciudad
     * @return $this
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Method to set the value of field estado
     *
     * @param string $estado
     * @return $this
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Method to set the value of field pais
     *
     * @param string $pais
     * @return $this
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

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
     * Method to set the value of field task_id
     *
     * @param integer $task_id
     * @return $this
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;

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
     * Method to set the value of field estado_p
     *
     * @param integer $estado_p
     * @return $this
     */
    public function setEstadoP($estado_p)
    {
        $this->estado_p = $estado_p;

        return $this;
    }

    /**
     * Method to set the value of field valor_compra
     *
     * @param integer $valor_compra
     * @return $this
     */
    public function setValorCompra($valor_compra)
    {
        $this->valor_compra = $valor_compra;

        return $this;
    }

    /**
     * Method to set the value of field client_name
     *
     * @param string $client_name
     * @return $this
     */
    public function setClientName($client_name)
    {
        $this->client_name = $client_name;

        return $this;
    }

    /**
     * Method to set the value of field client_phone
     *
     * @param string $client_phone
     * @return $this
     */
    public function setClientPhone($client_phone)
    {
        $this->client_phone = $client_phone;

        return $this;
    }

    /**
     * Method to set the value of field client_email
     *
     * @param string $client_email
     * @return $this
     */
    public function setClientEmail($client_email)
    {
        $this->client_email = $client_email;

        return $this;
    }

    /**
     * Method to set the value of field paiment_type
     *
     * @param integer $paiment_type
     * @return $this
     */
    public function setPaimentType($paiment_type)
    {
        $this->paiment_type = $paiment_type;

        return $this;
    }

    /**
     * Method to set the value of field products_value
     *
     * @param integer $products_value
     * @return $this
     */
    public function setProductsValue($products_value)
    {
        $this->products_value = $products_value;

        return $this;
    }

    /**
     * Method to set the value of field domicile_value
     *
     * @param integer $domicile_value
     * @return $this
     */
    public function setDomicileValue($domicile_value)
    {
        $this->domicile_value = $domicile_value;

        return $this;
    }

    /**
     * Method to set the value of field order_id
     *
     * @param string $order_id
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Method to set the value of field document
     *
     * @param string $document
     * @return $this
     */
    public function setDocument($document)
    {
        $this->document = $document;

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
     * Returns the value of field tipo_task_places
     *
     * @return integer
     */
    public function getTipoTaskPlaces()
    {
        return $this->tipo_task_places;
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
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
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
     * Returns the value of field postcode
     *
     * @return integer
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Returns the value of field localidad
     *
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Returns the value of field neighborhood
     *
     * @return string
     */
    public function getNeighborhood()
    {
        return $this->neighborhood;
    }

    /**
     * Returns the value of field ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Returns the value of field estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Returns the value of field pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
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
     * Returns the value of field task_id
     *
     * @return integer
     */
    public function getTaskId()
    {
        return $this->task_id;
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
     * Returns the value of field estado_p
     *
     * @return integer
     */
    public function getEstadoP()
    {
        return $this->estado_p;
    }

    /**
     * Returns the value of field valor_compra
     *
     * @return integer
     */
    public function getValorCompra()
    {
        return $this->valor_compra;
    }

    /**
     * Returns the value of field client_name
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->client_name;
    }

    /**
     * Returns the value of field client_phone
     *
     * @return string
     */
    public function getClientPhone()
    {
        return $this->client_phone;
    }

    /**
     * Returns the value of field client_email
     *
     * @return string
     */
    public function getClientEmail()
    {
        return $this->client_email;
    }

    /**
     * Returns the value of field paiment_type
     *
     * @return integer
     */
    public function getPaimentType()
    {
        return $this->paiment_type;
    }

    /**
     * Returns the value of field products_value
     *
     * @return integer
     */
    public function getProductsValue()
    {
        return $this->products_value;
    }

    /**
     * Returns the value of field domicile_value
     *
     * @return integer
     */
    public function getDomicileValue()
    {
        return $this->domicile_value;
    }

    /**
     * Returns the value of field order_id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Returns the value of field document
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setReadConnectionService("db_read");
        $this->setWriteConnectionService("db");
        
        $this->hasMany('id', 'Products', 'task_place', array('alias' => 'Products'));
        $this->hasMany('id', 'TaskHistory', 'task_places_id', array('alias' => 'TaskHistory'));
        $this->hasMany('id', 'Track', 'task_places_id', array('alias' => 'Track'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskPlaces[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskPlaces
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
        return 'task_places';
    }

}
