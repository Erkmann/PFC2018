<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../crud/CrudUsuario.php';

class Email
{
    private $to;
    private $subject;
    private $message;


    public function __construct($to, $subject, $message)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
    }


    public function sendEmail(){

        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);
        try {

            require_once "settingsEmail.php";


            $mail->setFrom('pfc2018@gmail.com', 'Projeto'); /* Quem Envia */
            $mail->addAddress($this->getTo()); /* Quem Recebe */

            //Conteudo
            $mail->isHTML(true);
            $mail->Subject = $this->getSubject();
            $mail->Body    = $this->getMessage();
            $mail->AltBody = $this->getMessage();

            $mail->send();
           return true;
        } catch (Exception $e) {
            echo 'Mensagem nao foi enviada: ', $mail->ErrorInfo;
            return false;
        }

    }

    /* Getters & Setters */

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

}

//$c = new Email('joaovitorjec@gmail.com','testandoProjeto','Foi agora?');
//$c->sendEmail();