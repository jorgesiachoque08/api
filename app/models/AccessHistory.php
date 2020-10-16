<?php

class AccessHistory extends \Phalcon\Mvc\Model
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
    public $type;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $so;

    /**
     *
     * @var string
     */
    public $os_version;

    /**
     *
     * @var string
     */
    public $device_model;

    /**
     *
     * @var string
     */
    public $app_version;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'access_history';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccessHistory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AccessHistory
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
