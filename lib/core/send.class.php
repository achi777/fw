<?php
class send{
    public function sendMail($to, $cc, $from, $subject, $text){
        $headers = "From: " . strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "CC: ". strip_tags($cc) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $message = '<html><body>';
        $message .= '<h1>'.$text.'</h1>';
        $message .= '</body></html>';
        if(mail($to, $subject, $message, $headers)){
            return true;
        }else{
            return false;
        }
    }
}