<?php

class EvidenceTaskPlaces extends \Phalcon\Mvc\Model
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
    public $id_task;

    /**
     *
     * @var integer
     */
    public $id_task_places;

    /**
     *
     * @var string
     */
    public $url_photo;

    /**
     *
     * @var integer
     */
    public $id_resource;

    /**
     *
     * @var string
     */
    public $date;

    /**
     *
     * @var integer
     */
    public $type_evidence;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_task', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('id_task_places', 'TaskPlaces', 'id', array('alias' => 'TaskPlaces'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EvidenceTaskPlaces[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EvidenceTaskPlaces
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
        return 'evidence_task_places';
    }

}
