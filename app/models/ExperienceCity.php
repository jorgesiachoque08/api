<?php

class ExperienceCity extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $min_services;

    /**
     *
     * @var integer
     */
    public $day_count;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'experience_city';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExperienceCity[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ExperienceCity
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
