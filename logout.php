<?php
   
    session_start(); 
    session_destroy();
    unlink("sesionaux.txt");
    header("location: index.html");
    exit();



?>