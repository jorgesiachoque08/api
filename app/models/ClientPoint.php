<?php

class ClientPoint extends \Phalcon\Mvc\Model
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
    public $id_company;

    /**
     *
     * @var string
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
     * @var string
     */
    public $address_iso;

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
    public $id_city;

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
    public $schedule;

    /**
     *
     * @var integer
     */
    public $parking;

    /**
     *
     * @var integer
     */
    public $user_create;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $geo_city;

    /**
     *
     * @var integer
     */
    public $id_nearby_city;

    /**
     *
     * @var string
     */
    public $schedule_json;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_city', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('id_company', 'Empresas', 'id', array('alias' => 'Empresas'));
        $this->belongsTo('user_create', 'TblProfiles', 'user_id', array('alias' => 'TblProfiles'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClientPoint[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ClientPoint
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
        return 'client_point';
    }

}
