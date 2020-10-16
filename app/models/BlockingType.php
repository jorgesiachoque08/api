<?php

class BlockingType extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var integer
     */
    public $apply_code;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var integer
     */
    public $apply_time;

    /**
     *
     * @var integer
     */
    public $type;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'LockingReasons', 'blocking_type', array('alias' => 'LockingReasons'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'blocking_type';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BlockingType[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BlockingType
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
