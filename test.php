<?php
$error_message = "";
if(isset($_POST['contact'])) {

 // verification de si les datas existent
    if(!isset($_POST['name']) ||
       !isset($_POST['email']) ||
       !isset($_POST['phone']) ||
       !isset($_POST['subject']) ||
       !isset($_POST['message'])) {
       died('Nous sommes désolés, mais il semble y avoir un problème avec le formulaire que vous avez soumis.');
    }

    $email_to = "tdentdeplomb@gmail.com";
    $email_subject = "Formulaire de contact";

    function died($error) {
        // code
        echo "Nous sommes désolé, une erreur est survenue. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Veuillez revenir en arrière et corriger ces erreurs.<br /><br />";
        die();
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {
    $error_message .= 'L’adresse mail que vous avez entrée ne semble pas valide.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Le prénom que vous avez entré ne semble pas valide.<br />';
  }

 //strlen Cette fonction permet de calculer la longueur, exprimée en nombre de caractères, de la chaîne de caractères
  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Détails du formulaire ci-dessous.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Phone: ".clean_string($phone)."\n";
    $email_message .= "Subject: ".clean_string($subject)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";

// creation du mail (de la forme du mail)
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
header('location:contact.html');
?>

<!-- inclusion de mon message personnel -->

Merci de nous avoir contacter. Nous vous répondrons très bientôt.

<?php
}
?>

<?php
$dest = "tdentdeplomb@gmail.com";
  $sujet = "tdentdeplomb@gmail.com";
  $corp = "Salut ceci est un email de test envoyer par un script PHP";
  $headers = "From: tdentdeplomb@gmail.com";
  if (mail($dest, $sujet, $corp, $headers)) {
    echo "Email envoyé avec succès à $dest ...";
  } else {
    echo "Échec de l'envoi de l'email...";
  }

//mail("tdentdeplomb@gmail.com","Subject","Email message","From: tdentdeplomb@gmail.com")
?>

