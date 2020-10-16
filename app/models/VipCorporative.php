<?php

class VipCorporative extends \Phalcon\Mvc\Model
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
     * @var integer
     */
    public $point;

    /**
     *
     * @var integer
     */
    public $vip_type;

    /**
     *
     * @var integer
     */
    public $ss;

    /**
     *
     * @var integer
     */
    public $old_vip;

    /**
     *
     * @var string
     */
    public $km;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var string
     */
    public $rating;

    /**
     *
     * @var string
     */
    public $time;

    /**
     *
     * @var integer
     */
    public $type_recurso_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('id_user', 'Recursos', 'tbl_users_id', array('alias' => 'Recursos'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return VipCorporative[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return VipCorporative
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
        return 'vip_corporative';
    }

}
