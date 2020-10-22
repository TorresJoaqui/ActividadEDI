<?php

    $file = fopen("contaux.txt", "r");
    $file2 = fopen("activacion.txt", "w+");

    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode(",", $line);
        
        fputs($file2, $datos[2]."|0\n");
    }

fclose($file);
fclose($file2);



?>