<?php

class LogTaskHistory extends \Phalcon\Mvc\Model
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
    public $type_task_status_id;

    /**
     *
     * @var integer
     */
    public $recurso_id;

    /**
     *
     * @var integer
     */
    public $type_task_pago_id;

    /**
     *
     * @var string
     */
    public $update_to;

    /**
     *
     * @var integer
     */
    public $create_users_id;

    /**
     *
     * @var integer
     */
    public $type;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'log_task_history';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogTaskHistory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogTaskHistory
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
