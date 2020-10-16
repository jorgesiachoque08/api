<?php

class EmpresasParam extends \Phalcon\Mvc\Model
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
    public $descuento_p;

    /**
     *
     * @var string
     */
    public $b_saldos_empleados;

    /**
     *
     * @var integer
     */
    public $b_descuento_p;

    /**
     *
     * @var string
     */
    public $valor_minimo_s;

    /**
     *
     * @var integer
     */
    public $paradas_minimas;

    /**
     *
     * @var integer
     */
    public $empresas_id;

    /**
     *
     * @var string
     */
    public $token_id;

    /**
     *
     * @var string
     */
    public $endpoint;

    /**
     *
     * @var string
     */
    public $token_endpoint;

    /**
     *
     * @var string
     */
    public $razon_social;

    /**
     *
     * @var string
     */
    public $nombre_comercial;

    /**
     *
     * @var string
     */
    public $tipo_cliente;

    /**
     *
     * @var string
     */
    public $nombre_contacto_comercial;

    /**
     *
     * @var string
     */
    public $cargo_contacto_comercial;

    /**
     *
     * @var string
     */
    public $celular_contacto_comercial;

    /**
     *
     * @var string
     */
    public $telefono_contacto_comercial;

    /**
     *
     * @var string
     */
    public $correo_contacto_comercial;

    /**
     *
     * @var string
     */
    public $nombre_contacto_facturacion;

    /**
     *
     * @var string
     */
    public $cargo_contacto_facturacion;

    /**
     *
     * @var string
     */
    public $celular_contacto_facturacion;

    /**
     *
     * @var string
     */
    public $telefono_contacto_facturacion;

    /**
     *
     * @var string
     */
    public $correo_contacto_facturacion;

    /**
     *
     * @var string
     */
    public $plazo_facturacion;

    /**
     *
     * @var string
     */
    public $dia_facturacion;

    /**
     *
     * @var string
     */
    public $fecha_radicacion;

    /**
     *
     * @var string
     */
    public $envio_facturacion;

    /**
     *
     * @var string
     */
    public $responsable_comercial;

    /**
     *
     * @var string
     */
    public $responsable_financiera;

    /**
     *
     * @var string
     */
    public $forma_pago;

    /**
     *
     * @var integer
     */
    public $valor_domicilio;

    /**
     *
     * @var string
     */
    public $type_data;

    /**
     *
     * @var integer
     */
    public $view_services;

    /**
     *
     * @var string
     */
    public $negative_balance;

    /**
     *
     * @var string
     */
    public $evidence_video_url;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('empresas_id', 'Empresas', 'id', array('alias' => 'Empresas'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return EmpresasParam[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return EmpresasParam
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
        return 'empresas_param';
    }

}
