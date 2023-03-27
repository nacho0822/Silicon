<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';



/**
 * This example shows how to handle a simple contact form safely.
 */

//Import PHPMailer class into the global namespace


$msg = '';
//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');

   

    //Create a new PHPMailer instance
    $phpmailer = new PHPMailer();
    //Send using SMTP to localhost (faster and safer than using mail()) – requires a local mail server
    //See other examples for how to use a remote server such as gmail
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.office365.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->AuthType = 'LOGIN';
    $phpmailer->Port = 587;
    $phpmailer->Username = 'phpsecondary@outlook.com';
    $phpmailer->Password = 'Boca159951!';
    $phpmailer->SMTPSecure = 'tls';

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $phpmailer->setFrom('phpsecondary@outlook.com', 'First Last');
    //Choose who the message should be sent to
    //You don't have to use a <select> like in this example, you can simply use a fixed address
    //the important thing is *not* to trust an email address submitted from the form directly,
    //as an attacker can substitute their own and try to use your form to send spam
    $addresses = [
        'Asesoramiento Personalizado' => 'nacho.gonzalez30@gmail.com',
        'Veterinaria' => 'support@example.com',
        'Semilllas' => 'accounts@example.com',
        'Agricultura Digital' => 'accounts@example.com',
        'Recuperación de Envases de Fitosanitarios' => 'accounts@example.com',
        'Recursos Humanos' => 'accounts@example.com',
    
    ];
    //Validate address selection before trying to use it
    if (array_key_exists('dept', $_POST) && array_key_exists($_POST['dept'], $addresses)) {
        $phpmailer->addAddress($addresses[$_POST['dept']]);
    } else {
        //Fall back to a fixed address if dept selection is invalid or missing
        $phpmailer->addAddress('nacho.gonzalez30@gmail.com');
    }
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($phpmailer->addReplyTo($_POST['email'], $_POST['name'])) {
        $phpmailer->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $phpmailer->isHTML(false);
        //Build a simple message body
        $phpmailer->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
        //Send the message, check for errors
        if (!$phpmailer->send()) {
            //The reason for failing to send will be in $phpmailer->ErrorInfo
            //but it's unsafe to display errors directly to users - process the error, log it on your server.
            echo 'Mailer error: ' . $mail->ErrorInfo;
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }
}
?>
