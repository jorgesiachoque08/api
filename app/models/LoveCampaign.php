<?php

class LoveCampaign extends \Phalcon\Mvc\Model
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
    public $id_user;

    /**
     *
     * @var string
     */
    public $from;

    /**
     *
     * @var string
     */
    public $for;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var string
     */
    public $lat;

    /**
     *
     * @var string
     */
    public $long;

    /**
     *
     * @var string
     */
    public $message;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return LoveCampaign[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return LoveCampaign
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
        return 'love_campaign';
    }

}
