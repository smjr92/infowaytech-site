<?php
require("/home1/hginf557/public_html/PHPMailer-master/src/PHPMailer.php");
require("/home1/hginf557/public_html/PHPMailer-master/src/SMTP.php");

if(!empty($_POST['nome']) || !empty($_POST['email']) || !empty($_POST['whatsapp']) || !empty($_POST['mensagem'])){


    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $whatsapp = trim($_POST['whatsapp']);
    $mensagem = trim($_POST['mensagem']);
    
    $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Whatsapp: </b>$whatsapp</p>
      <p><b>Mensagem: </b>$mensagem</p>
    </html>
  ";

 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->CharSet = "UTF-8";
 $mail->IsSMTP(); // enable SMTP
 //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
 $mail->SMTPAuth = true; // authentication enabled
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
 $mail->Host = "smtp.titan.email";
 $mail->Port = 465; // or 587
 $mail->IsHTML(true);
 $mail->Username = "contato@infowaytech.com.br";
 $mail->Password = "Unip2020";
 $mail->SetFrom("contato@infowaytech.com.br");
 $mail->Subject = "Contato via Site";
 $mail->Body = $arquivo;
 $mail->AddAddress("sergio.junior@infowaytech.com.br");
 $mail->AddAddress("fernando.azevedo@infowaytech.com.br");
    if(!$mail->Send()) {
       echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
       header('Location: ../../index.html');
        exit;
    }
}
else{
     header('Location: ../../index.html');
        exit;
}

?>