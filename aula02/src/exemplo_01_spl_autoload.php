<?php 
require "autoload.php";
// require "classes/Atletas.php";//obsoleto

use classes\Atacante;
use classes\Atletas;


$atl1 = new Atletas("Luizito",36,1.8,80);
$atl2 = new Atacante("Luiz Soarez",36,1.8,80);

$atl1->showImc();
$atl2->showImc();
