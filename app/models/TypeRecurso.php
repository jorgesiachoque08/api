<?php

class TypeRecurso extends \Phalcon\Mvc\Model
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
    protected $ejes;

    /**
     *
     * @var integer
     */
    protected $llantas;

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
     * Method to set the value of field ejes
     *
     * @param string $ejes
     * @return $this
     */
    public function setEjes($ejes)
    {
        $this->ejes = $ejes;

        return $this;
    }

    /**
     * Method to set the value of field llantas
     *
     * @param integer $llantas
     * @return $this
     */
    public function setLlantas($llantas)
    {
        $this->llantas = $llantas;

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
     * Returns the value of field ejes
     *
     * @return string
     */
    public function getEjes()
    {
        return $this->ejes;
    }

    /**
     * Returns the value of field llantas
     *
     * @return integer
     */
    public function getLlantas()
    {
        return $this->llantas;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'EmpresasPreciosServicio', 'type_recurso_id', array('alias' => 'EmpresasPreciosServicio'));
        $this->hasMany('id', 'Recursos', 'type_recurso_id', array('alias' => 'Recursos'));
        $this->hasMany('id', 'TypeRecursosCaracteristica', 'type_recurso_id', array('alias' => 'TypeRecursosCaracteristica'));
        $this->hasMany('id', 'TypeTask', 'type_recurso_id', array('alias' => 'TypeTask'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'type_recurso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeRecurso[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeRecurso
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
