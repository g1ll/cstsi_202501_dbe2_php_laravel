<?php 
namespace Dbe2\Aula01Projeto02\classes\logs;

//	"----src/---/classes/Atleta.php
use Dbe2\Aula01Projeto02\classes\Atleta as AtletaData;

class StaticRelatorio {
	public static function log(AtletaData $atleta){
		echo "\nLog:\n".$atleta;
	}
}