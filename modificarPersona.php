<?php

    $file = fopen("contaux.txt", "r");
    $file2 = fopen("cont.txt", "w+");
    $file3 = fopen("movimientos.txt", "r");
    $fileAux = fopen("movimientosAUX.txt", "w+");
    $nombre = strtoupper($_POST["nombre"]);
    $apellido = strtoupper($_POST["apellido"]);
    $legajo = $_POST["nroLegajo"];
    $mail = $_POST["mail"];
    $celular = $_POST["celular"];
    $puesto = strtoupper($_POST["puesto"]);
    $rol = 0;
    $hora = (date("G") - 5);
    $minutos = date("i");
    $fecha1 = date("j");
    $fecha2 = date("n");
    $fecha3 = date("Y");
    if($puesto == "RRHH")
        $rol = 1;


    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode(",", $line);
        
        
        if($legajo == $datos[2])
        {
            fputs($file2, $nombre.",".$apellido.",".$legajo.",".$datos[3].",".$rol.",".$celular.",".$mail.",".$puesto."\n");
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


    fputs($fileAux, "\n".$nombre."|".$apellido."|".$legajo."|"."MODIFICAR"."|".$hora."|".$minutos."|".$fecha1."|".$fecha2."|".$fecha3);

    fclose($file3);
    fclose($fileAux);

    if(unlink("movimientos.txt"))
    {
        rename("movimientosAUX.txt", "movimientos.txt");
    }

    header("Location: tables.php");
?>