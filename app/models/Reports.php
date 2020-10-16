<?php

class Reports extends \Phalcon\Mvc\Model
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
    public $request;

    /**
     *
     * @var integer
     */
    public $points_number;

    /**
     *
     * @var integer
     */
    public $services_number;

    /**
     *
     * @var double
     */
    public $total_value;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     *
     * @var integer
     */
    public $user_create;

    /**
     *
     * @var string
     */
    public $url;

    /**
     *
     * @var string
     */
    public $status;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reports';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reports[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reports
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
