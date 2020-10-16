<?php

class CustomerMessengers extends \Phalcon\Mvc\Model
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
    public $company_id;

    /**
     *
     * @var integer
     */
    public $resource_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'customer_messengers';
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('resource_id', 'Recursos', 'tbl_users_id', array('alias' => 'Messenger'));
        $this->belongsTo('resource_id', 'TblUsers', 'id', array('alias' => 'User'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CustomerMessengers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CustomerMessengers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
