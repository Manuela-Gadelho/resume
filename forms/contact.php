<?php
// Caminho para o arquivo php-email-form.php
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';

// Substitua contact@example.com pelo seu endereço de e-mail real
$receiving_email_address = 'manugadelho@protonmail.com';

// Verifica se o arquivo php-email-form.php existe
if (file_exists($php_email_form)) {
    include($php_email_form);

    // Cria uma instância do PHP_Email_Form
    $contact = new PHP_Email_Form;
    $contact->ajax = true;

    $contact->to = $receiving_email_address;
    
    // Verifica se os dados de entrada estão presentes e não vazios
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';

    // Adiciona os dados de entrada à mensagem
    $contact->from_name = $name;
    $contact->from_email = $email;
    $contact->subject = $subject;
    $contact->add_message($name, 'From');
    $contact->add_message($email, 'Email');
    $contact->add_message($message, 'Message', 10);

    // Tenta enviar o email e imprime o resultado
    if ($contact->send()) {
        echo 'Email enviado com sucesso!';
    } else {
        echo 'Erro ao enviar o email.';
    }
} else {
    echo 'Não foi possível carregar a biblioteca "PHP Email Form"!';
}
?>
