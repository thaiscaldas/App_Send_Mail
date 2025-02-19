# App_Send_Mail

O App Send Mail é um aplicativo web desenvolvido em PHP que permite o envio de e-mails através do protocolo SMTP, utilizando a biblioteca PHPMailer. O sistema possui uma interface simples para preenchimento do destinatário, assunto e mensagem, facilitando o envio de e-mails de forma rápida e eficiente.

# Funcionalidades

Interface responsiva para envio de e-mails

Integração com PHPMailer para envio via SMTP

Validação dos campos obrigatórios

Feedback visual para sucesso ou falha no envio do e-mail

# Tecnologias Utilizadas

PHP (para processamento e envio do e-mail)

HTML & Bootstrap (para a interface do usuário)

PHPMailer (biblioteca para envio de e-mails via SMTP)

# Estrutura do Projeto

App Send Mail/
│── bibliotecas/
│   └── PHPMailer/
│── index.php
│── processa_envio.php
│── logo.png
│── README.md

# Arquivos Principais

1. index.php

Este é o arquivo principal do aplicativo, contendo o formulário para envio de e-mails. Ele inclui:

Um campo para inserir o e-mail do destinatário.

Um campo para inserir o assunto do e-mail.

Um campo para escrever a mensagem.

Um botão de envio que redireciona os dados para processa_envio.php.

2. processa_envio.php

Responsável pelo processamento do envio do e-mail, este arquivo:

Recebe os dados do formulário via POST.

Valida se todos os campos estão preenchidos.

Utiliza a biblioteca PHPMailer para configurar e enviar o e-mail via SMTP.

Exibe uma mensagem de sucesso ou erro após a tentativa de envio.

# Configuraço do PHPMailer

O envio de e-mails é realizado através do servidor SMTP do Gmail. As configurações utilizadas no processa_envio.php são:

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'exemplo@gmail.com'; // E-mail do remetente
$mail->Password = '123bfg'; // Senha do aplicativo
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

Nota: Para usar o Gmail, é necessário configurar uma senha de aplicativo na conta do Google.

# Como Executar o Projeto

Clonar ou baixar o repositório.

Configurar as credenciais de e-mail no processa_envio.php.

Hospedar o projeto em um servidor local (ex: XAMPP) ou remoto com suporte a PHP.

Acessar index.php pelo navegador.

Preencher o formulário e enviar o e-mail.

# Melhorias Futuras

Implementação de envio com anexos.

Armazanamento de logs de e-mails enviados.

Melhorias na segurança e proteção contra SPAM.