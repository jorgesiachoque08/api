<?php

class Movimientos extends \Phalcon\Mvc\Model
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
    public $fecha;

    /**
     *
     * @var string
     */
    public $monto;

    /**
     *
     * @var string
     */
    public $acumulado;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var string
     */
    public $datecreate;

    /**
     *
     * @var integer
     */
    public $type_movimientos_id;

    /**
     *
     * @var integer
     */
    public $usuario;

    /**
     *
     * @var integer
     */
    public $usercreate;

    /**
     *
     * @var integer
     */
    public $task_id;

    /**
     *
     * @var integer
     */
    public $empresas_id;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $acumulado_nr;

    /**
     *
     * @var string
     */
    public $descuento_nr;

    /**
     *
     * @var integer
     */
    public $cod_platam;

    /**
     *
     * @var string
     */
    public $factura;

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
     * Method to set the value of field fecha
     *
     * @param string $fecha
     * @return $this
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Method to set the value of field monto
     *
     * @param string $monto
     * @return $this
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;

        return $this;
    }

    /**
     * Method to set the value of field acumulado
     *
     * @param string $acumulado
     * @return $this
     */
    public function setAcumulado($acumulado)
    {
        $this->acumulado = $acumulado;

        return $this;
    }

    /**
     * Method to set the value of field descripcion
     *
     * @param string $descripcion
     * @return $this
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
     * Method to set the value of field type_movimientos_id
     *
     * @param integer $type_movimientos_id
     * @return $this
     */
    public function setTypeMovimientosId($type_movimientos_id)
    {
        $this->type_movimientos_id = $type_movimientos_id;

        return $this;
    }

    /**
     * Method to set the value of field usuario
     *
     * @param integer $usuario
     * @return $this
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

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
     * Method to set the value of field empresas_id
     *
     * @param integer $empresas_id
     * @return $this
     */
    public function setEmpresasId($empresas_id)
    {
        $this->empresas_id = $empresas_id;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field acumulado_nr
     *
     * @param string $acumulado_nr
     * @return $this
     */
    public function setAcumuladoNr($acumulado_nr)
    {
        $this->acumulado_nr = $acumulado_nr;

        return $this;
    }

    /**
     * Method to set the value of field descuento_nr
     *
     * @param string $descuento_nr
     * @return $this
     */
    public function setDescuentoNr($descuento_nr)
    {
        $this->descuento_nr = $descuento_nr;

        return $this;
    }

    /**
     * Method to set the value of field cod_platam
     *
     * @param integer $cod_platam
     * @return $this
     */
    public function setCodPlatam($cod_platam)
    {
        $this->cod_platam = $cod_platam;

        return $this;
    }

    /**
     * Method to set the value of field factura
     *
     * @param string $factura
     * @return $this
     */
    public function setFactura($factura)
    {
        $this->factura = $factura;

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
     * Returns the value of field fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Returns the value of field monto
     *
     * @return string
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * Returns the value of field acumulado
     *
     * @return string
     */
    public function getAcumulado()
    {
        return $this->acumulado;
    }

    /**
     * Returns the value of field descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
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
     * Returns the value of field type_movimientos_id
     *
     * @return integer
     */
    public function getTypeMovimientosId()
    {
        return $this->type_movimientos_id;
    }

    /**
     * Returns the value of field usuario
     *
     * @return integer
     */
    public function getUsuario()
    {
        return $this->usuario;
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
     * Returns the value of field task_id
     *
     * @return integer
     */
    public function getTaskId()
    {
        return $this->task_id;
    }

    /**
     * Returns the value of field empresas_id
     *
     * @return integer
     */
    public function getEmpresasId()
    {
        return $this->empresas_id;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field acumulado_nr
     *
     * @return string
     */
    public function getAcumuladoNr()
    {
        return $this->acumulado_nr;
    }

    /**
     * Returns the value of field descuento_nr
     *
     * @return string
     */
    public function getDescuentoNr()
    {
        return $this->descuento_nr;
    }

    /**
     * Returns the value of field cod_platam
     *
     * @return integer
     */
    public function getCodPlatam()
    {
        return $this->cod_platam;
    }

    /**
     * Returns the value of field factura
     *
     * @return string
     */
    public function getFactura()
    {
        return $this->factura;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('empresas_id', 'Empresas', 'id', array('alias' => 'Empresas'));
        $this->belongsTo('task_id', 'Task', 'id', array('alias' => 'Task'));
        $this->belongsTo('usuario', 'TblUsers', 'id', array('alias' => 'TblUsers'));
        $this->belongsTo('usercreate', 'TblUsers', 'id', array('alias' => 'TblUsers1'));
        $this->belongsTo('type_movimientos_id', 'TypeMovimientos', 'id', array('alias' => 'TypeMovimientos'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Movimientos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Movimientos
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
        return 'movimientos';
    }

}
