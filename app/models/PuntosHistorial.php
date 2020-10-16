<?php

class PuntosHistorial extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $usuario_id;

    /**
     *
     * @var integer
     */
    protected $usuario_qr;

    /**
     *
     * @var integer
     */
    protected $usuario_gen;

    /**
     *
     * @var integer
     */
    protected $puntos;

    /**
     *
     * @var integer
     */
    protected $acumulado;

    /**
     *
     * @var string
     */
    protected $datecreate;

    /**
     *
     * @var integer
     */
    protected $usercreate;

    /**
     *
     * @var integer
     */
    protected $type_puntos_id;

    /**
     *
     * @var integer
     */
    protected $type_recurso;

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
     * Method to set the value of field usuario_id
     *
     * @param integer $usuario_id
     * @return $this
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Method to set the value of field usuario_qr
     *
     * @param integer $usuario_qr
     * @return $this
     */
    public function setUsuarioQr($usuario_qr)
    {
        $this->usuario_qr = $usuario_qr;

        return $this;
    }

    /**
     * Method to set the value of field usuario_gen
     *
     * @param integer $usuario_gen
     * @return $this
     */
    public function setUsuarioGen($usuario_gen)
    {
        $this->usuario_gen = $usuario_gen;

        return $this;
    }

    /**
     * Method to set the value of field puntos
     *
     * @param integer $puntos
     * @return $this
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Method to set the value of field acumulado
     *
     * @param integer $acumulado
     * @return $this
     */
    public function setAcumulado($acumulado)
    {
        $this->acumulado = $acumulado;

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
     * Method to set the value of field usercreate
     *
     * @param integer $usercreate
     * @return $this
     */
    public function setUsercreate($usercreate)
    {
        $this->usercreate = $usercreate;

        return $this;
    }

    /**
     * Method to set the value of field type_puntos_id
     *
     * @param integer $type_puntos_id
     * @return $this
     */
    public function setTypePuntosId($type_puntos_id)
    {
        $this->type_puntos_id = $type_puntos_id;

        return $this;
    }

    /**
     * Method to set the value of field type_recurso
     *
     * @param integer $type_recurso
     * @return $this
     */
    public function setTypeRecurso($type_recurso)
    {
        $this->type_recurso = $type_recurso;

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
     * Returns the value of field usuario_id
     *
     * @return integer
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Returns the value of field usuario_qr
     *
     * @return integer
     */
    public function getUsuarioQr()
    {
        return $this->usuario_qr;
    }

    /**
     * Returns the value of field usuario_gen
     *
     * @return integer
     */
    public function getUsuarioGen()
    {
        return $this->usuario_gen;
    }

    /**
     * Returns the value of field puntos
     *
     * @return integer
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Returns the value of field acumulado
     *
     * @return integer
     */
    public function getAcumulado()
    {
        return $this->acumulado;
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
     * Returns the value of field usercreate
     *
     * @return integer
     */
    public function getUsercreate()
    {
        return $this->usercreate;
    }

    /**
     * Returns the value of field type_puntos_id
     *
     * @return integer
     */
    public function getTypePuntosId()
    {
        return $this->type_puntos_id;
    }

    /**
     * Returns the value of field type_recurso
     *
     * @return integer
     */
    public function getTypeRecurso()
    {
        return $this->type_recurso;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('usuario_id', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('usuario_qr', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('type_puntos_id', 'TypePuntos', 'id', array('alias' => 'TypePuntos'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'puntos_historial';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return PuntosHistorial[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return PuntosHistorial
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
