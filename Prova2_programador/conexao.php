<?php

    //INÍCIO DA CONEXÃO COM O BANCO DE DADOS UTILIZANDO PDO

    $host = "localhost";
    $user = "cac";
    $pass = "";
    $dbname = "teste01";
    $port = "127.0.0.1";

    try{
        //CONEXÃO COM A PORTA
        //$conn = new PDO("mysql:host=$host;port=$port;dbname=". $dbname, $user, $pass);

        //CONEXÃO SEM PORTA
        $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    } catch (PDOException $err){
        echo "ERRO: CONEXÃO COM O BANCO DE DADOS NÃO REALIZADO COM SUCESSO." . $err ->getMessage();
    }
    //FIM DA CONEXÃO COM O BANCO DE DADOS UTILIZANDO PDO
?>