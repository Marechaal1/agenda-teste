<?php
    //CONEXÃO COM O BANCO DE DADOS
    $host = "containers-us-west-60.railway.app";
    $dbname = "railway";
    $user = 'root';
    $pass = 'gfWddImAoLV9MaOvMZRh';
    $port = "6749";
    
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    try{ 

        $conn = new PDO($dsn, $user, $pass);

        //ATIVAR O MODO DE ERROS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        //ERRO NA CONEXÃO
        $error = $e->getMessage();
        echo "ERROR : $error"; 
    }
