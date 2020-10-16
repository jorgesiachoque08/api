<?php

class AvailabilityZone extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     */
    public $polygons;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var string
     */
    public $availability_zonecol;

    /**
     *
     * @var string
     */
    public $polygons_text;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_city', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('id_user', 'TblProfiles', 'user_id', array('alias' => 'TblProfiles'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'availability_zone';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityZone[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityZone
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
