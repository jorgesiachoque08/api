<?php

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class CalificacionParcial extends \Phalcon\Mvc\Model
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
    public $resource;

    /**
     *
     * @var string
     */
    public $concatenada;

    /**
     *
     * @var integer
     */
    public $resto;

    /**
     *
     * @var string
     */
    public $cliente;

    /**
     *
     * @var string
     */
    public $distancia;

    /**
     *
     * @var string
     */
    public $tiempo;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'calificacion_parcial';
    }

    public static function customQuery($condition, $parameters = null){
        $sql = "SELECT * FROM (
                    SELECT t.id AS id, CONCAT(IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id IN (1, 2, 3, 4, 7))))) > 0), 1, 0), IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 5)))) > 0), 1, 0), IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 6)))) > 0), 1, 0)) AS concatenada, ((IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id IN (1, 2, 3, 4, 7))))) > 0), 0, 50) + IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 5)))) > 0), 0, 25)) + IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 6)))) > 0), 0, 25)) AS resto, IF((((SELECT IF(ISNULL(califica_calificacion.calificacion), 0, califica_calificacion.calificacion) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 1)) ORDER BY califica_calificacion.id DESC LIMIT 1)) > 3), ((SELECT IF(ISNULL(califica_calificacion.calificacion), 0, califica_calificacion.calificacion) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 1)) ORDER BY califica_calificacion.id DESC LIMIT 1)), 0) AS cliente, ((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 5)))) AS distancia, ((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 6)))) AS tiempo, t.id_resource AS resource FROM task AS t
                ) T ";
        if(!is_null($condition)){
            $sql.= " WHERE ".$condition;
        }
        
        $partial = new CalificacionParcial();
        return new Resultset(null, $partial, $partial->getReadConnection()->query($sql, $parameters));
    }

    public static function finalScore($condition, $parameters = null){
        $sql = "
        SELECT * FROM (
                SELECT 
                calificacion_general.id AS id,
                calificacion_general.cliente AS cliente,
                calificacion_general.distancia AS distancia,
                calificacion_general.tiempo AS tiempo,
                calificacion_general.solicitante,
                calificacion_general.resource AS resource,
                (((calificacion_general.cliente * ((50 + IF(((LENGTH(calificacion_general.concatenada) - LENGTH(REPLACE(calificacion_general.concatenada,
                                '1',
                                ''))) > 0),
                    (calificacion_general.resto / (LENGTH(calificacion_general.concatenada) - LENGTH(REPLACE(calificacion_general.concatenada,
                                '1',
                                '')))),
                    '0')) / 100)) + (calificacion_general.distancia * ((25 + IF(((LENGTH(calificacion_general.concatenada) - LENGTH(REPLACE(calificacion_general.concatenada,
                                '1',
                                ''))) > 0),
                    (calificacion_general.resto / (LENGTH(calificacion_general.concatenada) - LENGTH(REPLACE(calificacion_general.concatenada,
                                '1',
                                '')))),
                    '0')) / 100))) + (calificacion_general.tiempo * ((25 + IF(((LENGTH(calificacion_general.concatenada) - LENGTH(REPLACE(calificacion_general.concatenada,
                                '1',
                                ''))) > 0),
                    (calificacion_general.resto / (LENGTH(calificacion_general.concatenada) - LENGTH(REPLACE(calificacion_general.concatenada,
                                '1',
                                '')))),
                    '0')) / 100))) AS calificacion_total
            FROM
                (
                SELECT * FROM (
                SELECT t.id AS id, t.solicitante, CONCAT(IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id IN (1, 2, 3, 4))))) > 0), 1, 0), IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 5)))) > 0), 1, 0), IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 6)))) > 0), 1, 0)) AS concatenada, ((IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id IN (1, 2, 3, 4))))) > 0), 0, 50) + IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 5)))) > 0), 0, 25)) + IF((((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 6)))) > 0), 0, 25)) AS resto, IF((((SELECT IF(ISNULL(califica_calificacion.calificacion), 0, califica_calificacion.calificacion) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 1)) ORDER BY califica_calificacion.id DESC LIMIT 1)) > 3), ((SELECT IF(ISNULL(califica_calificacion.calificacion), 0, califica_calificacion.calificacion) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 1)) ORDER BY califica_calificacion.id DESC LIMIT 1)), 0) AS cliente, ((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 5)))) AS distancia, ((SELECT IF(ISNULL((SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))), 0, (SUM(califica_calificacion.calificacion) / COUNT(califica_calificacion.calificacion))) FROM califica_calificacion AS califica_calificacion WHERE ((califica_calificacion.task_id = t.id) AND (califica_calificacion.califica_preguntas_id = 6)))) AS tiempo, t.id_resource AS resource FROM task AS t
                ) T WHERE ".$condition."
                )
                calificacion_general
            ) FINAL
            LIMIT 10000
         ";
        
        $partial = new CalificacionParcial();
        return new Resultset(null, $partial, $partial->getReadConnection()->query($sql, $parameters));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CalificacionParcial[]
     */
    public static function find($parameters = null)
    {   
        $query = $this->modelsManager->createQuery("SELECT * FROM Task LIMIT 10");
        $result  = $query->execute();
        return $result;
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CalificacionParcial
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
