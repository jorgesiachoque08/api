<?php

class CompanyCodes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $company_id;

    /**
     *
     * @var integer
     */
    public $code_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('company_id', 'Empresas', 'id', array('alias' => 'Empresas'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'company_codes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanyCodes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CompanyCodes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
