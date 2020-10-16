<?php

class UserPoints extends \Phalcon\Mvc\Model
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
    public $point_id;

    /**
     *
     * @var string
     */
    public $user_id;

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
        return 'user_points';
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->belongsTo('point_id', 'ClientPoint', 'id_point_client', array('alias' => 'ClientPoint'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserPoints[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UserPoints
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
