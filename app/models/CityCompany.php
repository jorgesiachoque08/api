<?php

class CityCompany extends \Phalcon\Mvc\Model
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
    public $id_company;

    /**
     *
     * @var integer
     */
    public $id_city_company;

    /**
     *
     * @var integer
     */
    public $id_city_mu;

    /**
     *
     * @var string
     */
    public $name_city_mu;

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
        return 'city_company';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CityCompany[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CityCompany
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
