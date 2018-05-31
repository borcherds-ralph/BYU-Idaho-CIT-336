<?php

    function acmeConnect(){
        if ($_SERVER['HTTP_HOST'] == 'localhost')  {
            $basepath = '/cit336/acme';
        } else {
           $basepath = '/acme';
        }
        
        $server = 'localhost';
        $dbname= 'acme';
        $username = 'cit336';
        $password = '*************';
        $dsn = "mysql:host=$server;dbname=$dbname";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
       
        // Create the actual connection object and assign it to a variable
        try {
            $link = new PDO($dsn, $username, $password, $options);
        return $link;
        } catch(PDOException $e) {
            header("Location: $basepath/view/500.php");
            exit;
        }
    }
// acmeConnect();

