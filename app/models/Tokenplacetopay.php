<?php

class Tokenplacetopay extends \Phalcon\Mvc\Model
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
    public $token;

    /**
     *
     * @var string
     */
    public $franchise;

    /**
     *
     * @var string
     */
    public $bankname;

    /**
     *
     * @var string
     */
    public $lastdigits;

    /**
     *
     * @var string
     */
    public $validuntil;

    /**
     *
     * @var string
     */
    public $subtoken;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $documenttype;

    /**
     *
     * @var string
     */
    public $document;

    /**
     *
     * @var string
     */
    public $firstname;

    /**
     *
     * @var string
     */
    public $lastname;

    /**
     *
     * @var string
     */
    public $emailaddress;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'TaskToken', 'token_id', array('alias' => 'TaskToken'));
        $this->belongsTo('id_user', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tokenplacetopay[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tokenplacetopay
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
        return 'tokenplacetopay';
    }

}
