<?php 


class Mail{
    
    private $to;
    private $subject;
    private $message;
    private $headers;

    public function __construct(){
        $this->headers = "From: nounou@pandatown.fr\r\n";
        $this->headers .= "Reply-To: contact@pandatown.fr\r\n";
        $this->headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    }
    public function sendEmail($to, $subject, $message) {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $mailSent = mail($this->to, $this->subject, $this->message, $this->headers);
        
        if ($mailSent) {
            return true;
        } else {
            return false;
        }
    }
}