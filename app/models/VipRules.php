<?php

class VipRules extends \Phalcon\Mvc\Model
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
    public $id_city;

    /**
     *
     * @var integer
     */
    public $id_type;

    /**
     *
     * @var string
     */
    public $km_week;

    /**
     *
     * @var string
     */
    public $km_weekend;

    /**
     *
     * @var string
     */
    public $rating;

    /**
     *
     * @var string
     */
    public $time;

    /**
     *
     * @var string
     */
    public $km_total;

    /**
     *
     * @var integer
     */
    public $ss;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VipRules[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VipRules
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
        return 'vip_rules';
    }

}
