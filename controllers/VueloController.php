<?php

class VueloController {

    private $service;
    private $view;

    public function __construct() {
        $this->service = new VueloService();
        $this->view = new VueloView();
    }

    // Muestra el login
    public function mostrar() {
        
        $vuelos = json_decode($this->service->request_curl(), true);
        
        $vuelosAll = [];
        foreach ($vuelos as $vuelo) {
            $vuelosAll[] = new Vuelo($vuelo['identificador'], $vuelo['codorigen'], $vuelo['nombreorigen'], 
                                     $vuelo['paisorigen'], $vuelo['coddestino'], $vuelo['nombredestino'], 
                                     $vuelo['paisdestino'], $vuelo['tipovuelo'], $vuelo['fechavuelo'],
                                     $vuelo['pasajes']);
        }
        
        $this->view->mostrarVuelos($vuelosAll);
    }
}