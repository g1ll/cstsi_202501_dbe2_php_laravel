<?php

include_once 'classes/Pessoa.php';
include_once 'classes/Professor.php';



$pessoaUm = new Pessoa("Joao", 35);
$pessoaDois = new Pessoa("Lucia", 60, 1.55, 89);


$pessoaUm->calcImc();
$pessoaDois->calcImc();

$pessoaTres = new Professor('Gill', 35, 1.55, 89, 5000);
$pessoaTres->calcImc(); //Pessoa
$pessoaTres->verSalario(); //Funcionario
$pessoaTres->areaAtuacao(); //meu metodo

echo "\n====================VARDUMPS OBJETOS=============\n";
var_dump($pessoaUm, $pessoaDois, $pessoaTres);
