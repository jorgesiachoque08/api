<?php

class BlockingHistory extends \Phalcon\Mvc\Model
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
    public $blocking_type;

    /**
     *
     * @var string
     */
    public $creation_date;

    /**
     *
     * @var integer
     */
    public $blocking_time;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $locking_reason;

    /**
     *
     * @var integer
     */
    public $id_resource;

    /**
     *
     * @var integer
     */
    public $user_create;

    /**
     *
     * @var string
     */
    public $description;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BlockingHistory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BlockingHistory
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
        return 'blocking_history';
    }

}
