<?php

class Ciudad extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $country_id;

    /**
     *
     * @var string
     */
    public $iso;

    /**
     *
     * @var string
     */
    public $name_geoapps;

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
    public $phone;

    /**
     *
     * @var string
     */
    public $indicative;

    /**
     *
     * @var integer
     */
    public $status;

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
     * Method to set the value of field country_id
     *
     * @param integer $country_id
     * @return $this
     */
    public function setCountryId($country_id)
    {
        $this->country_id = $country_id;

        return $this;
    }

    /**
     * Method to set the value of field iso
     *
     * @param string $iso
     * @return $this
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Method to set the value of field name_geoapps
     *
     * @param string $name_geoapps
     * @return $this
     */
    public function setNameGeoapps($name_geoapps)
    {
        $this->name_geoapps = $name_geoapps;

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
     * Returns the value of field country_id
     *
     * @return integer
     */
    public function getCountryId()
    {
        return $this->country_id;
    }

    /**
     * Returns the value of field iso
     *
     * @return string
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Returns the value of field name_geoapps
     *
     * @return string
     */
    public function getNameGeoapps()
    {
        return $this->name_geoapps;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Recursos', 'ciudad_id', array('alias' => 'Recursos'));
        $this->hasMany('id', 'Task', 'ciudad_id', array('alias' => 'Task'));
        $this->hasMany('id', 'TypeTaskCity', 'id_city', array('alias' => 'TypeTaskCity'));
        $this->hasMany('id', 'NearbyCity', 'id_city', array('alias' => 'NearbyCity'));
        
        $this->belongsTo('country_id', 'Country', 'id', array('alias' => 'Country'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ciudad[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ciudad
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
        return 'ciudad';
    }

}
