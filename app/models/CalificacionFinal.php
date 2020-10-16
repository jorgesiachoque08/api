<?php

class CalificacionFinal extends \Phalcon\Mvc\Model
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
    public $cliente;

    /**
     *
     * @var string
     */
    public $distancia;

    /**
     *
     * @var string
     */
    public $tiempo;

    /**
     *
     * @var integer
     */
    public $resource;

    /**
     *
     * @var string
     */
    public $calificacion_total;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'calificacion_final';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CalificacionFinal[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CalificacionFinal
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
