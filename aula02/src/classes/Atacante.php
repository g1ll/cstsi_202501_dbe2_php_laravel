<?php
namespace classes;

use Exception;//Classe global do PHP 

class Atacante{

	public $altura, $peso,$nome,$idade;
	private $imc;
	
	public function __construct($nome, $idade, $altura,$peso)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
		$this->calcImc();
	}

	public function calcImc():void 
	{
		try {
			if(isset($this->peso)&&isset($this->altura)) {
				$this->imc = $this->peso/$this->altura**2;		
			} else{
				throw new Exception("Erro, defina peso e altura primeiro!");
			}
		} catch (Exception $error) {
			echo $error->getMessage();
			foreach($error->getTrace() as $trace) print_r($trace);
			throw $error;
		}
	}

	public function showImc():void
	{
		if(is_numeric($this->imc))
			echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";
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
				else echo "Erro, o primeiro valor deve ser o peso.";
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
		return $saida;
	}
}