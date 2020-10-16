<?php

class Viewavailabilityzone extends \Phalcon\Mvc\Model
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
    public $id_city;

    /**
     *
     * @var string
     */
    public $city;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $polygons1;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $user_created;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var string
     */
    public $polygons;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("ViewAvailabilityZone");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ViewAvailabilityZone';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Viewavailabilityzone[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Viewavailabilityzone
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
