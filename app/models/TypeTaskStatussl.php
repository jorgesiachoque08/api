<?php

class TypeTaskStatussl extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $nombre;

    /**
     *
     * @var string
     */
    protected $alerta;

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
     * Method to set the value of field alerta
     *
     * @param string $alerta
     * @return $this
     */
    public function setAlerta($alerta)
    {
        $this->alerta = $alerta;

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
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field alerta
     *
     * @return string
     */
    public function getAlerta()
    {
        return $this->alerta;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setReadConnectionService("db_read");
        $this->setWriteConnectionService("db");
        
        $this->hasMany('id', 'Task', 'estado', array('alias' => 'Task'));
        $this->hasMany('id', 'TaskHistory', 'type_task_status_id', array('alias' => 'TaskHistory'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'type_task_status';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeTaskStatus[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeTaskStatus
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
