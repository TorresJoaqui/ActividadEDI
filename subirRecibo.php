 <?php

    $mes = date("m");

    $anio = date("y");

    $legajo = $_POST["nroLegajo"];

    $nombre = $_FILES["pdf"]["name"];

    $guardado = $_FILES["pdf"]["tmp_name"];

    $nombrePdf = "archivos/".$mes."-".$anio."-".$legajo.".pdf";

    if(!file_exists("archivos"))
    {
        mkdir("archivos", 0770, true);
        if(file_exists("archivos"))
        {
            if(move_uploaded_file($guardado, "archivos/".$nombre))
        {
            rename("archivos/".$nombre, $nombrePdf);
        
            //header("Location: {$nombrePdf}");
        }
        else
        {
             echo "<script>
        
            alert('Ocurrió un error, vuelva a intentarlo mas tarde');
            
            window.location = 'agregarRecibo.php';
        
            </script>";
        }
        }
    }

else
{
    if(move_uploaded_file($guardado, "archivos/".$nombre))
        {   
            rename("archivos/".$nombre, $nombrePdf);
        
            //header("Location: {$nombrePdf}");
        }
    
    else
    {
        echo "<script>
        
            alert('Ocurrió un error, vuelva a intentarlo mas tarde');
            
            window.location = 'agregarRecibo.php';
        
            </script>";
    }
}


    $file = fopen("sueldos.txt", "r");

    $file2 = fopen("sueldosAux.txt", "w+");

    $ok = 0;

    while(!feof($file))
    {
        if($ok > 0)
           fputs($file2,"\n");
        
        $line = fgets($file);
        $datos = explode("|", $line);
        $numeros = count($datos);
        
        for( $i = 0; $i < (strlen($line) - 1); $i++)
        {
            fputs($file2,$line[$i]);
        }
        
        
        if(feof($file))
        {
            fputs($file2,"|");
        }
        
        if($datos[0] == $legajo)
        {
            fputs($file2, $nombrePdf."|");
            
        }
        
        
        $ok++;
        
        
    }

    fclose($file);
    fclose($file2);

    if(unlink("sueldos.txt"))
    {
        rename("sueldosAux.txt", "sueldos.txt");
    }

    echo "<script>
            
            window.location = 'tables.php';
        
        </script>";


?>