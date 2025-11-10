<?php

namespace Clases;

class Medico extends Persona
{

    public function __construct(string $nombre, string $direccion, string $f_nac, private string $especialidad){
        parent::__construct($nombre, $direccion, $f_nac);
    }

    public function __toString(){
        return "Soy Medico". Parent::__toString().". Especialidad: ".$this->especialidad;
    }
}