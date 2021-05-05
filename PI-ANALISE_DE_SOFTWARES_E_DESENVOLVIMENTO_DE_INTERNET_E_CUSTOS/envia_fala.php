<?php
 // monta o e-mail na variavel $body
$nome = $_REQUEST['nome'];
$email = $_REQUEST['email'];
$qtde = $_REQUEST['qtde'];
$js = $_REQUEST['js'];
$complexibilidade = $_REQUEST['layout'];
$prazo = $_REQUEST['prazo'];

// envia o email
mail($destinatario, $assunto , $body, "From: $email\r\n");

// redireciona para a página de obrigado
header("location:orcamento.html");

//definindo Para quem vai ser enviado o email
$para = "marcoantonio02016@outlook.com";
//resgatar o nome digitado no formulário e  grava na variavel $nome
$nome = $_POST['nome'];
//resgatar o assunto digitado no formulário e  grava na variavel
//$assunto
$assunto = "Orçamento";
 //Agora definimos a  mensagem que vai ser enviado no e-mail
 $body = "===================================" . "\n";
 $body = $body . "FALE CONOSCO - TESTE COMPROVATIVO" . "\n";
 $body = $body . "===================================" . "\n\n";
 $body = $body . "Nome: " . $nome . "\n";
 $body = $body . "Email: " . $email . "\n";
 $body = $body . "Quantidade:" . $qtde . "\n";
 $body = $body . "Dificuldade: " . $complexibilidade . "\n";
 $body = $body . "Prazo: " . $prazo . "\n";
 $body = $body . "===================================" . "\n"; 

//inserindo as codificações corretas e  tudo mais.
$headers =  "Content-Type:text/html; charset=UTF-8\n";
$headers .= "From:  dominio.com.br<sistema@dominio.com.br>\n";
//Vai ser //mostrado que  o email partiu deste email e seguido do nome
$headers .= "X-Sender:  <sistema@dominio.com.br>\n";
//email do servidor //que enviou
$headers .= "X-Mailer: PHP  v".phpversion()."\n";
$headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
$headers .= "Return-Path:  <sistema@dominio.com.br>\n";
//caso a msg //seja respondida vai para  este email.
$headers .= "MIME-Version: 1.0\n";

mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.
?>