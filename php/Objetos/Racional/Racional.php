<?php

class Racional{

    private int $num;
    private int $den;

    public function  __construct(int | string $num=1, int $den=1)
    {
        $this->num = $num;
        $this->den = $den;
    }

    public function __toString(){
        return "$this->num/$this->den";
    }

}