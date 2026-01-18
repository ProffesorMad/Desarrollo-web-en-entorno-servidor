<?php
namespace Instituto\Clases;

class Alumno {
    public function __construct(
        private string $nombre,
        private string $email
    ) {}

    public function __toString() {
        return "$this->nombre - $this->email";
    }
}
