<?php 

class Pessoa {
	public $nome, $idade, $altura, $peso;
}

$pessoaUm = new Pessoa;
$pessoaUm->nome = "Gill";
$pessoaUm->idade = 34;


$pessoaDois = new Pessoa;
$pessoaDois->nome = "Vera";
$pessoaDois->idade = 60;
$pessoaDois->altura = 1.55;
$pessoaDois->peso = 89;

var_dump($pessoaUm, $pessoaDois);