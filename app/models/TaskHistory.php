<?php

class TaskHistory extends \Phalcon\Mvc\Model
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
    public $task_id;

    /**
     *
     * @var integer
     */
    public $type_task_status_id;

    /**
     *
     * @var integer
     */
    public $recurso_id;

    /**
     *
     * @var integer
     */
    public $type_task_pago_id;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var string
     */
    public $lat;

    /**
     *
     * @var string
     */
    public $long;

    /**
     *
     * @var integer
     */
    public $task_places_id;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var integer
     */
    public $tipo_cancelacion;

    /**
     *
     * @var string
     */
    public $distancia;

    /**
     *
     * @var integer
     */
    public $tipo_parada;

    /**
     *
     * @var integer
     */
    public $create_users_id;

    /**
     *
     * @var string
     */
    public $penalizacion;

    /**
     *
     * @var string
     */
    public $verification_code;

    /**
     *
     * @var integer
     */
    public $status_code_verification;

    /**
     *
     * @var integer
     */
    public $is_fake_location;

    /**
     *
     * @var integer
     */
    public $id_point;

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
     * Method to set the value of field task_id
     *
     * @param integer $task_id
     * @return $this
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;

        return $this;
    }

    /**
     * Method to set the value of field type_task_status_id
     *
     * @param integer $type_task_status_id
     * @return $this
     */
    public function setTypeTaskStatusId($type_task_status_id)
    {
        $this->type_task_status_id = $type_task_status_id;

        return $this;
    }

    /**
     * Method to set the value of field recurso_id
     *
     * @param integer $recurso_id
     * @return $this
     */
    public function setRecursoId($recurso_id)
    {
        $this->recurso_id = $recurso_id;

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
     * Method to set the value of field datecreate
     *
     * @param string $datecreate
     * @return $this
     */
    public function setDatecreate($datecreate)
    {
        $this->datecreate = $datecreate;

        return $this;
    }

    /**
     * Method to set the value of field lat
     *
     * @param string $lat
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Method to set the value of field long
     *
     * @param string $long
     * @return $this
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Method to set the value of field task_places_id
     *
     * @param integer $task_places_id
     * @return $this
     */
    public function setTaskPlacesId($task_places_id)
    {
        $this->task_places_id = $task_places_id;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Method to set the value of field tipo_cancelacion
     *
     * @param integer $tipo_cancelacion
     * @return $this
     */
    public function setTipoCancelacion($tipo_cancelacion)
    {
        $this->tipo_cancelacion = $tipo_cancelacion;

        return $this;
    }

    /**
     * Method to set the value of field distancia
     *
     * @param string $distancia
     * @return $this
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Method to set the value of field tipo_parada
     *
     * @param integer $tipo_parada
     * @return $this
     */
    public function setTipoParada($tipo_parada)
    {
        $this->tipo_parada = $tipo_parada;

        return $this;
    }

    /**
     * Method to set the value of field create_users_id
     *
     * @param integer $create_users_id
     * @return $this
     */
    public function setCreateUsersId($create_users_id)
    {
        $this->create_users_id = $create_users_id;

        return $this;
    }

    /**
     * Method to set the value of field penalizacion
     *
     * @param string $penalizacion
     * @return $this
     */
    public function setPenalizacion($penalizacion)
    {
        $this->penalizacion = $penalizacion;

        return $this;
    }

    /**
     * Method to set the value of field verification_code
     *
     * @param string $verification_code
     * @return $this
     */
    public function setVerificationCode($verification_code)
    {
        $this->verification_code = $verification_code;

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
     * Returns the value of field task_id
     *
     * @return integer
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * Returns the value of field type_task_status_id
     *
     * @return integer
     */
    public function getTypeTaskStatusId()
    {
        return $this->type_task_status_id;
    }

    /**
     * Returns the value of field recurso_id
     *
     * @return integer
     */
    public function getRecursoId()
    {
        return $this->recurso_id;
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
     * Returns the value of field datecreate
     *
     * @return string
     */
    public function getDatecreate()
    {
        return $this->datecreate;
    }

    /**
     * Returns the value of field lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Returns the value of field long
     *
     * @return string
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Returns the value of field task_places_id
     *
     * @return integer
     */
    public function getTaskPlacesId()
    {
        return $this->task_places_id;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Returns the value of field tipo_cancelacion
     *
     * @return integer
     */
    public function getTipoCancelacion()
    {
        return $this->tipo_cancelacion;
    }

    /**
     * Returns the value of field distancia
     *
     * @return string
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * Returns the value of field tipo_parada
     *
     * @return integer
     */
    public function getTipoParada()
    {
        return $this->tipo_parada;
    }

    /**
     * Returns the value of field create_users_id
     *
     * @return integer
     */
    public function getCreateUsersId()
    {
        return $this->create_users_id;
    }

    /**
     * Returns the value of field penalizacion
     *
     * @return string
     */
    public function getPenalizacion()
    {
        return $this->penalizacion;
    }

    /**
     * Returns the value of field verification_code
     *
     * @return string
     */
    public function getVerificationCode()
    {
        return $this->verification_code;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('task_places_id', 'TaskPlaces', 'id', array('alias' => 'TaskPlaces'));
        $this->belongsTo('recurso_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('create_users_id', 'TblProfiles', 'user_id', array('alias' => 'UserCreate'));
        $this->belongsTo('create_users_id', 'TblUsers', 'id', array('alias' => 'TypeUserCreate'));
        $this->belongsTo('type_task_pago_id', 'TypeTaskPago', 'id', array('alias' => 'TypeTaskPago'));
        $this->belongsTo('type_task_status_id', 'TypeTaskStatus', 'id', array('alias' => 'TypeTaskStatus'));
        $this->belongsTo('type_task_status_id', 'HistoryType', 'id', array('alias' => 'HistoryType'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskHistory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskHistory
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
        return 'task_history';
    }

}
