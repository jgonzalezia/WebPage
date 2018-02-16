<?php
// Verificar campos vacios
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
   echo "¡No es un correo valido!";
   return false;
   }
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Crea el correo electronico y lo envia
$to = 'contacto@ia-society.com'; 
$email_subject = "Contacto desde IA Society";
$email_body = "Haz recibido un mensaje a través de la página web.\n\n"."Los detalles del mensaje:\n\nNombre: $name\n\nEmail: $email_address\n\nTeléfono: $phone\n\nMensaje: $message";
$headers = "From: $name\n"; 
$headers .= "Reply-To: $email_address" . "\r\n". "Bcc: " . "\r\n";   
mail($to,$email_subject,$email_body,$headers);
return true;         
?>
