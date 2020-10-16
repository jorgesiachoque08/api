<?php

class CourierWithdrawal extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $id_resource;

    /**
     *
     * @var integer
     */
    protected $value;

    /**
     *
     * @var string
     */
    protected $city;

    /**
     *
     * @var string
     */
    protected $date_create;

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
     * Method to set the value of field value
     *
     * @param integer $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Method to set the value of field city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field date_create
     *
     * @param string $date_create
     * @return $this
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;

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
     * Returns the value of field id_resource
     *
     * @return integer
     */
    public function getIdResource()
    {
        return $this->id_resource;
    }

    /**
     * Returns the value of field value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value of field city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field date_create
     *
     * @return string
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'courier_withdrawal';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CourierWithdrawal[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CourierWithdrawal
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
