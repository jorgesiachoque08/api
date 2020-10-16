<?php

class SearchBarcode extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $order_id;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var integer
     */
    public $ciudad_id;

    /**
     *
     * @var string
     */
    public $name_company;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'search_barcode';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SearchBarcode[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SearchBarcode
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
