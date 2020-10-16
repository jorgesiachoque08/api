<?php

class TypeTask extends \Phalcon\Mvc\Model
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
    public $nombre;

    /**
     *
     * @var integer
     */
    public $tiempo;

    /**
     *
     * @var string
     */
    public $unidad;

    /**
     *
     * @var string
     */
    public $valor;

    /**
     *
     * @var string
     */
    public $descripcion;

    /**
     *
     * @var string
     */
    public $hint;

    /**
     *
     * @var integer
     */
    public $creditos;

    /**
     *
     * @var integer
     */
    public $activo;

    /**
     *
     * @var string
     */
    public $alcance;

    /**
     *
     * @var integer
     */
    public $comision_porcentaje;

    /**
     *
     * @var integer
     */
    public $distancia;

    /**
     *
     * @var integer
     */
    public $es_por_tiempo;

    /**
     *
     * @var integer
     */
    public $type_recurso_id;

    /**
     *
     * @var integer
     */
    public $puntos;

    /**
     *
     * @var string
     */
    public $comision_porcentaje_p;

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
     * Method to set the value of field nombre
     *
     * @param string $nombre
     * @return $this
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Method to set the value of field tiempo
     *
     * @param integer $tiempo
     * @return $this
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;

        return $this;
    }

    /**
     * Method to set the value of field unidad
     *
     * @param string $unidad
     * @return $this
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Method to set the value of field valor
     *
     * @param string $valor
     * @return $this
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

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
     * Method to set the value of field hint
     *
     * @param string $hint
     * @return $this
     */
    public function setHint($hint)
    {
        $this->hint = $hint;

        return $this;
    }

    /**
     * Method to set the value of field creditos
     *
     * @param integer $creditos
     * @return $this
     */
    public function setCreditos($creditos)
    {
        $this->creditos = $creditos;

        return $this;
    }

    /**
     * Method to set the value of field activo
     *
     * @param integer $activo
     * @return $this
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Method to set the value of field alcance
     *
     * @param string $alcance
     * @return $this
     */
    public function setAlcance($alcance)
    {
        $this->alcance = $alcance;

        return $this;
    }

    /**
     * Method to set the value of field comision_porcentaje
     *
     * @param integer $comision_porcentaje
     * @return $this
     */
    public function setComisionPorcentaje($comision_porcentaje)
    {
        $this->comision_porcentaje = $comision_porcentaje;

        return $this;
    }

    /**
     * Method to set the value of field distancia
     *
     * @param integer $distancia
     * @return $this
     */
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Method to set the value of field es_por_tiempo
     *
     * @param integer $es_por_tiempo
     * @return $this
     */
    public function setEsPorTiempo($es_por_tiempo)
    {
        $this->es_por_tiempo = $es_por_tiempo;

        return $this;
    }

    /**
     * Method to set the value of field type_recurso_id
     *
     * @param integer $type_recurso_id
     * @return $this
     */
    public function setTypeRecursoId($type_recurso_id)
    {
        $this->type_recurso_id = $type_recurso_id;

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
     * Method to set the value of field comision_porcentaje_p
     *
     * @param string $comision_porcentaje_p
     * @return $this
     */
    public function setComisionPorcentajeP($comision_porcentaje_p)
    {
        $this->comision_porcentaje_p = $comision_porcentaje_p;

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
     * Returns the value of field nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Returns the value of field tiempo
     *
     * @return integer
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * Returns the value of field unidad
     *
     * @return string
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Returns the value of field valor
     *
     * @return string
     */
    public function getValor()
    {
        return $this->valor;
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
     * Returns the value of field hint
     *
     * @return string
     */
    public function getHint()
    {
        return $this->hint;
    }

    /**
     * Returns the value of field creditos
     *
     * @return integer
     */
    public function getCreditos()
    {
        return $this->creditos;
    }

    /**
     * Returns the value of field activo
     *
     * @return integer
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Returns the value of field alcance
     *
     * @return string
     */
    public function getAlcance()
    {
        return $this->alcance;
    }

    /**
     * Returns the value of field comision_porcentaje
     *
     * @return integer
     */
    public function getComisionPorcentaje()
    {
        return $this->comision_porcentaje;
    }

    /**
     * Returns the value of field distancia
     *
     * @return integer
     */
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * Returns the value of field es_por_tiempo
     *
     * @return integer
     */
    public function getEsPorTiempo()
    {
        return $this->es_por_tiempo;
    }

    /**
     * Returns the value of field type_recurso_id
     *
     * @return integer
     */
    public function getTypeRecursoId()
    {
        return $this->type_recurso_id;
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
     * Returns the value of field comision_porcentaje_p
     *
     * @return string
     */
    public function getComisionPorcentajeP()
    {
        return $this->comision_porcentaje_p;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'CodeProm', 'type_task_id', array('alias' => 'CodeProm'));
        $this->hasMany('id', 'EmpresasPreciosServicio', 'id_type_task', array('alias' => 'EmpresasPreciosServicio'));
        $this->hasMany('id', 'Task', 'type_task_id', array('alias' => 'Task'));
        $this->hasMany('id', 'TypeTaskCity', 'id_type_task', array('alias' => 'TypeTaskCity'));
        $this->belongsTo('type_recurso_id', 'TypeRecurso', 'id', array('alias' => 'TypeRecurso'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeTask[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TypeTask
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
        return 'type_task';
    }

}
