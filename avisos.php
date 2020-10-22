<?php

    $titulo = $_POST["titulo"];
    $subtitulo = $_POST["subtitulo"];
    $cuerpo = $_POST["cuerpo"];

    $file = fopen("avisos.txt", "r");
    $file2 = fopen("avisosAux.txt", "w+");


    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode("|", $line);
        
        fputs($file2, $line);
        
        
        if(feof($file))
        {         
            fputs($file2, "\n".$titulo."|".$subtitulo."|".$cuerpo);
        }
            }

    fclose($file);
    fclose($file2);


    if(unlink("avisos.txt"))
    {
        rename("avisosAux.txt", "avisos.txt");
    }

    header("Location: tables.php");

?>