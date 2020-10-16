<?php

class ServiceDetail extends \Phalcon\Mvc\Model
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
    public $detail_id;

    /**
     *
     * @var string
     */
    public $value;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'service_detail';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ServiceDetail[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ServiceDetail
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
