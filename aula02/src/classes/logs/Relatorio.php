<?php 
namespace Dbe2\Aula02\classes\logs;

use Dbe2\Aula02\classes\Abstracts\Pessoa;

class Relatorio{

	private array $pessoas = [];//lista

	public function add(Pessoa $pessoa):void
	{
		$this->pessoas[]=$pessoa;
	}
	
	public function log(Pessoa $pessoa):void
	{
		echo "\n\nlog: \n".$pessoa;//__toString retorna objeto como string
	}

	public function imprime(): void{
		echo "\n### RELATORIO ###\n";
		foreach ($this->pessoas as $pessoa) 
			$this->log($pessoa);
		echo "\n#############\n";
	}
}