<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
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
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 

    // WordPress 5.2 wp_body_open implementation
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    }

?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-bootstrap-starter' ); ?></a>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xs p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_url(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
				<div class="d-flex">
					<button class="btn btn-primary navbarButton text-center" data-bs-toggle="modal" data-bs-target="#contactModal">Contáctenos</button>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
						<i class="fas fa-bars"></i>
					</button>
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
                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
	</header><!-- #masthead -->
	<div class="container-fluid wrapJumbo">
        <div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container text-left">

					<img class="d-block mb-5" src="<?php echo get_bloginfo('template_url') ?>/img/icons/sign.png"/>
					<img class="mb-3" src="<?php echo get_bloginfo('template_url') ?>/img/Carousel.png"/>
                    <h1 class="text-white display-3">Blog</h1>
                    <div class="d-inline-flex align-items-right text-white">

                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>

                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>