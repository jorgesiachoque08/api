<?php

class UtmTask extends \Phalcon\Mvc\Model
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
    public $task_id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $utm_campaign;

    /**
     *
     * @var string
     */
    public $utm_source;

    /**
     *
     * @var string
     */
    public $utm_medium;

    /**
     *
     * @var string
     */
    public $utm_term;

    /**
     *
     * @var string
     */
    public $utm_content;

    /**
     *
     * @var string
     */
    public $date_create;

    /**
     *
     * @var string
     */
    public $utm_date_cache;

    /**
     *
     * @var string
     */
    public $utm_origen_front;

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return UtmTask[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return UtmTask
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
        return 'utm_task';
    }

}
