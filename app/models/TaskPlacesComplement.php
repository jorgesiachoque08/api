<?php

class TaskPlacesComplement extends \Phalcon\Mvc\Model
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
    public $id_task;

    /**
     *
     * @var integer
     */
    public $id_task_place;

    /**
     *
     * @var integer
     */
    public $evidence;

    /**
     *
     * @var string
     */
    public $evidence_messaje;

    /**
     *
     * @var integer
     */
    public $finished_status;

    /**
     *
     * @var integer
     */
    public $finished_type;

    /**
     *
     * @var string
     */
    public $finished_description;

    /**
     *
     * @var integer
     */
    public $status_code;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_task_place', 'TaskPlaces', 'id', array('alias' => 'TaskPlaces'));
        $this->belongsTo('finished_type', 'FinishReason', 'id', array('alias' => 'FinishReason'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskPlacesComplement[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskPlacesComplement
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
        return 'task_places_complement';
    }

}
