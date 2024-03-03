<?php

class Pasajero {

    private $codpasajero;
    private $nombre;
    private $tlf;
    private $direccion;
    private $pais;

    public function __construct($codpasajero, $nombre, $tlf, $direccion, $pais) {
        $this->$codpasajero = $codpasajero;
        $this->nombre = $nombre;
        $this->tlf = $tlf;
        $this->direccion = $direccion;
        $this->pais = $pais;
    }

    public function getCodpasajero() {
        return $this->codpasajero;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTlf() {
        return $this->tlf;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function getPais() {
        return $this->pais;
    }

    public function setCodpasajero($codpasajero): void {
        $this->codpasajero = $codpasajero;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function setTlf($tlf): void {
        $this->tlf = $tlf;
    }

    public function setDireccion($direccion): void {
        $this->direccion = $direccion;
    }

    public function setPais($pais): void {
        $this->pais = $pais;
    }

    public function __destruct() {
        
    }
}
