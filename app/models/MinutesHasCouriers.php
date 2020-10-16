<?php

class MinutesHasCouriers extends \Phalcon\Mvc\Model
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
    public $minutes_id;

    /**
     *
     * @var integer
     */
    public $couriers_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('couriers_id', 'Recursos', 'tbl_users_id', array('alias' => 'Recursos'));
        $this->belongsTo('minutes_id', 'Minutes', 'id', array('alias' => 'Minutes'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'minutes_has_couriers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MinutesHasCouriers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MinutesHasCouriers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
