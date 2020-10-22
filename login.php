<?php 
    
    session_start();
    
    $legajo = $_POST["nroLegajo"];
    $password = $_POST["password"];

    $fila = 1;
    
    $fp = fopen("contaux.txt", "r");
        while (!feof($fp)) {
            $linea = fgets($fp);
            
            $datos = explode(",", $linea);
            
            $nums = count($datos);
            
            if($datos[2] == $legajo)
            {
                if($datos[3] == $password)
                {
                    $file2 = fopen("sesionaux.txt","w+") or die("No se puede abrir el archivo!");
                    

                    
                    fputs($file2, $datos[0].",".$datos[1].",".$datos[2].",".$datos[3].",".$datos[4].",".$datos[5].",".$datos[6].",");
                    
                    for( $i = 0 ; $i < (strlen($datos[7]) - 1) ; $i++)
                    {
                        fputs($file2, $datos[7][$i]);
                    }
                    
                    if($datos[4] == 1)
                    {
                        header("Location: tables.php");
                    }
                    
                    else
                    {
                        header("Location: perfil.php");
                    }
                }
                else
                {
                    echo "<script>
                    
                            alert('PASSWORD INCORRECTA');
                            window.location = 'index.html';
                        </script>";
                }
            }
            
            $fila++;
        
    }
    fclose($fp);
    
    

    /*$file = fopen("contactosaux.csv", "w+");

        
        fwrite($file, "Hola");
        
        echo "<br/>"; 
    fclose($file);
    */

    


    ?>