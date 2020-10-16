<?php

class TaskDetail extends \Phalcon\Mvc\Model
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
    public $task_id;

    /**
     *
     * @var integer
     */
    public $ss;

    /**
     *
     * @var integer
     */
    public $is_vip;

    /**
     *
     * @var integer
     */
    public $id_resource;

    /**
     *
     * @var integer
     */
    public $emailassignment;

    /**
     *
     * @var string
     */
    public $tracking_number;

    /**
     *
     * @var integer
     */
    public $place_number;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskDetail[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskDetail
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
        return 'task_detail';
    }

}
