<?php

class Pessoa {
	public $nome, $idade, $altura, $peso;
}

echo '<pre>';
$obj = new Pessoa;
$obj->nome = "Gill";
$obj->idade = 34;

// print_r($obj);
var_dump($obj);