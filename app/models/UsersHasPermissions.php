<?php

class UsersHasPermissions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var integer
     */
    public $permissions_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('permissions_id', 'Permissions', 'id', array('alias' => 'Permissions'));
        $this->belongsTo('user_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users_has_permissions';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsersHasPermissions[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsersHasPermissions
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
