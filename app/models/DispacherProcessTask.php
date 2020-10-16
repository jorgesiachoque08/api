<?php

class DispacherProcessTask extends \Phalcon\Mvc\Model
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
    public $id_resource;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var integer
     */
    public $id_status;

    /**
     *
     * @var integer
     */
    public $id_availability;

    /**
     *
     * @var string
     */
    public $datacreate;

    /**
     *
     * @var integer
     */
    public $count_task;

    /**
     *
     * @var string
     */
    public $date;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_status', 'DispacherStatusTask', 'id', array('alias' => 'DispacherStatusTask'));
        $this->belongsTo('id_resource', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DispacherProcessTask[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DispacherProcessTask
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
        return 'dispacher_process_task';
    }

}
