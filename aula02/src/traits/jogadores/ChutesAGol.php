<?php

namespace Dbe2\Aula02\traits\jogadores;


trait ChutesAGol{

    public bool $estaComBola = false;

    function trivela():string{
        if($this->estaComBola)
            return "Chuta de trivela.";
    }

    function cavadinha():string{
        if($this->estaComBola)
            return "Chuta de cavadinha.";
    }

    function efeitoCurva():string{
        if($this->estaComBola)
            return "Chuta com efeito.";
    }
}