<?php

class SegmentacionCaracteristicas extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $type_segmenacion_id;

    /**
     *
     * @var integer
     */
    public $type_caracteristica_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('type_caracteristica_id', 'TypeCaracteristicaRecursos', 'id', array('alias' => 'TypeCaracteristicaRecursos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'segmentacion_caracteristicas';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return SegmentacionCaracteristicas[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return SegmentacionCaracteristicas
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
