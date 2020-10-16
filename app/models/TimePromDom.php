<?php

class TimePromDom extends \Phalcon\Mvc\Model
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
    public $id_resource;

    /**
     *
     * @var string
     */
    public $fecha_inicio;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var integer
     */
    public $distancia;

    /**
     *
     * @var integer
     */
    public $estado;

    /**
     *
     * @var string
     */
    public $tiempo;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var integer
     */
    public $ss;

    /**
     *
     * @var integer
     */
    public $vip;

    /**
     *
     * @var string
     */
    public $celular;

    /**
     *
     * @var integer
     */
    public $type_recurso;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TimePromDom[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TimePromDom
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
        return 'time_prom_dom';
    }

}
