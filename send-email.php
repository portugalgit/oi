<?php
// Carregar o autoload do Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $message = $_POST['Message'];

    // Configurações do PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'acelso.emenio@gmail.com';
        $mail->Password = xxxxxxxxxxxxxxxxxxxxxxxxxxxxx
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configurações do email
        $mail->setFrom($email, $name);
        $mail->addAddress('acelso.emenio@gmail.com');
        $mail->Subject = 'Contato do Site - ' . $name;
        $mail->Body    = "Nome: $name\nEmail: $email\n\nMensagem:\n$message";

        // Enviar email
        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar email: {$mail->ErrorInfo}";
    }
}
?>
