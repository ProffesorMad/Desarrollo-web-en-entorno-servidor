<?php

use Clases\A;
use Clases\B;
use Clases\C;
use Clases\D;
use Clases\Persona;

spl_autoload_register(function ($clase) {
    require "Clases/$clase.php";
});

$a = new A();
$b = new B();
$c = new C();
$d = new D();

require_once("Persona.php");

$p1 = new Persona("Ana Martinez", "2000-04-02", "M");
echo "$p1 En la base de datos tengo ".Persona::getContador()." personas<br><br>";

$p2 = new Persona("Paco Blanco", "1993-10-21", "H");
echo "$p2  En la base de datos tengo ".Persona::getContador()." personas<br><br>";

$p3 = new Persona("Luis Figo", "1980-01-05", "H");
echo "$p3  En la base de datos tengo ".Persona::getContador()." personas<br><br>";

