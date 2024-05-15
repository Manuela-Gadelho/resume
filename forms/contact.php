<?php
// Caminho para o arquivo php-email-form.php
$php_email_form = '../assets/vendor/php-email-form/php-email-form.php';

// Substitua contact@example.com pelo seu endereço de e-mail real
$receiving_email_address = 'manugadelho@protonmail.com';

// Verifica se o arquivo php-email-form.php existe
if (file_exists($php_email_form)) {
    include($php_email_form);

    $contact = new PHP_Email_Form;
    $contact->ajax = true;

    $contact->to = $receiving_email_address;
    $contact->from_name = $_POST['name'] ?? '';
    $contact->from_email = $_POST['email'] ?? '';
    $contact->subject = $_POST['subject'] ?? '';

    // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
    /*
    $contact->smtp = array(
        'host' => 'example.com',
        'username' => 'example',
        'password' => 'pass',
        'port' => '587'
    );
    */

    $contact->add_message($_POST['name'] ?? '', 'From');
    $contact->add_message($_POST['email'] ?? '', 'Email');
    $contact->add_message($_POST['message'] ?? '', 'Message', 10);

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
