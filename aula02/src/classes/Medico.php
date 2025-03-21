<?php
namespace Dbe2\Aula02\classes;

use Dbe2\Aula02\classes\Abstracts\Pessoa;
use Dbe2\Aula02\traits\IMC;
// use Dbe2\Aula02\classes\Pessoa;

class Medico extends Pessoa{

	use IMC;

	private $CRM, $especialidade;

	public function __construct($nome, $crm,$especialidade,$idade=null,$altura=1, $peso=1)
	{
		$this->nome = $nome;
		$this->CRM = $crm;
		$this->especialidade = $especialidade;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
		$this->calcImc();
	}

	public function getCRM(){
		return $this->CRM;
	}

	public function __toString()
	{
		$className = self::class;
		return 	"\n=== Dados de $className ==="
			. "\nHerança: ".parent::class
			. "\nAtributos:"
			. "\nIMC: ".$this->imc
			. "\n\tNome: $this->nome"
			. ($this->idade ? "\n\tIdade: $this->idade" : "")
			. "\n\tEspecialidade: $this->especialidade"
			. "\n\tCRM: $this->CRM\n";
	}
}