<?php

  if(!empty($_POST['nome']) || !empty($_POST['email']) || !empty($_POST['whatsapp']) || !empty($_POST['mensagem'])){
  //Variáveis
  $nome = trim($_POST['nome']);
  $email = trim($_POST['email']);
  $whatsapp = trim($_POST['whatsapp']);
  $mensagem = trim($_POST['mensagem']);

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Mensagem: </b>$mensagem</p>
      <p><b>Whatsapp: </b>$whatsapp</p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "sergio.junior@infowaytech.com.br";
  $assunto = "Contato pelo Site";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);
  
  header('Location: index.html');
  exit;
}
else{
  //echo 'Preencha todos os campos';
  header('Location: index.html');
  exit;
}
  
?>