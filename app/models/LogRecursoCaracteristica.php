<?php

class LogRecursoCaracteristica extends \Phalcon\Mvc\Model
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
    public $recurso_id;

    /**
     *
     * @var string
     */
    public $type_caracteristica;

    /**
     *
     * @var string
     */
    public $estado;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogRecursoCaracteristica[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LogRecursoCaracteristica
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
        return 'log_recurso_caracteristica';
    }

}
