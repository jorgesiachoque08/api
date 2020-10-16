<?php

class LogAliados extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $log;

    /**
     *
     * @var integer
     */
    public $type;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var string
     */
    public $result;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'log_aliados';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogAliados[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogAliados
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
