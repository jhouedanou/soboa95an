<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Soboa_95_ans
 */

?>

<footer id="colophon" class="site-footer">
    <div id="liboul">

        <div class="logosoboa">
            <img src="<?php echo get_template_directory_uri(); ?>/images/logo.webp" alt="CDV">
        </div>
        <div class="footer-image">
            <img src="<?php echo get_template_directory_uri(); ?>/images/slogan.webp" alt="CDV">
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>