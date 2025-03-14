<?php

include_once 'classes/Pessoa.php';


class Funcionario extends Pessoa
{
	protected $salario;

	function __construct($nome, $idade, $altura, $peso, $salario = 0)
	{
		parent::__construct($nome, $idade, $altura, $peso);
		$this->salario = $salario;
	}

	function verSalario()
	{
		echo "\nSalario: " . $this->salario . "\n";
	}
}