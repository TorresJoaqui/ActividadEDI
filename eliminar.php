<?php

    $file = fopen("contaux.txt", "r");
    $file2 = fopen("cont.txt", "w+");
    $file3 = fopen("movimientos.txt", "r");
    $fileAux = fopen("movimientosAUX.txt", "w+");
    $legajo = $_POST["legajo"];
    $nombre1;
    $apellido2;
    $legajo3;
    $hora = (date("G") - 5);
    $minutos = date("i");
    $fecha1 = date("j");
    $fecha2 = date("n");
    $fecha3 = date("Y");



    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode(",", $line);
        
        
        if($legajo == $datos[2])
        {
            $nombre1 = $datos[0];
            $apellido2 = $datos[1];
            $legajo3 = $datos[2];
            
            continue;
        }
        else
        {
            fputs($file2, $datos[0].",".$datos[1].",".$datos[2].",".$datos[3].",".$datos[4].",".$datos[5].",".$datos[6].",".$datos[7]);
        }
        
    }
        

    fclose($file);
    fclose($file2);

    if(unlink("contaux.txt"))
    {
        rename("cont.txt", "contaux.txt");
    }
    else
    {
        echo "ERROR";
    }


    while(!feof($file3))
    {
        $line = fgets($file3);
        $datos = explode("|", $line);
        fputs($fileAux, $datos[0]."|".$datos[1]."|".$datos[2]."|".$datos[3]."|".$datos[4]."|".$datos[5]."|".$datos[6]."|".$datos[7]."|".$datos[8]);
    }


    fputs($fileAux, "\n".$nombre1."|".$apellido2."|".$legajo3."|"."ELIMINAR"."|".$hora."|".$minutos."|".$fecha1."|".$fecha2."|".$fecha3);

    fclose($file3);
    fclose($fileAux);

    if(unlink("movimientos.txt"))
    {
        rename("movimientosAUX.txt", "movimientos.txt");
    }

    header("Location: tables.php");

?>