<?php

class Track extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $lat;

    /**
     *
     * @var string
     */
    protected $long;

    /**
     *
     * @var string
     */
    protected $time;

    /**
     *
     * @var integer
     */
    protected $tbl_users_id;

    /**
     *
     * @var string
     */
    protected $datecreate;

    /**
     *
     * @var integer
     */
    protected $task_id;

    /**
     *
     * @var integer
     */
    protected $task_places_id;

    /**
     * Method to set the value of field id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field lat
     *
     * @param string $lat
     * @return $this
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Method to set the value of field long
     *
     * @param string $long
     * @return $this
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Method to set the value of field time
     *
     * @param string $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Method to set the value of field tbl_users_id
     *
     * @param integer $tbl_users_id
     * @return $this
     */
    public function setTblUsersId($tbl_users_id)
    {
        $this->tbl_users_id = $tbl_users_id;

        return $this;
    }

    /**
     * Method to set the value of field datecreate
     *
     * @param string $datecreate
     * @return $this
     */
    public function setDatecreate($datecreate)
    {
        $this->datecreate = $datecreate;

        return $this;
    }

    /**
     * Method to set the value of field task_id
     *
     * @param integer $task_id
     * @return $this
     */
    public function setTaskId($task_id)
    {
        $this->task_id = $task_id;

        return $this;
    }

    /**
     * Method to set the value of field task_places_id
     *
     * @param integer $task_places_id
     * @return $this
     */
    public function setTaskPlacesId($task_places_id)
    {
        $this->task_places_id = $task_places_id;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Returns the value of field long
     *
     * @return string
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * Returns the value of field time
     *
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Returns the value of field tbl_users_id
     *
     * @return integer
     */
    public function getTblUsersId()
    {
        return $this->tbl_users_id;
    }

    /**
     * Returns the value of field datecreate
     *
     * @return string
     */
    public function getDatecreate()
    {
        return $this->datecreate;
    }

    /**
     * Returns the value of field task_id
     *
     * @return integer
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * Returns the value of field task_places_id
     *
     * @return integer
     */
    public function getTaskPlacesId()
    {
        return $this->task_places_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('task_places_id', 'TaskPlaces', 'id', array('alias' => 'TaskPlaces'));
        $this->belongsTo('tbl_users_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'track';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Track[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Track
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
