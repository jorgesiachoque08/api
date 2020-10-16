<?php

class EmpresasPreciosServicio extends \Phalcon\Mvc\Model
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
    public $valor_base;

    /**
     *
     * @var integer
     */
    public $activo;

    /**
     *
     * @var integer
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
    public $distancia_base;

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
     *
     * @var string
     */
    public $parada_add_km;

    /**
     *

     * @var string
     */
    public $time_add;

    /**
     *

     * @var integer
     */
    public $paradas_minimas;

    /**
     *
     * @var integer
     */
    public $id_type_task;

    /**
     *
     * @var integer
     */
    public $empresas_id;

    /**
     *
     * @var integer
     */
    public $city;

    /**
     *
     * @var integer
     */
    public $night_surcharge;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('city', 'Ciudad', 'id', array('alias' => 'Ciudad'));
        $this->belongsTo('empresas_id', 'Empresas', 'id', array('alias' => 'Empresas'));
        $this->belongsTo('type_recurso_id', 'TypeRecurso', 'id', array('alias' => 'TypeRecurso'));
        $this->belongsTo('id_type_task', 'TypeTask', 'id', array('alias' => 'TypeTask'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EmpresasPreciosServicio[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EmpresasPreciosServicio
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
        return 'empresas_precios_servicio';
    }

}
