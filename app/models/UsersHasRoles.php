<?php

class UsersHasRoles extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $users_id;

    /**
     *
     * @var integer
     */
    public $roles_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('roles_id', 'Roles', 'id', array('alias' => 'Roles'));
        $this->belongsTo('users_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'users_has_roles';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsersHasRoles[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UsersHasRoles
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
