<?php

namespace Dbe2\Aula02\traits\jogadores;


trait Dribles{

    public bool $estaComBola = false;

    function elastico():string{
        return "Realiza eslástico no adversário.";
    }

    function rolinho():string{
        if($this->estaComBola)
            return "Faz o rolinho com a bola.";
    }

    function pedala():string{
        if($this->estaComBola)
            return "Faz a pedalada.";
    }
}