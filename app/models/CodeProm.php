<?php

class CodeProm extends \Phalcon\Mvc\Model
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
    public $codeprom;

    /**
     *
     * @var integer
     */
    public $descuento;

    /**
     *
     * @var integer
     */
    public $cantidad;

    /**
     *
     * @var string
     */
    public $fecha_final;

    /**
     *
     * @var string
     */
    public $datecrearte;

    /**
     *
     * @var integer
     */
    public $estado;

    /**
     *
     * @var integer
     */
    public $type_task_id;

    /**
     *
     * @var integer
     */
    public $tipo_descuento;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'CodePromHistory', 'code_prom_id', array('alias' => 'CodePromHistory'));
        $this->belongsTo('type_task_id', 'TypeTask', 'id', array('alias' => 'TypeTask'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'code_prom';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CodeProm[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CodeProm
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
