<?php
namespace Dbe2\Aula02\classes\Abstracts;

abstract class Pessoa
{
	public $nome, $idade, $peso, $altura;

	public abstract function __toString(): string;

	public function __destruct()
	{
		echo "\n$this->nome foi destruido!";
	}

	public function __get($name){
		return $this->$name;
	}
}