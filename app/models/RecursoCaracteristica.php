<?php

class RecursoCaracteristica extends \Phalcon\Mvc\Model
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
    public $recurso_id;

    /**
     *
     * @var integer
     */
    public $type_caracteristica;

    /**
     *
     * @var integer
     */
    public $estado;

    /**
     *
     * @var integer
     */
    public $user_id;

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
     * Method to set the value of field type_caracteristica
     *
     * @param integer $type_caracteristica
     * @return $this
     */
    public function setTypeCaracteristica($type_caracteristica)
    {
        $this->type_caracteristica = $type_caracteristica;

        return $this;
    }

    /**
     * Method to set the value of field estado
     *
     * @param integer $estado
     * @return $this
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

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
     * Returns the value of field recurso_id
     *
     * @return integer
     */
    public function getRecursoId()
    {
        return $this->recurso_id;
    }

    /**
     * Returns the value of field type_caracteristica
     *
     * @return integer
     */
    public function getTypeCaracteristica()
    {
        return $this->type_caracteristica;
    }

    /**
     * Returns the value of field estado
     *
     * @return integer
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('recurso_id', 'Recursos', 'id', array('alias' => 'Recursos'));
        $this->belongsTo('type_caracteristica', 'TypeCaracteristicaRecursos', 'id', array('alias' => 'TypeCaracteristicaRecursos'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return RecursoCaracteristica[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return RecursoCaracteristica
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
        return 'recurso_caracteristica';
    }

}
