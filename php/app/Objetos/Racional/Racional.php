<?php

class Racional
{

    private int $num;
    private int $den;

    public function __construct(int|string $num = 1, int $den = 1)
    {
        $this->num = $num;
        $this->den = $den;
    }

    public function __toString()
    {
        return "$this->num/$this->den";
    }

    public function sumar(Racional $op2):Racional{
        $den = $op2->den*$this->den;
        $num = $op2->num*$this->den+$op2->den*$this->num;
        return new Racional($num,$den);
    }

    public function restar(Racional $op2):Racional{
        $den = $op2->den * $this->den;
        $num = $this->num*$op2->den - $op2->num*$this->den;
        return new Racional($num,$den);
    }

    public function multiplicar(Racional $op2):Racional{
        $num = $this->num * $op2->num;
        $den = $this->den * $op2->den;
        return new Racional($num,$den);
    }

    public function dividir(Racional $op2):Racional{
        $num = $this->num * $op2->den;
        $den = $this->den * $op2->num;
        return new Racional($num,$den);
    }
}
