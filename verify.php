<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
        {
    // Verify data
    $email = $_GET['email']; // Set email variable
    $hash = $_GET['hash']; // Set hash variable
        }
    $legajo = $email;
    
    $file = fopen ("activacion.txt", "r");
    $file2 = fopen ("activacionAux.txt", "w+");
    
    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode("|", $line);
        
        if($datos[0] == $legajo)
        {
            fputs($file2, $datos[0]."|1\n");
        }
        else
        {
            fputs($file2, $datos[0]."|".$datos[1]);
        }
        
    }
    
    fclose($file);
    fclose($file2);
    
    if(unlink("activacion.txt"))
    {
        rename("activacionAux.txt", "activacion.txt");
    }
    
    echo "OK";
    
    ?>
</body>
</html>