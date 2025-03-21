<?php

namespace Dbe2\Aula02\classes;

use Dbe2\Aula02\traits\jogadores\ChutesAGol;
use Dbe2\Aula02\traits\jogadores\Dribles;

class JogadorAtacante extends Jogador
{

	use ChutesAGol, Dribles;

	public $altura, $peso;

	public function __construct($nome, $idade, $altura, $peso)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		$this->calcImc();
	}

	public function __toString(): string
	{
		$saida = parent::__toString();
		$saida .= "\n===Atribuições do ".self::class;
		if($this->estaComBola){
			$saida.="\n\nDribles:";
			$saida .= "\n".$this->rolinho();
			$saida .= "\n".$this->elastico();
			$saida.="\n\nChutes:";
			$saida .= "\n".$this->cavadinha();
			$saida .= "\n".$this->trivela();
		}
		return $saida;
	}
}
