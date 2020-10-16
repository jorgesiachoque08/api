<?php

class PackageToken extends \Phalcon\Mvc\Model
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
    public $uuid;

    /**
     *
     * @var integer
     */
    public $package_id;

    /**
     *
     * @var integer
     */
    public $token_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var string
     */
    public $status_string;

    /**
     *
     * @var string
     */
    public $customer_ip;

    /**
     *
     * @var integer
     */
    public $buy_status_id;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $responseReasonCode;

    /**
     *
     * @var integer
     */
    public $reason;

    /**
     *
     * @var integer
     */
    public $Retry;

    /**
     *
     * @var integer
     */
    public $value_pay;

    /**
     *
     * @var integer
     */
    public $id_user;

    /**
     *
     * @var integer
     */
    public $id_company;

    /**
     *
     * @var integer
     */
    public $ta_transaction_id;

    /**
     *
     * @var integer
     */
    public $id_movement;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('package_id', 'Packages', 'id', array('alias' => 'Packages'));
        $this->belongsTo('token_id', 'Tokenplacetopay', 'id', array('alias' => 'Tokenplacetopay'));
        $this->belongsTo('id_user', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PackageToken[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PackageToken
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
        return 'package_token';
    }

}
