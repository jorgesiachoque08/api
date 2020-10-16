<?php

class HistoryMinutes extends \Phalcon\Mvc\Model
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
    public $courier_id;

    /**
     *
     * @var integer
     */
    public $minute_id;

    /**
     *
     * @var string
     */
    public $action;

    /**
     *
     * @var integer
     */
    public $user_create;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'history_minutes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoryMinutes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return HistoryMinutes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
