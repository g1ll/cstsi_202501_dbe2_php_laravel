<?php

spl_autoload_register(function ($class_name){
	echo "\nautoload_namespace:\n";
	var_dump($class_name);
    
    echo "\n\tDIR: ".__DIR__."\n\n";

    $path = implode('/',explode('\\',$class_name));

    echo "\n\tpath: $path\n\n";
	
    require_once "$path.php";
});