<?php

class GExitoStatus extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $solicitudestransporte;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $http_code;

    /**
     *
     * @var integer
     */
    public $attempts;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'g_exito_status';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return GExitoStatus[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return GExitoStatus
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
