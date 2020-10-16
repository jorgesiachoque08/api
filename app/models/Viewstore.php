<?php

class Viewstore extends \Phalcon\Mvc\Model
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
    public $id_point_client;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var integer
     */
    public $id_company;

    /**
     *
     * @var integer
     */
    public $id_city;

    /**
     *
     * @var integer
     */
    public $parking;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $schedule;

    /**
     *
     * @var integer
     */
    public $id_user_created;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $company;

    /**
     *
     * @var string
     */
    public $city;

    /**
     *
     * @var string
     */
    public $user_created;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("ViewStore");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ViewStore';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Viewstore[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Viewstore
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
