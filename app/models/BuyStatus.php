<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class BuyStatus extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $response_code;

    /**
     *
     * @var string
     */
    public $response_reason_code;

    /**
     *
     * @var string
     */
    public $response_reason_text;

    /**
     *
     * @var string
     */
    public $approval_code;

    /**
     *
     * @var string
     */
    public $avs_result_code;

    /**
     *
     * @var string
     */
    public $transaction_id;

    /**
     *
     * @var string
     */
    public $invoice_num;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $amount;

    /**
     *
     * @var string
     */
    public $metho;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $cust_id;

    /**
     *
     * @var string
     */
    public $first_name;

    /**
     *
     * @var string
     */
    public $last_name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $md5_hash;

    /**
     *
     * @var string
     */
    public $CVV2_response;

    /**
     *
     * @var string
     */
    public $CAVV_response;

    /**
     *
     * @var string
     */
    public $bank_currency;

    /**
     *
     * @var string
     */
    public $bank_factor;

    /**
     *
     * @var string
     */
    public $bank_amount;

    /**
     *
     * @var string
     */
    public $franchise;

    /**
     *
     * @var string
     */
    public $bank_name;

    /**
     *
     * @var string
     */
    public $placetopay_id;

    /**
     *
     * @var string
     */
    public $ta_transaction_id;

    /**
     *
     * @var string
     */
    public $placetopay_internal_reference;

    /**
     *
     * @var string
     */
    public $number_card;

    /**
     *
     * @var string
     */
    public $token;

    /**
     *
     * @var string
     */
    public $date_created;

    /**
     *
     * @var integer
     */
    public $id_buy_package;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'TaskToken', 'buy_status_id', array('alias' => 'TaskToken'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        return true;
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return BuyStatus[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return BuyStatus
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
        return 'buy_status';
    }

}
