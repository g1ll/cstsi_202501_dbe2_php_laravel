<?php

include_once 'classes/Pessoa.php';

include_once 'classes/IMC.php';

echo "\nClasse statica ".IMC::toString()."\n";

$pessoa = new Pessoa("Lucia", 60, 1.55, 89);

// IMC::calc($pessoa);

IMC::classifica($pessoa);

echo "IMC da $pessoa->nome eh ".$pessoa->getImc();

