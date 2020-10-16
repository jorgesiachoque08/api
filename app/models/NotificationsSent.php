<?php

class NotificationsSent extends \Phalcon\Mvc\Model
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
    public $type;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $body;

    /**
     *
     * @var integer
     */
    public $user_create;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     *
     * @var integer
     */
    public $city;

    /**
     *
     * @var string
     */
    public $user_send;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'NotificationUser', 'id_notification', array('alias' => 'NotificationUser'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'notifications_sent';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return NotificationsSent[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return NotificationsSent
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
