<?php

class Availability extends \Phalcon\Mvc\Model
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
    public $city;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var string
     */
    public $start_date;

    /**
     *
     * @var string
     */
    public $end_date;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $minimum_guaranteed;

    /**
     *
     * @var integer
     */
    public $acceptance_rate;

    /**
     *
     * @var integer
     */
    public $equipment;

    /**
     *
     * @var integer
     */
    public $total_positions;

    /**
     *
     * @var integer
     */
    public $occupied_positions;

    /**
     *
     * @var integer
     */
    public $active_messaging;

    /**
     *
     * @var integer
     */
    public $custom_hour_rate;

    /**
     *
     * @var integer
     */
    public $wait_time;

    /**
     *
     * @var string
     */
    public $scheduled_date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {

        $this->hasMany('id', 'AvailabilityMessengers', 'availability_id', array('alias' => 'AvailabilityMessengers'));
        $this->hasMany('id', 'AvailabilitySites', 'availability_id', array('alias' => 'AvailabilitySites'));
        $this->belongsTo('city', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('equipment', 'TypeCaracteristicaRecursos', 'id', array('alias' => 'TypeCaracteristicaRecursos'));
        $this->belongsTo('status', 'AvailabilityStatus', 'id', array('alias' => 'AvailabilityStatus'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'availability';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Availability[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Availability
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
