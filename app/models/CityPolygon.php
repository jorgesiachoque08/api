<?php

class CityPolygon extends \Phalcon\Mvc\Model
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
    public $id_city;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $value;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $polygon;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'city_polygon';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CityPolygon[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CityPolygon
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
