<?php 

        $legajo;

        $file = fopen("activacion.txt", "w+");

        $hash = md5(rand(0,1000));

        $email = "torresjoaquin42457@gmail.com";

        $random = rand(1000,5000);

        echo "//localhost/verify.php?email='.$email.'&hash='.$hash.'";

        $to      = $email; // Send email to our user
$subject = 'Ingresar | Verificación'; // Give the email a subject 
$message = '
 
Gracias por ingresar!
A continuación verá sus datos dentro de WorkSpot, para seguir con la verifiación, si sus datos son correctos, prosiga a dar click en el link.
 
------------------------
Username: '.$nombre. ''.$apellido.'
Legajo: '.$legajo.'
------------------------
 
Por favor haga click en el siguiente link para activar la cuenta!:
https://edi2isft177.000webhostapp.com/verify.php?email='.$legajo.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:noreply@workspot.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email

        //$mi_pdf = 'archivos/JOAQUIN.pdf';
        //header('Content-type: application/pdf');
        //header('Content-Disposition: attachment; filename="'.$mi_pdf.'"');
        ///header("Location: {$mi_pdf}");
        ///readfile($mi_pdf);
        
        ///echo "<a href='{$mi_pdf}'>A</a>";

    

    /*$file = fopen("contactosaux.csv", "w+");

        
        fwrite($file, "Hola");
        
        echo "<br/>"; 
    
    fclose($file);*/

    


    ?>