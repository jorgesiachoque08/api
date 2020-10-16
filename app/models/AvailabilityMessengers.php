<?php

class AvailabilityMessengers extends \Phalcon\Mvc\Model
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
    public $availability_id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var integer
     */
    public $user_create;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('availability_id', 'Availability', 'id', array('alias' => 'Availability'));
        $this->belongsTo('user_create', 'TblUsers', 'id', array('alias' => 'TblUsersCreate'));
        $this->belongsTo('user_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('user_id', 'Recursos', 'tbl_users_id', array('alias' => 'Resources'));
        $this->belongsTo('status', 'AvailabilityMessengersStatus', 'id', array('alias' => 'Status'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'availability_messengers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityMessengers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityMessengers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
