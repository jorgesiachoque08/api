<?php

class Zonascol extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $OGR_FID;

    /**
     *
     * @var string
     */
    public $SHAPE;

    /**
     *
     * @var string
     */
    public $left;

    /**
     *
     * @var string
     */
    public $bottom;

    /**
     *
     * @var string
     */
    public $right;

    /**
     *
     * @var string
     */
    public $top;

    /**
     *
     * @var integer
     */
    public $id_city;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'zonascol';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Zonascol[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Zonascol
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
