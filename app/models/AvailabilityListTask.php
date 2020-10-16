<?php

class AvailabilityListTask extends \Phalcon\Mvc\Model
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
    public $task_id;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('availability_id', 'Availability', 'id', array('alias' => 'Availability'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'availability_list_task';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityListTask[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityListTask
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
