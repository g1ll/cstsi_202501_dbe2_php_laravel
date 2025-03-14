<?php
include_once "Pessoa.php";

class IMC{

    public static function toString() { 
            return self::class;//$this

     }

    public static function calc(Pessoa $objPessoa){
        echo "Calculando o IMC de $objPessoa->nome\n";
        return;
    }

    public static function classifica(Pessoa $objPessoa){
        return self::calc($objPessoa);
    }
}