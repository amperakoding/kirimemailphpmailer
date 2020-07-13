<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['submit']))
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $no_invoice         = $_POST['no_invoice'];
    $nama_pengirim      = $_POST['nama_pengirim'];
    $email              = $_POST['email'];

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'namaEmailAnda';                     // SMTP username
    $mail->Password   = 'passwordEmailAnda';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('namaemail', 'Percobaan');
    $mail->addAddress($email, $nama_pengirim);     // Add a recipient
    
    $mail->addReplyTo('namaemail', 'Percobaan');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Konfirmasi Pembayaran dari Localhost';
    $mail->Body    = '<h1>Halo, Admin.</h1> <p>Ada pesanan baru dengan nomor invoice '.$no_invoice.'</p> ';    

    if($mail->send())
    {
        echo 'Konfirmasi pembayaran telah berhasil';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo "Tekan dulu tombolnya bos";
}
