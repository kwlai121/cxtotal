<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info" style="display:none;">
                &copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
                <span class="sep"> | </span>
                <a class="credits" href="https://afterimagedesigns.com/wp-bootstrap-starter/" target="_blank" title="WordPress Technical Support" alt="Bootstrap WordPress Theme"><?php echo esc_html__('Bootstrap WordPress Theme','wp-bootstrap-starter'); ?></a>

            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row py-5">    
        <div class="col-12 col-md-5 py-4"> 
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logoFooter.png">
		  </div>
       
        <div class="col-12 col-md-3 pt-sm-5 pt-xs-4 d-flex justify-content-lg-end"> 
          <p><i class="fa-brands fa-whatsapp"></i> +506 7111-5516</p>
        </div>
        <div class="col-12 col-md-4 pt-sm-5 pt-xs-4 d-flex justify-content-lg-end"> 
          
          <p><i class="fa-solid fa-envelope"></i> info@cxtotal.com</p>
        </div> 
      </div>

      <hr class="my-3 mx-2 bg-light">

      <div class="row">

        <div class="col-12 col-sm-7 d-flex">
          <p>Derechos Reservados. CX Total S.A. 2022</p>
        </div>
        <div class="col-12 col-sm-5 d-flex justify-content-sm-end">
          <a href="#">Política de privacidad</a>
        </div>

      </div>

    </div> <!-- End container -->
  </footer>   
<?php wp_footer(); ?>					 
</body>
</html>