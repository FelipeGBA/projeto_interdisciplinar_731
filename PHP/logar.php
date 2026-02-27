<?php
session_start();
include 'banco.php';

if(isset($_POST['salvar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = login($email, $senha);

    if($usuario) {
        $_SESSION['usuario'] = $usuario;
        header("Location: ../HTML/pilha.php");
        exit;
    } else {
        die("Email ou senha incorretos.");
    }
}