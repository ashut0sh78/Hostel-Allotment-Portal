
<?php
    require 'vendor/autoload.php';
        function sendMail($mail_of_receiver,$name_of_sender,$otp,$admission_number){ 
            $transport = new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl');
            $transport->setUsername($_ENV['gmailUsername']);
            $transport->setPassword($_ENV['gmailPassword']);
            $mailer = new Swift_Mailer($transport);
            $message = new Swift_Message('Request for hostel room partner');
            $message->setFrom(array($_ENV['gmailUsername'] => 'Hostel Administration'));
            $message->setTo(array($mail_of_receiver => $admission_number));
            $message->setBody(
                "Tell this otp to <strong>".$name_of_sender."</strong> to accept him as room partner.<strong>OTP </strong>is <strong>".$otp."</strong>", 'text/html'
            );
            $result = $mailer->send($message);
            return $result;
        }
            
