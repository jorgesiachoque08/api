<?php

class NearbyCity extends \Phalcon\Mvc\Model
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
    public $citybase;

    /**
     *
     * @var string
     */
    public $nearby_city;

    /**
     *
     * @var integer
     */
    public $type;

    /**
     *
     * @var integer
     */
    public $recharge;

    /**
     *
     * @var string
     */
    public $address_base;

    /**
     *
     * @var string
     */
    public $name_geoapps;

    /**
     *
     * @var integer
     */
    public $id_city;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $status_domis;

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
     * Method to set the value of field citybase
     *
     * @param string $citybase
     * @return $this
     */
    public function setCitybase($citybase)
    {
        $this->citybase = $citybase;

        return $this;
    }

    /**
     * Method to set the value of field nearby_city
     *
     * @param string $nearby_city
     * @return $this
     */
    public function setNearbyCity($nearby_city)
    {
        $this->nearby_city = $nearby_city;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param integer $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field Recharge
     *
     * @param integer $Recharge
     * @return $this
     */
    public function setRecharge($Recharge)
    {
        $this->Recharge = $Recharge;

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
     * Returns the value of field citybase
     *
     * @return string
     */
    public function getCitybase()
    {
        return $this->citybase;
    }

    /**
     * Returns the value of field nearby_city
     *
     * @return string
     */
    public function getNearbyCity()
    {
        return $this->nearby_city;
    }

    /**
     * Returns the value of field type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field Recharge
     *
     * @return integer
     */
    public function getRecharge()
    {
        return $this->Recharge;
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NearbyCity[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NearbyCity
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
        return 'nearby_city';
    }

}
