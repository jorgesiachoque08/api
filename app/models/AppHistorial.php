<?php

class AppHistorial extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $task_id;

    /**
     *
     * @var integer
     */
    protected $type_task_status_id;

    /**
     *
     * @var integer
     */
    protected $solicitante;

    /**
     *
     * @var integer
     */
    protected $recurso_id;

    /**
     *
     * @var integer
     */
    protected $recurso_user_id;

    /**
     *
     * @var string
     */
    protected $valor_total;

    /**
     *
     * @var string
     */
    protected $total_otro;

    /**
     *
     * @var string
     */
    protected $valor_descuento;

    /**
     *
     * @var string
     */
    protected $fecha_inicio;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     *
     * @var string
     */
    protected $celular;

    /**
     *
     * @var string
     */
    protected $cedula;

    /**
     *
     * @var string
     */
    protected $address;

    /**
     *
     * @var integer
     */
    protected $id_user_recurso;

    /**
     *
     * @var string
     */
    protected $cal;

    /**
     *
     * @var integer
     */
    protected $type_task_id;

    /**
     *
     * @var string
     */
    protected $hora_inicio;

    /**
     *
     * @var string
     */
    protected $uuid;

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
     * Method to set the value of field solicitante
     *
     * @param integer $solicitante
     * @return $this
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

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
     * Method to set the value of field recurso_user_id
     *
     * @param integer $recurso_user_id
     * @return $this
     */
    public function setRecursoUserId($recurso_user_id)
    {
        $this->recurso_user_id = $recurso_user_id;

        return $this;
    }

    /**
     * Method to set the value of field valor_total
     *
     * @param string $valor_total
     * @return $this
     */
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    /**
     * Method to set the value of field total_otro
     *
     * @param string $total_otro
     * @return $this
     */
    public function setTotalOtro($total_otro)
    {
        $this->total_otro = $total_otro;

        return $this;
    }

    /**
     * Method to set the value of field valor_descuento
     *
     * @param string $valor_descuento
     * @return $this
     */
    public function setValorDescuento($valor_descuento)
    {
        $this->valor_descuento = $valor_descuento;

        return $this;
    }

    /**
     * Method to set the value of field fecha_inicio
     *
     * @param string $fecha_inicio
     * @return $this
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Method to set the value of field celular
     *
     * @param string $celular
     * @return $this
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Method to set the value of field cedula
     *
     * @param string $cedula
     * @return $this
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field id_user_recurso
     *
     * @param integer $id_user_recurso
     * @return $this
     */
    public function setIdUserRecurso($id_user_recurso)
    {
        $this->id_user_recurso = $id_user_recurso;

        return $this;
    }

    /**
     * Method to set the value of field cal
     *
     * @param string $cal
     * @return $this
     */
    public function setCal($cal)
    {
        $this->cal = $cal;

        return $this;
    }

    /**
     * Method to set the value of field type_task_id
     *
     * @param integer $type_task_id
     * @return $this
     */
    public function setTypeTaskId($type_task_id)
    {
        $this->type_task_id = $type_task_id;

        return $this;
    }

    /**
     * Method to set the value of field hora_inicio
     *
     * @param string $hora_inicio
     * @return $this
     */
    public function setHoraInicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    /**
     * Method to set the value of field uuid
     *
     * @param string $uuid
     * @return $this
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
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
     * Returns the value of field solicitante
     *
     * @return integer
     */
    public function getSolicitante()
    {
        return $this->solicitante;
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
     * Returns the value of field recurso_user_id
     *
     * @return integer
     */
    public function getRecursoUserId()
    {
        return $this->recurso_user_id;
    }

    /**
     * Returns the value of field valor_total
     *
     * @return string
     */
    public function getValorTotal()
    {
        return $this->valor_total;
    }

    /**
     * Returns the value of field total_otro
     *
     * @return string
     */
    public function getTotalOtro()
    {
        return $this->total_otro;
    }

    /**
     * Returns the value of field valor_descuento
     *
     * @return string
     */
    public function getValorDescuento()
    {
        return $this->valor_descuento;
    }

    /**
     * Returns the value of field fecha_inicio
     *
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field celular
     *
     * @return string
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * Returns the value of field cedula
     *
     * @return string
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field id_user_recurso
     *
     * @return integer
     */
    public function getIdUserRecurso()
    {
        return $this->id_user_recurso;
    }

    /**
     * Returns the value of field cal
     *
     * @return string
     */
    public function getCal()
    {
        return $this->cal;
    }

    /**
     * Returns the value of field type_task_id
     *
     * @return integer
     */
    public function getTypeTaskId()
    {
        return $this->type_task_id;
    }

    /**
     * Returns the value of field hora_inicio
     *
     * @return string
     */
    public function getHoraInicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Returns the value of field uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'app_historial';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AppHistorial[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AppHistorial
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
