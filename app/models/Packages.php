<?php

class Packages extends \Phalcon\Mvc\Model
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
    public $value;

    /**
     *
     * @var string
     */
    public $percentage;

    /**
     *
     * @var string
     */
    public $value_pay;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $datacreate;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'packages';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Packages[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Packages
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
