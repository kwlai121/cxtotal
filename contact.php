<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $countries = $_POST['countries'];
        $info = $_POST['info'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'CX Total - Formulario de contáctenos'; 
		$to = 'kwlai121@gmail.com'; 
		$subject = 'Mensaje de Contact CXtotal';
		
		$body ="From: $name\n 
                Correo Electrónico: $email\n 
                Mensaje:\n $message\n
				Telefono: $telephone\n
				Countries: $countries\n
				Info: $info\n";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Por favor, escriba su nombre';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Por favor, introduce una dirección de correo electrónico válida';
		}
		// Check if number has been entered and is valid
		if (!$_POST['number']) {
			$errNumber = 'Por favor, introduce su numero de telefono';
		}
		if (!$_POST['telephone']) {
			$errTelephone = 'Por favor, introduce su numero de telefono';
		}
		if (!$_POST['countries']) {
			$errCountries = 'Por favor, introduce su numero de telefono';
		}		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Por favor ingrese su mensaje';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">¡Gracias! estaré en contacto</div>';
	} else {
		$result='<div class="alert alert-danger">Lo siento, hubo un error al enviar tu mensaje. Por favor, inténtelo de nuevo más tarde.</div>';
	}
}
	}
?>