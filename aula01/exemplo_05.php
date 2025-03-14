<?php 

class Pessoa {
	private float $imc;

	function __construct(
		public string $nome,
		public int $idade,
		public float $peso = 0,
		public float $altura = 0,
	) {
		echo "\nObjeto $this->nome construído!!!";
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruído!!";
	}

	function calcIMC(){
		if(!$this->peso && !$this->altura){
			echo "\nErro: configurar peso e altura primeiro!!\n";
			$this->imc = 0;
			return;
		}
		$this->imc = $this->peso/$this->altura**2;
	}

	function getImc(){
		return $this->imc;
	}

	function __get($nomeAtributo){//imc
		var_dump($nomeAtributo);
		return $this->$nomeAtributo; //imc ($this->imc)
	}
}

$pessoaUm = new Pessoa("Gill",36);
$pessoaDois = new Pessoa("Vera",60,89,1.55);

$pessoaUm->calcIMC();
$pessoaDois->calcIMC();

echo "\nO IMC do $pessoaDois->nome eh ".number_format($pessoaDois->imc,2)." \n";

echo "\nIMC do $pessoaUm->nome: ".number_format($pessoaUm->imc,2).

var_dump($pessoaUm, $pessoaDois);