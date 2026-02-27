<?php
function conectar() {
$servername = "localhost:3306";
$nomedb= "bancoed";
$username= "interdisciplinar";
$senha= "731";

$conexao= new PDO("mysql:host=$servername;dbname=$nomedb",$username,$senha);
return $conexao;
}
?>
