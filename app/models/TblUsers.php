<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class TblUsers extends \Phalcon\Mvc\Model
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
    public $username;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $activkey;

    /**
     *
     * @var integer
     */
    public $superuser;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $create_at;

    /**
     *
     * @var string
     */
    public $lastvisit_at;

    /**
     *
     * @var integer
     */
    public $empresas_id;

    /**
     *
     * @var integer
     */
    public $user_type;

    /**
     *
     * @var integer
     */
    public $q_refiere;

    /**
     *
     * @var integer
     */
    public $type_task_pago_id;

    /**
     *
     * @var string
     */
    public $codigo_prom;

    /**
     *
     * @var integer
     */
    public $administrator;

    /**
     *
     * @var integer
     */
    public $blocking_type;

    /**
     *
     * @var string
     */
    public $date_status_end;

    /**
     *
     * @var integer
     */
    public $use_mu;

    public $pago_referido;


    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field username
     *
     * @param string $username
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field activkey
     *
     * @param string $activkey
     * @return $this
     */
    public function setActivkey($activkey)
    {
        $this->activkey = $activkey;

        return $this;
    }

    /**
     * Method to set the value of field superuser
     *
     * @param integer $superuser
     * @return $this
     */
    public function setSuperuser($superuser)
    {
        $this->superuser = $superuser;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field create_at
     *
     * @param string $create_at
     * @return $this
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;

        return $this;
    }

    /**
     * Method to set the value of field lastvisit_at
     *
     * @param string $lastvisit_at
     * @return $this
     */
    public function setLastvisitAt($lastvisit_at)
    {
        $this->lastvisit_at = $lastvisit_at;

        return $this;
    }

    /**
     * Method to set the value of field empresas_id
     *
     * @param integer $empresas_id
     * @return $this
     */
    public function setEmpresasId($empresas_id)
    {
        $this->empresas_id = $empresas_id;

        return $this;
    }

    /**
     * Method to set the value of field user_type
     *
     * @param integer $user_type
     * @return $this
     */
    public function setUserType($user_type)
    {
        $this->user_type = $user_type;

        return $this;
    }

    /**
     * Method to set the value of field q_refiere
     *
     * @param integer $q_refiere
     * @return $this
     */
    public function setQRefiere($q_refiere)
    {
        $this->q_refiere = $q_refiere;

        return $this;
    }

    /**
     * Method to set the value of field type_task_pago_id
     *
     * @param integer $type_task_pago_id
     * @return $this
     */
    public function setTypeTaskPagoId($type_task_pago_id)
    {
        $this->type_task_pago_id = $type_task_pago_id;

        return $this;
    }

    /**
     * Method to set the value of field codigo_prom
     *
     * @param string $codigo_prom
     * @return $this
     */
    public function setCodigoProm($codigo_prom)
    {
        $this->codigo_prom = $codigo_prom;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field activkey
     *
     * @return string
     */
    public function getActivkey()
    {
        return $this->activkey;
    }

    /**
     * Returns the value of field superuser
     *
     * @return integer
     */
    public function getSuperuser()
    {
        return $this->superuser;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field create_at
     *
     * @return string
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * Returns the value of field lastvisit_at
     *
     * @return string
     */
    public function getLastvisitAt()
    {
        return $this->lastvisit_at;
    }

    /**
     * Returns the value of field empresas_id
     *
     * @return integer
     */
    public function getEmpresasId()
    {
        return $this->empresas_id;
    }

    /**
     * Returns the value of field user_type
     *
     * @return integer
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Returns the value of field q_refiere
     *
     * @return integer
     */
    public function getQRefiere()
    {
        return $this->q_refiere;
    }

    /**
     * Returns the value of field type_task_pago_id
     *
     * @return integer
     */
    public function getTypeTaskPagoId()
    {
        return $this->type_task_pago_id;
    }

    /**
     * Returns the value of field codigo_prom
     *
     * @return string
     */
    public function getCodigoProm()
    {
        return $this->codigo_prom;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'CodePromHistory', 'tbl_users_id', array('alias' => 'CodePromHistory'));
        $this->hasMany('id', 'Movimientos', 'usuario', array('alias' => 'Movimientos'));
        $this->hasMany('id', 'Movimientos', 'usercreate', array('alias' => 'Movimientos'));
        $this->hasMany('id', 'MvAcciones', 'tbl_users_id', array('alias' => 'MvAcciones'));
        $this->hasMany('id', 'PuntosHistorial', 'usuario_id', array('alias' => 'PuntosHistorial'));
        $this->hasMany('id', 'PuntosHistorial', 'usuario_qr', array('alias' => 'PuntosHistorial'));
        $this->hasMany('id', 'Recursos', 'tbl_users_id', array('alias' => 'Recursos1'));
        $this->hasMany('id', 'Recursos', 'usercreate', array('alias' => 'Recursos'));
        $this->hasMany('id', 'Solicitudes', 'tbl_users_id', array('alias' => 'Solicitudes'));
        $this->hasMany('id', 'Task', 'solicitante', array('alias' => 'Task'));
        $this->hasMany('id', 'TaskHistory', 'recurso_id', array('alias' => 'TaskHistory'));
        $this->hasMany('id', 'TblProfiles', 'user_id', array('alias' => 'TblProfiles'));
        $this->hasMany('id', 'TblUsers', 'q_refiere', array('alias' => 'TblUsers'));
        $this->hasMany('id', 'Tokenpayu', 'id_user', array('alias' => 'Tokenpayu'));
        $this->hasMany('id', 'Track', 'tbl_users_id', array('alias' => 'Track'));
        $this->hasMany('id', 'UsersHasPermissions', 'user_id', array('alias' => 'UsersHasPermissions'));
        $this->hasMany('id', 'UsersHasRoles', 'users_id', array('alias' => 'UsersHasRoles'));
        $this->hasMany('id', 'UserPoints', 'user_id', array('alias' => 'UserPoints'));
        $this->belongsTo('empresas_id', 'Empresas', 'id', array('alias' => 'Empresas'));
        $this->belongsTo('q_refiere', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('type_task_pago_id', 'TypeTaskPago', 'id', array('alias' => 'TypeTaskPago'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TblUsers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TblUsers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tbl_users';
    }

}
