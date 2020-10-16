<?php

class TypeTaskCity extends \Phalcon\Mvc\Model
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
    public $valor;

    /**
     *
     * @var integer
     */
    public $activo;

    /**
     *
     * @var string
     */
    public $alcance;

    /**
     *
     * @var integer
     */
    public $comision_porcentaje;

    /**
     *
     * @var integer
     */
    public $distancia;

    /**
     *
     * @var integer
     */
    public $es_por_tiempo;

    /**
     *
     * @var integer
     */
    public $type_recurso_id;

    /**
     *
     * @var integer
     */
    public $puntos;

    /**
     *
     * @var integer
     */
    public $comision_porcentaje_p;

    /**
     *
     * @var integer
     */
    public $id_type_task;

    /**
     *
     * @var integer
     */
    public $id_city;

    /**
     *
     * @var string
     */
    public $km_add;

    /**
     *
     * @var string
     */
    public $ida_vuelta;

    /**
     *
     * @var string
     */
    public $parada_add;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_city', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('id_type_task', 'TypeTask', 'id', array('alias' => 'TypeTask'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'type_task_city';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeTaskCity[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeTaskCity
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
