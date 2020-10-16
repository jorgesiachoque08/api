<?php

class PaymentRules extends \Phalcon\Mvc\Model
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
    public $city_id;

    /**
     *
     * @var integer
     */
    public $type_task;

    /**
     *
     * @var double
     */
    public $minimum_range;

    /**
     *
     * @var double
     */
    public $maximum_range;

    /**
     *
     * @var double
     */
    public $percentage_p;

    /**
     *
     * @var double
     */
    public $percentage_e;

    /**
     *
     * @var double
     */
    public $value;

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var integer
     */
    public $company_id;

    /**
     *
     * @var integer
     */
    public $km_add;

    /**
     *
     * @var integer
     */
    public $km_roundtrip;

    /**
     *
     * @var double
     */
    public $customer_penalty;

    /**
     *
     * @var double
     */
    public $messenger_penalty;

    /**
     *
     * @var double
     */
    public $messenger_penalty_app;

    /**
     *
     * @var double
     */
    public $messenger_arrival;

    /**
     *
     * @var double
     */
    public $base_value;

    /**
     *
     * @var integer
     */
    public $km_included;

    /**
     *
     * @var string
     */
    public $additional_minute;

    /**
     *
     * @var string
     */
    public $night_surcharge;

    /**
     *
     * @var string
     */
    public $additional_stop;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field city_id
     *
     * @param integer $city_id
     * @return $this
     */
    public function setCityId($city_id)
    {
        $this->city_id = $city_id;

        return $this;
    }

    /**
     * Method to set the value of field type_task
     *
     * @param integer $type_task
     * @return $this
     */
    public function setTypeTask($type_task)
    {
        $this->type_task = $type_task;

        return $this;
    }

    /**
     * Method to set the value of field minimum_range
     *
     * @param double $minimum_range
     * @return $this
     */
    public function setMinimumRange($minimum_range)
    {
        $this->minimum_range = $minimum_range;

        return $this;
    }

    /**
     * Method to set the value of field maximum_range
     *
     * @param double $maximum_range
     * @return $this
     */
    public function setMaximumRange($maximum_range)
    {
        $this->maximum_range = $maximum_range;

        return $this;
    }

    /**
     * Method to set the value of field percentage_p
     *
     * @param double $percentage_p
     * @return $this
     */
    public function setPercentageP($percentage_p)
    {
        $this->percentage_p = $percentage_p;

        return $this;
    }

    /**
     * Method to set the value of field percentage_e
     *
     * @param double $percentage_e
     * @return $this
     */
    public function setPercentageE($percentage_e)
    {
        $this->percentage_e = $percentage_e;

        return $this;
    }

    /**
     * Method to set the value of field value
     *
     * @param double $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field city_id
     *
     * @return integer
     */
    public function getCityId()
    {
        return $this->city_id;
    }

    /**
     * Returns the value of field type_task
     *
     * @return integer
     */
    public function getTypeTask()
    {
        return $this->type_task;
    }

    /**
     * Returns the value of field minimum_range
     *
     * @return double
     */
    public function getMinimumRange()
    {
        return $this->minimum_range;
    }

    /**
     * Returns the value of field maximum_range
     *
     * @return double
     */
    public function getMaximumRange()
    {
        return $this->maximum_range;
    }

    /**
     * Returns the value of field percentage_p
     *
     * @return double
     */
    public function getPercentageP()
    {
        return $this->percentage_p;
    }

    /**
     * Returns the value of field percentage_e
     *
     * @return double
     */
    public function getPercentageE()
    {
        return $this->percentage_e;
    }

    /**
     * Returns the value of field value
     *
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PaymentRules[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PaymentRules
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
        return 'payment_rules';
    }

}
