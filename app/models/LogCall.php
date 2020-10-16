<?php

class LogCall extends \Phalcon\Mvc\Model
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
    public $phone;

    /**
     *
     * @var string
     */
    public $message;

    /**
     *
     * @var string
     */
    public $result;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'log_call';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogCall[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogCall
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
