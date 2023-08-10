<?php
    //CONEXÃO COM O BANCO DE DADOS
    $host = "containers-us-west-120.railway.app";
    $dbname = "railway";
    $user = 'root';
    $pass = 'phP46hrHmZyenfsP2TgH';
    $dsn = "mysql://root:phP46hrHmZyenfsP2TgH@containers-us-west-120.railway.app:6272/railway";

    try{ 

        $conn = new PDO($dsn, $user, $pass);

        //ATIVAR O MODO DE ERROS
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        //ERRO NA CONEXÃO
        $error = $e->getMessage();
        echo "ERROR : $error"; 
    }