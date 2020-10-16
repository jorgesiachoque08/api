<?php

class Reembolsos extends \Phalcon\Mvc\Model
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
    public $fecha;

    /**
     *
     * @var string
     */
    public $monto;

    /**
     *
     * @var string
     */
    public $acumulado;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $type_movimientos_id;

    /**
     *
     * @var integer
     */
    public $usuario;

    /**
     *
     * @var integer
     */
    public $usercreate;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var integer
     */
    public $empresas_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $acumulado_nr;

    /**
     *
     * @var string
     */
    public $descuento_nr;

    /**
     *
     * @var integer
     */
    public $cod_platam;

    /**
     *
     * @var string
     */
    public $factura;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reembolsos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reembolsos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reembolsos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
