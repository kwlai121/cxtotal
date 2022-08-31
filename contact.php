<?php
if(empty($_POST['name']) ||
   empty($_POST['telephone']) ||
   empty($_POST['countries']) ||
   empty($_POST['info']) ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   http_response_code(500);
   exit();
   
}
if(isset($_POST['info'])) {
  $info = filter_var($_POST['info'], FILTER_SANITIZE_STRING);

}

if(isset($_POST['countries'])) {
  $countries = filter_var($_POST['countries'], FILTER_SANITIZE_STRING);
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$telephone = strip_tags(htmlspecialchars($_POST['telephone']));
$countries = strip_tags(htmlspecialchars($_POST['countries']));
$info = strip_tags(htmlspecialchars($_POST['info']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "info@tstcr.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nTelephone: $telephone\n\nCountries: $countries\n\nInfo: $info";
$header = "From: $email";
$header .= "Reply-To: $email";

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
