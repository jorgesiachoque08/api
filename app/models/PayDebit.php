<?php

class PayDebit extends \Phalcon\Mvc\Model
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
    public $user_id;

    /**
     *
     * @var integer
     */
    public $type_result;

    /**
     *
     * @var integer
     */
    public $value;

    /**
     *
     * @var integer
     */
    public $iva;

    /**
     *
     * @var string
     */
    public $authorization_number;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var string
     */
    public $card_franchise;

    /**
     *
     * @var string
     */
    public $account_type;

    /**
     *
     * @var string
     */
    public $receipt_number;

    /**
     *
     * @var string
     */
    public $last_digit;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var string
     */
    public $rrn;

    /**
     *
     * @var string
     */
    public $terminal;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayDebit[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PayDebit
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
        return 'pay_debit';
    }

}
