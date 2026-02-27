<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function enviar_email($email, $token) {

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host       = 'smtp-relay.brevo.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'a32deb001@smtp-brevo.com';
        $mail->Password   = 'rLGhsMwxFJvbqUTn';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('interdisciplinar48@gmail.com', 'Estrutura de Dados');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Resetar Senha';

        $link = "http://localhost/Site_LP/Site-Web-/redefinir_senha.php?token=" . $token;

        $mail->Body = 'Clique no link para redefinir sua senha: 
        <a href="'.$link.'">Redefinir Senha</a>';

        $mail->send();
        echo 'Message has been sent';

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>