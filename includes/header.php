<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
    $telephone = $_POST['telephone'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'CX Total - Formulario de contáctenos'; 
		$to = 'kwlai121@gmail.com'; 
		$subject = 'Mensaje de Contact CXtotal';
		
		$body ="From: $name\n Correo Electrónico: $email\n Mensaje:\n $message";

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cxtotal</title>
    <!-- Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    
    <link rel="stylesheet" href="css/style.css">
	    <!-- Libraries Stylesheet -->
	<link href="lib/animate/animate.min.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/f664d2c2d7.js" crossorigin="anonymous"></script>

    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</head>
<body>
      <!-- Wrap begining-->
     <div class="container-fluid wrap">
       <!-- Navbar-->
       <div class="container">
        <!-- Responsive navbar-->
<nav class="navbar navbar-expand-xs">
<div class="container">
    <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt=""></a>
    <div class="d-flex">
      <button class="btn btn-primary navbarButton text-center" data-bs-toggle="modal" data-bs-target="#contactModal">Contáctenos</button>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="nosotros.php">Nosotros</a></li>
            <li class="nav-item"><a class="nav-link" href="servicios.php">Servicios</a></li>
            <li class="nav-item"><a class="nav-link" href="blog/">Blog</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" 
                ria-expanded="false">Modalidades de trabajo</a>
                <ul class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="mt_intensivo.php">Intensivo</a></li>
                    <li><a class="dropdown-item" href="mt_creacion_cero.php">Creación desde 0</a></li>
                    <li><a class="dropdown-item" href="mt_estrategia_cx.php">Estrategia e implementación de CX</a></li>
                    <li><a class="dropdown-item" href="mt_plan_hibrido.php">Plan Híbrido</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--MODAL CONTACTENOS-->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Contáctenos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-12 control-label">Nombre completo</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="name" name="name" placeholder="Digite su nombre completo" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-12 control-label">Correo electrónico</label>
						<div class="col-sm-12">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="number" class="col-sm-12 control-label">Teléfono</label>
						<div class="col-sm-12">
							<input type="number" class="form-control" id="number" name="number" placeholder="+000 0000 0000" value="<?php echo htmlspecialchars($_POST['number']); ?>">
							<?php echo "<p class='text-danger'>$errNumber</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-12 control-label">Mensaje</label>
						<div class="col-sm-12">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-12 control-label">País</label>
						<div class="col-sm-12">
							<select name="" id="people">

              </select>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-12 control-label">2 + 3 = ?</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="human" name="human" placeholder="Tu respuesta">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
          </div>

        </div>
      </div>
    </div>
    <!--END MODAL CONTACTENOS-->
</div>
</nav>
</div>
<!-- End Navbar-->