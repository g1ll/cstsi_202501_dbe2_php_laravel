<?php

namespace Dbe2\Aula02\traits\jogadores;


trait Zagueiro
{

    public bool $estaComBola = false;

    function cercaAdversario(): string
    {
        if (!$this->estaComBola)
            return "Cerca o adversario.";
        else return "Erro, jogador com bola.";
    }

    function lancamentoLongo(): string
    {
        if ($this->estaComBola)
            return "Faz lançamento longo.";
        else return "Erro, jogador com bola.";
    }

    function carrinho(): string
    {
        if (!$this->estaComBola)
            return "Realiza carrinho na bola.";
        else return "Erro, jogador com bola.";
    }
}
