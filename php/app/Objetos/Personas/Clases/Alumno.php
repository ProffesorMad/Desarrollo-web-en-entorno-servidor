<?php

namespace Objetos\Personas\Clases;

class Alumno extends Persona
{
    private string $email;

    public function __construct(string $nombre, string $email)
    {
        parent::__construct($nombre);
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->getNombre() . " - " . $this->email;
    }
}
