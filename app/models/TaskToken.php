<?php

class TaskToken extends \Phalcon\Mvc\Model
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
    public $token_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var string
     */
    public $status_string;

    /**
     *
     * @var string
     */
    public $customer_ip;

    /**
     *
     * @var integer
     */
    public $buy_status_id;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $responseReasonCode;

    /**
     *
     * @var integer
     */
    public $reason;

    /**
     *
     * @var integer
     */
    public $Retry;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('token_id', 'Tokenplacetopay', 'id', array('alias' => 'Tokenplacetopay'));
        $this->belongsTo('buy_status_id', 'BuyStatus', 'id', array('alias' => 'Buystatus'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskToken[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskToken
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
        return 'task_token';
    }

}
