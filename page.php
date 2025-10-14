<?php
/**
 * The template for displaying the page
 *
 * @package Musya_Test
 */

?>

<?php get_header(); ?>

<main class="u-ptb">
	<div class="l-container-s">
		<h1 class="c-title-level1"><?php the_title(); ?></h1>

		<div class="l-page-body">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					the_content();
				endwhile;
			endif;
			?>
		</div>
	</div>
</main>

<?php get_template_part( 'template-parts/cta' ); ?>

<?php get_footer(); ?>