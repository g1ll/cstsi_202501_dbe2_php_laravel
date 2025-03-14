<?php

include_once 'classes/Funcionario.php';

class Professor extends Funcionario
{
	public $area;

	function __construct(
		$nome,
		$idade,
		$altura = null,
		$peso = null,
		$salario = 0
	) {
		parent::__construct($nome, $idade, $altura, $peso, $salario, $area='geral');
        $this->area = $area;
        $this->salario = $salario;
    }

	public function areaAtuacao()
	{
		echo "\nAtua na área: " . $this->area;
        echo "\n Seu imc é:".$this->imc;
	}
}
