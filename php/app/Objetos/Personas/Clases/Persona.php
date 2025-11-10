<?php

namespace Clases;
class Persona
{

    private string $nombre;
    private string $genero;
    private DateTime $fechaNacimiento;
    private int $edad;

    private static int $contador = 0;

    public function __construct($nombre, $fechaNacimiento, $genero)
    {
        $this->nombre = $nombre;
        $this->fechaNacimiento = new DateTime($fechaNacimiento);
        $this->genero = $genero;
        $this->edad = $this->calcularEdad();
        self::$contador++;
    }

    private function calcularEdad()
    {
        $hoy = new DateTime();
        return $this->fechaNacimiento->diff($hoy)->y;
    }

    public static function getContador()
    {
        return self::$contador;
    }

    public function __toString()
    {
        return $this->nombre . " Nacido el: " . $this->fechaNacimiento->format("d/m/Y") .
            " Edad: " . $this->edad .
            " Genero: " . $this->genero;
    }
}
