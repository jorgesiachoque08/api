<?php

class Changes extends \Phalcon\Mvc\Model
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
    public $change_type;

    /**
     *
     * @var string
     */
    public $user_id;

    /**
     *
     * @var integer
     */
    public $conversation_id;

    /**
     *
     * @var integer
     */
    public $conversation_part_id;

    /**
     *
     * @var integer
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $received;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("intercom");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'changes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Changes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Changes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
