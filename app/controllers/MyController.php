<?php

use Phalcon\Mvc\Controller;

class MyController extends Controller {

    public function indexAction() {
        $ciudades = Ciudad::find();
        echo $this->params->urlFront;
        foreach ($ciudades as $ciudad) {
            echo'<pre>';
            print_r($ciudad);
        }
    }

}
