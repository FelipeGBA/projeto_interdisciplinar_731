<?php
function cadastrar_usuario($nome, $email, $senha){
    $conn = conectar();

    $sql = "INSERT INTO usuarios (nome, email, senha, role) 
            VALUES (:NOME, :EMAIL, :SENHA, 'Cliente')";
   
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $instrucao = $conn->prepare($sql);
    $instrucao -> bindParam(":NOME",$nome);
    $instrucao -> bindParam(":EMAIL",$email);
    $instrucao -> bindParam(":SENHA",$senhaHash);
    $instrucao -> execute();

    return true;
}



?>