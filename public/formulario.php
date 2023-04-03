<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $mensagem = $_POST['mensagem'];

    // Destinatário do email
    $para = 'devops.davi@gmail.com';

    // Assunto do email
    $assunto = 'Formulário de contato';

    // Corpo do email
    $corpo = "Nome: $nome\n"
           . "Email: $email\n"
           . "Telefone: $telefone\n"
           . "Mensagem:\n\n$mensagem";

    // Cabeçalhos do email
    $headers = "From: $nome <$email>\r\n"
             . "Reply-To: $email\r\n"
             . "X-Mailer: PHP/" . phpversion();

    // Enviar o email
    if (mail($para, $assunto, $corpo, $headers)) {
        $mensagem = "Mensagem enviada com sucesso!";
    } else {
        $mensagem = "Ocorreu um erro ao enviar a mensagem.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contato</title>
</head>
<body>
    <?php if (isset($mensagem)) { ?>
        <p><?php echo $mensagem; ?></p>
    <?php } ?>
</body>
</html>
