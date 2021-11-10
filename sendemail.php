<?php
    require 'vendor/autoload.php';

    class SendEmail{

        public static function Sendmail($to,$subject,$content){
            $key ='';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("lorenzo.williams@gmail.com","Lorenzo Williams");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain",$content);
            //$email->addContent("text/html",$content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $$sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught: '.$e->getMessage()."\n";
                return false
            }
        }
    }
?>