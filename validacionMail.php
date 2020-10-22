<?php

    $email = $_POST["mail"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $legajo = $_POST["legajo"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];

    $file = fopen("activacion.txt", "r");



    while(!feof($file))
    {
        $line = fgets($file);
        $datos = explode("|", $line);
        
        if($legajo == $datos[0])
        {
            if($datos[1] == 1)
            {
               if($pass1 == $pass2)
               {
                    $file1 = fopen("contaux.txt", "r");
                    $file2 = fopen("cont.txt", "w+");
                   
                   while(!feof($file1))
                    {
                        $line = fgets($file1);
                        $datos = explode(",", $line);


                        if($legajo == $datos[2])
                        {
                            fputs($file2, $datos[0].",".$datos[1].",".$datos[2].",".$pass1.",".$datos[4].",".$datos[5].",".$datos[6].",".$datos[7]);
                        }
                        else
                        {
                            fputs($file2, $datos[0].",".$datos[1].",".$datos[2].",".$datos[3].",".$datos[4].",".$datos[5].",".$datos[6].",".$datos[7]);
                        }
        
                    }
        

                    fclose($file1);
                    fclose($file2);

                    if(unlink("contaux.txt"))
                    {
                        rename("cont.txt", "contaux.txt");
                    }
                    else
                    {
                        echo "ERROR";
                    }
                   
                   echo "<script>alert('Cambio realizado!');
                    window.location = 'tables.php'</script>";
               }
                else if($pass1 != $pass2)
                {
                    echo "<script>alert('Las contraseñas no coinciden, vuelva a intentarlo');
                    window.location = 'cambPass.php'</script>";
                }
            }
            else
            {

                $hash = md5(rand(0,1000));

                $random = rand(1000,5000);


                $to      = $email; // Send email to our user
                $subject = 'Ingresar | Verificación'; // Give the email a subject 
                $message = "

                Gracias por ingresar!
                A continuación verá sus datos dentro de WorkSpot, para seguir con la verifiación, si sus datos son correctos, prosiga a dar click en el link.

                ------------------------
                Username: {$nombre} {$apellido}
                Legajo: {$legajo}
                ------------------------

                Por favor haga click en el siguiente link para activar la cuenta!:
                https://edi2isft177.000webhostapp.com/verify.php?email={$legajo}&hash={$hash}

                "; // Our message above including the link

                $headers = 'From:noreply@workspot.com' . "\r\n"; // Set from headers
                mail($to, $subject, $message, $headers);
                
                echo "https://edi2isft177.000webhostapp.com/verify.php?email={$legajo}&hash={$hash}";
                /*echo "<script>
                        alert('Su correo electrónico no esta verificado, se envió un mail a su casilla con un link para que pueda verificarlo');
                        window.location = 'cambPass.php'
                     </script>";*/
                
            }
        }
    }


?>