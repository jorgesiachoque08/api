<?php

class LogTask extends \Phalcon\Mvc\Model
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
    public $task_id;

    /**
     *
     * @var string
     */
    public $uuid;

    /**
     *
     * @var integer
     */
    public $type_task_id;

    /**
     *
     * @var string
     */
    public $fecha_inicio;

    /**
     *
     * @var string
     */
    public $hora_inicio;

    /**
     *
     * @var string
     */
    public $valor_declarado;

    /**
     *
     * @var string
     */
    public $valor_descuento;

    /**
     *
     * @var string
     */
    public $recargo_distancia;

    /**
     *
     * @var string
     */
    public $recargo_ida_vuelta;

    /**
     *
     * @var string
     */
    public $recargo_seguro;

    /**
     *
     * @var string
     */
    public $valor_total;

    /**
     *
     * @var string
     */
    public $comision;

    /**
     *
     * @var string
     */
    public $total_otro;

    /**
     *
     * @var integer
     */
    public $estado;

    /**
     *
     * @var integer
     */
    public $solicitante;

    /**
     *
     * @var string
     */
    public $code_prom;

    /**
     *
     * @var integer
     */
    public $ciudad_id;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var integer
     */
    public $user_modify;

    /**
     *
     * @var integer
     */
    public $paradas;

    /**
     *
     * @var integer
     */
    public $ida_vuelta;

    /**
     *
     * @var integer
     */
    public $type;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'log_task';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogTask[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogTask
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
