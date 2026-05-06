<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the `#content` element and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Nezer_Motors
 */
// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

?>

<?php get_template_part( 'template-parts/layout/footer', 'content' ); ?>

</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>