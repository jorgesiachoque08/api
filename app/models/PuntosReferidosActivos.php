<?php

class PuntosReferidosActivos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $id_usuario;

    /**
     *
     * @var integer
     */
    protected $id_qr;

    /**
     *
     * @var integer
     */
    protected $task;

    /**
     *
     * @var integer
     */
    protected $tipo_referido;

    /**
     *
     * @var string
     */
    protected $datecreate;

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
     * Method to set the value of field id_usuario
     *
     * @param integer $id_usuario
     * @return $this
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Method to set the value of field id_qr
     *
     * @param integer $id_qr
     * @return $this
     */
    public function setIdQr($id_qr)
    {
        $this->id_qr = $id_qr;

        return $this;
    }

    /**
     * Method to set the value of field task
     *
     * @param integer $task
     * @return $this
     */
    public function setTask($task)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Method to set the value of field tipo_referido
     *
     * @param integer $tipo_referido
     * @return $this
     */
    public function setTipoReferido($tipo_referido)
    {
        $this->tipo_referido = $tipo_referido;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field id_usuario
     *
     * @return integer
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * Returns the value of field id_qr
     *
     * @return integer
     */
    public function getIdQr()
    {
        return $this->id_qr;
    }

    /**
     * Returns the value of field task
     *
     * @return integer
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Returns the value of field tipo_referido
     *
     * @return integer
     */
    public function getTipoReferido()
    {
        return $this->tipo_referido;
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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'puntos_referidos_activos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PuntosReferidosActivos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PuntosReferidosActivos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
