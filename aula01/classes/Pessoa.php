<?php

class Pessoa
{
	public $nome, $idade, $altura, $peso;
	protected $imc;

	function __construct(
		$nome,
		$idade,
		$altura = null,
		$peso = null
	) {
		$this->nome = $nome;
		$this->idade = $idade;
		$this->altura = $altura;
		$this->peso = $peso;
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruido!";
	}

	function calcImc()
	{
		if (
			!is_numeric($this->altura)
			&& !is_numeric($this->peso)
		) {
			echo "\nIMC $this->nome: Erro, informe peso e altura corretamente.\n";
            return;
        }

        $this->imc = $this->peso / $this->altura ** 2;
		echo "\nO IMC do $this->nome é: " . number_format($this->imc, 2) . "\n";
		
	}

    function setImc($valor){
        $this->imc = $valor;
    }

    function getImc(){
        return $this->imc;
    }
}