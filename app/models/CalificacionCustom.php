<?php

use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class CalificacionCustom extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var datetime
     */
    public $tiempo_inicio;

    /**
     *
     * @var datetime
     */
    public $tiempo_asignacion;

    /**
     *
     * @var float
     */
    public $cliente;

    /**
     *
     * @var float
     */
    public $distancia;

    /**
     *
     * @var float
     */
    public $tiempo;

    /**
     *
     * @var integer
     */
    public $tipo_servicio;



    public static function messengerScore($condition, $parameters = null){
        $sql = "
            select t.id, t.type_task_id as tipo_servicio,
            concat(t.fecha_inicio, ' ',t.hora_inicio) as tiempo_inicio,
            (select datecreate from task_history where task_id = t.id and type_task_status_id = 3 order by id desc limit 1) as tiempo_asignacion,
            (
                select calificacion 
                from califica_calificacion c
                where c.task_id = t.id
                and c.califica_preguntas_id in (1,2,3,4,7)
                and c.calificacion > 0
                order by id desc
                limit 1
            ) as cliente,
            (
                select SUM(calificacion)/COUNT(calificacion)
                from califica_calificacion c
                where c.task_id = t.id
                and c.califica_preguntas_id in (5)
                and c.calificacion > 0
            ) as distancia,
            (
                select SUM(calificacion)/COUNT(calificacion)
                from califica_calificacion c
                where c.task_id = t.id
                and c.califica_preguntas_id in (6)
                and c.calificacion > 0
            ) as tiempo
            from task t 
            where ".$condition;

        $partial = new CalificacionCustom();
        return new Resultset(null, $partial, $partial->getReadConnection()->query($sql, $parameters));
    }

}
