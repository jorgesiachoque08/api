<?php

class TaskInvoices extends \Phalcon\Mvc\Model
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
    public $erp_id;

    /**
     *
     * @var string
     */
    public $erp_reponse;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'task_invoices';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskInvoices[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TaskInvoices
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
