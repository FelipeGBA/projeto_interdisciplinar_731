<?php
$servername = "localhost:3306";
$nomedb= "bancodb";
$username= "teste1";
$senha= "daniel261";

$conexao= new PDO("mysql:host=$servername;dbname=$nomedb",$username,$senha);
echo("Conexão realizada com sucesso!");
echo("Olá munde")
?>
