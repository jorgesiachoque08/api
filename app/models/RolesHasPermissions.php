<?php

class RolesHasPermissions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $roles_id;

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
        $this->belongsTo('roles_id', 'Roles', 'id', array('alias' => 'Roles'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'roles_has_permissions';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RolesHasPermissions[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RolesHasPermissions
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
