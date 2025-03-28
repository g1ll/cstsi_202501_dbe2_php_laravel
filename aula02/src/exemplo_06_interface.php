<?php 

echo "<pre>";

use Dbe2\Aula02\classes\Arbitro;
use Dbe2\Aula02\classes\Atleta;
use Dbe2\Aula02\classes\Jogador;
use Dbe2\Aula02\classes\JogadorDefesa;
use Dbe2\Aula02\interfaces\IMC;

function esperaObjetoQueImplementaIMC(IMC $pessoaComIMC){
    $pessoaComIMC->showImc();
};

// function esperaObjetoQueMostraIMC(IMC | Jogador $pessoaComIMC){
//     $pessoaComIMC->showImc();
// };

$atl1 = new Atleta("Walter Kannemann",33,1.84,83);
$arbi = new Arbitro("Anderson Daronco",43,'Juiz',1.88,90);

$atl2 = new JogadorDefesa("Pedro Geromel",36, 1.83,75);

// esperaObjetoQueMostraIMC($atl2);

esperaObjetoQueImplementaIMC($atl1);

esperaObjetoQueImplementaIMC($arbi);

if($atl2 instanceof IMC)
    esperaObjetoQueImplementaIMC($atl2);