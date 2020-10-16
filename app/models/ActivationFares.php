<?php

class ActivationFares extends \Phalcon\Mvc\Model
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
    public $type_task;

    /**
     *
     * @var integer
     */
    public $ciudad;

    /**
     *
     * @var integer
     */
    public $hour0000;

    /**
     *
     * @var integer
     */
    public $hour0100;

    /**
     *
     * @var integer
     */
    public $hour0200;

    /**
     *
     * @var integer
     */
    public $hour0300;

    /**
     *
     * @var integer
     */
    public $hour0400;

    /**
     *
     * @var integer
     */
    public $hour0500;

    /**
     *
     * @var integer
     */
    public $hour0600;

    /**
     *
     * @var integer
     */
    public $hour0700;

    /**
     *
     * @var integer
     */
    public $hour0800;

    /**
     *
     * @var integer
     */
    public $hour0900;

    /**
     *
     * @var integer
     */
    public $hour1000;

    /**
     *
     * @var integer
     */
    public $hour1100;

    /**
     *
     * @var integer
     */
    public $hour1200;

    /**
     *
     * @var integer
     */
    public $hour1300;

    /**
     *
     * @var integer
     */
    public $hour1400;

    /**
     *
     * @var integer
     */
    public $hour1500;

    /**
     *
     * @var integer
     */
    public $hour1600;

    /**
     *
     * @var integer
     */
    public $hour1700;

    /**
     *
     * @var integer
     */
    public $hour1800;

    /**
     *
     * @var integer
     */
    public $hour1900;

    /**
     *
     * @var integer
     */
    public $hour2000;

    /**
     *
     * @var integer
     */
    public $hour2100;

    /**
     *
     * @var integer
     */
    public $hour2200;

    /**
     *
     * @var integer
     */
    public $hour2300;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('type_task', 'TypeTask', 'id', array('alias' => 'TypeTask'));
        $this->belongsTo('ciudad', 'Ciudad', 'id', array('alias' => 'Ciudad'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'activation_fares';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ActivationFares[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ActivationFares
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Get model attributes
     * 
     * @return array
     */
    public function getAttributes()
    {
        $metaData = $this->getModelsMetaData();
        return $metaData->getAttributes($this);
    }

}
