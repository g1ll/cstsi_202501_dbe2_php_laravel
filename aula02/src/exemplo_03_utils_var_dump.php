<?php 

echo "<pre>";

use Dbe2\Aula02\classes\Atleta;
use Dbe2\Aula02\classes\Medico;
use utilphp\util;

$atl1 = new Atleta("Pedro Geromel",36,1.83,75);
$med1 = new Medico("Pualo Paixão",122343,"Fisioterapeuta");

$list = [$atl1,$med1];

util::var_dump($list);

print_r(
    array_map(fn($p)=>util::slugify($p->nome),$list)
);

