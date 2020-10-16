<?php

class ResourceInvoice extends \Phalcon\Mvc\Model
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
    public $resource_id;

    /**
     *
     * @var integer
     */
    public $invoice_erp;

    /**
     *
     * @var string
     */
    public $invoice_value;

    /**
     *
     * @var string
     */
    public $invoice_date;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'resource_invoice';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResourceInvoice[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ResourceInvoice
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
