<?php

class Record extends \Phalcon\Mvc\Model
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
    public $identification;

    /**
     *
     * @var integer
     */
    public $police;

    /**
     *
     * @var integer
     */
    public $procuracy;

    /**
     *
     * @var string
     */
    public $start_date;

    /**
     *
     * @var string
     */
    public $creation_date;

    /**
     *
     * @var string
     */
    public $json_police;

    /**
     *
     * @var string
     */
    public $json_procuracy;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'record';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Record[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Record
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
