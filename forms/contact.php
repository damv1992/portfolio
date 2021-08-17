<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */
  
  $personal = "daniel.alejandro.miranda.villalta@gmail.com";
  $nombre = ucwords($_POST['name']);
  $correo = $_POST['email'];
  $asunto = ucfirst($_POST['subject']);
  $mensaje = ucfirst($_POST['subject']);

  // To send HTML mail, the Content-type header must be set
  $headers[] = "MIME-Version: 1.0";
  $headers[] = "Content-type: text/html; charset=iso-8859-1";

  // Additional headers
  $headers[] = "To: Daniel Alejandro Miranda Villalta <".$personal.">";
  $headers[] = "From: ".$nombre." <".$correo.">";
  
  // If Mail it
  if (mail($personal, $asunto, $mensaje, implode("\r\n", $headers))) echo "OK";
  else echo "fallo";

  function correo() {
    // Replace contact@example.com with your real receiving email address
    $receiving_email_address = 'daniel.alejandro.miranda.villalta@gmail.com';

    if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
      include( $php_email_form );
    } else {
      die( '¡No se puede cargar la biblioteca "Formulario de correo electrónico PHP"!');
    }

    $contact = new PHP_Email_Form;
    $contact->ajax = true;
    
    $contact->to = $receiving_email_address;
    $contact->from_name = ucwords($_POST['name']);
    $contact->from_email = $_POST['email'];
    $contact->subject = ucfirst($_POST['subject']);

    // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
    /*
    $contact->smtp = array(
      'host' => 'example.com',
      'username' => 'example',
      'password' => 'pass',
      'port' => '587'
    );
    */

    $contact->add_message( ucwords($_POST['name']), 'From');
    $contact->add_message( $_POST['email'], 'Email');
    $contact->add_message( ucfirst($_POST['message']), 'Message', 10);

    echo $contact->send();
  }
?>
