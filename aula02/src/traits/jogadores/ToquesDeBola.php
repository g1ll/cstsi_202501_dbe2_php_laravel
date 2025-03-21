<?php

namespace Dbe2\Aula02\traits\jogadores;


trait ToquesDeBola{

    public bool $estaComBola = false;

    function umDoisCurto():string{
        return "Realiza passe um dois curto.";
    }

    function lancamento():string{
        if($this->estaComBola)
            return "Faz lançamento.";
    }

    function cruzamento():string{
        if($this->estaComBola)
            return "Faz um cruzamento.";
    }
}