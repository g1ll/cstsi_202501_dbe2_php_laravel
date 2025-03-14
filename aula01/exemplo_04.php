<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;

	function __construct($nome, $idade, $altura=0, $peso=0)
	{
		$this->nome = $nome;
		$this->idade = $idade;
		$this->peso = $peso;
		$this->altura = $altura;
	}

	function __destruct()
	{
		echo "\n$this->nome foi destruído!!";
	}
}

$pessoaUm = new Pessoa("Gill",36);
$pessoaDois = new Pessoa("Vera",60,1.55,89);

$pessoaTres = new Pessoa('Fulano',24);
var_dump($pessoaTres);
die;
$pessoaTres = null;

var_dump($pessoaUm, $pessoaDois);