<?php

class Products extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     */
    public $photo_url;

    /**
     *
     * @var string
     */
    public $price;

    /**
     *
     * @var integer
     */
    public $quantity;

    /**
     *
     * @var string
     */
    public $sku;

    /**
     *
     * @var integer
     */
    public $task_place;

    /**
     *
     * @var string
     */
    public $barcode;

    /**
     *
     * @var string
     */
    public $planogram;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $store_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('task_place', 'TaskPlaces', 'id', array('alias' => 'TaskPlaces'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Products[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Products
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
        return 'products';
    }

}
