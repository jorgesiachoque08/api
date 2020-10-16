<?php

class TagsTask extends \Phalcon\Mvc\Model
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
    public $task_history_id;

    /**
     *
     * @var integer
     */
    public $task_place_id;

    /**
     *
     * @var integer
     */
    public $tags_id;

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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('task_place_id', 'TaskPlaces', 'id', array('alias' => 'TaskPlaces'));
        $this->belongsTo('tags_id', 'Tags', 'id', array('alias' => 'Tags'));
        $this->belongsTo('task_history_id', 'TaskHistory', 'id', array('alias' => 'TaskHistory'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('user_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tags_task';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TagsTask[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TagsTask
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
