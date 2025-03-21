<?php
namespace Dbe2\Aula02\classes;


use Dbe2\Aula02\classes\Abstracts\Pessoa;
use Dbe2\Aula02\traits\IMC;
use Dbe2\Aula02\traits\jogadores\ToquesDeBola;

class Jogador extends Pessoa{

	use IMC, ToquesDeBola;

	public $altura, $peso;
	
	public function __construct($nome, $idade, $altura,$peso)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		$this->calcImc();
	}

	public function setAltura(float $altura){
		$this->altura = $altura;
		$this->calcImc();
	}

	public function setPeso(float $peso){
		$this->peso = $peso;
		$this->calcImc();
	}

	public function __set($name, $value){
		if($name=='imc')
			if(is_array($value)){
				if($value[0]>$value[1])
					$this->imc = $value[0]/$value[1]**2;
				else echo "Erro, o primeiro item deve ser o peso.";
			}else{
				echo "Erro ao atualizar imc, esperado um array [peso, altura]";
			}
		else $this->$name = $value;
	}


	public function __toString():string {
               $saida = "\n===Dados do ".self::class 
			   ."==="
               ."\nNome: $this->nome"
               .($this->idade ? "\nIdade: $this->idade" : "")
               ."\nPessoa: $this->peso"
               ."\nAltura: $this->altura";

		$saida .= (isset($this->imc))
				?"\nIMC: ".number_format($this->imc, 3)
				:"";

				if($this->estaComBola){
					$saida.="\n\nPasses:";
					$saida .= "\n".$this->umDoisCurto();
					$saida .= "\n".$this->lancamento();
				}
		return $saida;
	}
}