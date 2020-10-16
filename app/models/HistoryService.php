<?php

class HistoryService extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $date_create;

    /**
     *
     * @var string
     */
    public $json_content;

    /**
     *
     * @var string
     */
    public $type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('user_create', 'TblProfiles', 'user_id', array('alias' => 'Profile'));
        $this->belongsTo('user_create', 'TblUsers', 'id', array('alias' => 'User'));
        $this->belongsTo('history_type', 'HistoryType', 'id', array('alias' => 'Type'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'history_service';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoryService[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoryService
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
