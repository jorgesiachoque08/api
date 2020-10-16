<?php

class CodePromHistory extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $code_prom_id;

    /**
     *
     * @var integer
     */
    public $tbl_users_id;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var string
     */
    public $descuento_apply;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('code_prom_id', 'CodeProm', 'id', array('alias' => 'CodeProm'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('tbl_users_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'code_prom_history';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CodePromHistory[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CodePromHistory
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
