<?php

class LogPurchase extends \Phalcon\Mvc\Model
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
    public $id_resource;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var integer
     */
    public $id_company;

    /**
     *
     * @var integer
     */
    public $type_pay;

    /**
     *
     * @var double
     */
    public $gain_value;

    /**
     *
     * @var double
     */
    public $percentage_gain;

    /**
     *
     * @var double
     */
    public $parking_value;

    /**
     *
     * @var double
     */
    public $relaunch_value;

    /**
     *
     * @var double
     */
    public $surcharge_declared_value;

    /**
     *
     * @var string
     */
    public $device;

    /**
     *
     * @var double
     */
    public $lat;

    /**
     *
     * @var double
     */
    public $long;

    /**
     *
     * @var string
     */
    public $datacreate;

    /**
     *
     * @var integer
     */
    public $total_value;

    /**
     *
     * @var double
     */
    public $gain_total;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogPurchase[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogPurchase
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
        return 'log_purchase';
    }

}
