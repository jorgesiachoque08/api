<?php

class AvailabilitySites extends \Phalcon\Mvc\Model
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
    public $availability_id;

    /**
     *
     * @var integer
     */
    public $point_id;

    /**
     *
     * @var integer
     */
    public $zone_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('point_id', 'ClientPoint', 'id', array('alias' => 'ClientPoint'));
        $this->belongsTo('zone_id', 'Zonascol', 'OGR_FID', array('alias' => 'AvailabilityZone' ));
        $this->belongsTo('availability_id', 'Availability', 'id', array('alias' => 'Availability'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'availability_sites';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilitySites[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return AvailabilitySites
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
