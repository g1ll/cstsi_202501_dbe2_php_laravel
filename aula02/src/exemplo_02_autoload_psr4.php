<?php 
require "vendor/autoload.php";

use Dbe2\Aula02\classes\Atleta;
use Dbe2\Aula02\classes\Medico;
use utilphp\util as u;

$atl1 = new Atleta("Pedro Geromel",36, 1.83,75);
$med1 = new Medico("Paulo Paixão",122343,"Fisioterapeuta");


echo "\nAtleta: \n".$atl1;

echo "\nMedico: \n".$med1;

// $atl1->showImc();
// $med1->showImc();

// echo "\nutil: ".u::remove_accents($med1->nome);

