<?php
ini_set("precision", 16);

    function pdo_connect_mysql()
        {
            $DATABASE_HOST = 'localhost';
            $DATABASE_USER = 'root';
            $DATABASE_PASS = 'null';
            $DATABASE_NAME = 'geo';
        try {
        $pdo = new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	return $pdo;

        } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
            var_dump($exception);
    	//exit('Failed to connect to database!');
        }
    }
    function gen_id()
    {
        $uuid = bin2hex(random_bytes(16));
        $nonce= microtime(true);
        $hash = $nonce . "-" . $uuid;
        return hash('sha256', $hash);
    }
?> 