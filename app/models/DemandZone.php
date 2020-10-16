<?php

class DemandZone extends \Phalcon\Mvc\Model
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
    public $demand;

    /**
     *
     * @var integer
     */
    public $hour;

    /**
     *
     * @var integer
     */
    public $courier;

    /**
     *
     * @var integer
     */
    public $zone;

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
        return 'demand_zone';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return DemandZone[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return DemandZone
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
