<?php

class AvailabilityListMessengers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $messenger_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'availability_list_messengers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityListMessengers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilityListMessengers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
