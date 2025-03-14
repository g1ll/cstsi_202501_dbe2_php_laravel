<?php

include_once 'classes/Pessoa.php';

include_once 'classes/IMC.php';

$pessoa = new Pessoa("Lucia", 60, 1.55, 89);

IMC::calc($pessoa);

echo "IMC da $pessoa->nome eh ".$pessoa->getImc();

