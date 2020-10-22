<?php

    $hora = (date("G") - 5);
    $minutos = date("i");
    $fecha1 = date("j");
    $fecha2 = date("n");
    $fecha3 = date("Y");
    $nombre = strtoupper($_POST["nombre"]);
    $apellido = strtoupper($_POST["apellido"]);
    $legajo = $_POST["legajo"];
    $rol = $_POST["rol"];
    $celular = $_POST["celular"];
    $mail = $_POST["mail"];
    $rol = $_POST["rol"];
    $rol2 = 0;

    if($rol == 0)
        $rol = "CAJERO";

    if($rol == 1)
        $rol = "SUPERVISOR";

    if($rol == 2)
        $rol = "COORDINADOR";

    if($rol == 3)
    {
        $rol = "RRHH";
        $rol2 = 1;
    }

    $fila = 1;

    $file = fopen("contaux.txt", "r");
    $file2 = fopen("cont.txt", "w+");
    $file3 = fopen("movimientos.txt", "r");
    $fileAux = fopen("movimientosAUX.txt", "w+");
    
    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode(",", $line);
        
        fputs($file2, $datos[0].",".$datos[1].",".$datos[2].",".$datos[3].",".$datos[4].",".$datos[5].",".$datos[6].",".$datos[7]);
        
    }
        

    fputs($file2, "\n".$nombre.",".$apellido.",".$legajo.",".$legajo.",".$rol2.",".$celular.",".$mail.",".$rol);

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

  

    fputs($fileAux, "\n".$nombre."|".$apellido."|".$legajo."|"."AGREGAR"."|".$hora."|".$minutos."|".$fecha1."|".$fecha2."|".$fecha3);

    fclose($file3);
    fclose($fileAux);
    if(unlink("movimientos.txt"))
    {
        rename("movimientosAUX.txt", "movimientos.txt");
    }

    $archivo = fopen("activacion.txt", "r");
    $archivoAux = fopen("activacionAux.txt", "w+");

    while(!feof($archivo))
    {
        $line = fgets($archivo);
        $datos = explode("|", $line);
        fputs($archivoAux, $datos[0]."|".$datos[1]);
    }

    fputs($archivoAux, "\n".$legajo."|0");

    fclose($archivo);
    fclose($archivoAux);

    if(unlink("activacion.txt"))
    {
        rename("activacionAux.txt", "activacion.txt");
    }

    header("Location: tables.php");

?>