<?php

    require "./bibliotecas/PHPMailer/Exception.php";
    require "./bibliotecas/PHPMailer/PHPMailer.php";
    require "./bibliotecas/PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mensagem {
    private $para = null;
    private $assunto = null;
    private $mensagem = null;
    public $status = array('codigo_status' => null, 'descricao_status' => '');

    public function __get($atributo) {
        return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

    public function mensagemValida() {
        return !empty($this->para) && !empty($this->assunto) && !empty($this->mensagem);
    }
    }

    // Criando a mensagem
    $mensagem = new Mensagem();
    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);

    if (!$mensagem->mensagemValida()) {
        echo 'Mensagem não é válida!';
        header('Location: index.php');
    }

    $mail = new PHPMailer(true);

    try {

    // Configuração do servidor SMTP
    $mail->SMTPDebug = false; // Mostra erros detalhados
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'exemplo@gmail.com'; // Seu e-mail do Gmail
    $mail->Password = '123bfg'; //senha de aplicativo do Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usa TLS
    $mail->Port = 587; //Porta padrão

    // Configuração dos destinatários
    $mail->setFrom('exemplo@gmail.com', 'Thais Gonçalves');
    $mail->addAddress($mensagem->__get('para'));

    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body = $mensagem->__get('mensagem');
    $mail->AltBody = strip_tags($mensagem->__get('mensagem'));

    // Envia o e-mail
    $mail->send();

    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso!';
    } catch (Exception $e) {
    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = "Não foi possível enviar o e-mail. Erro: {$mail->ErrorInfo}";

    }