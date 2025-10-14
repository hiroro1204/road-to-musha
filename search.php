<?php
/**
 * The template for displaying the search page
 *
 * @package Musya_Test
 */

?>

<?php get_header(); ?>

<main>
	<!-- page-kv -->
	<div class="c-page-kv">
		<div class="l-container">
			<?php
			$search_query = get_search_query();
			if ( ! empty( $search_query ) ) {
				?>
			<h1 class="c-title-level1">『<?php echo esc_html( $search_query ); ?>』の検索結果</h1>
			<?php } else { ?>
			<h1 class="c-title-level1">検索結果</h1>
			<?php } ?>
		</div>
	</div>
	<!-- end page-kv -->

	<div class="u-ptb">
		<div class="l-container">
			<!-- posts -->
			<div class="c-posts c-posts--col3">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						// カテゴリを取得.
						$categories     = get_the_category();
						$category_name  = ! empty( $categories ) ? $categories[0]->name : '';
						$category_color = ! empty( $categories ) ? get_field( 'color', 'category_' . $categories[0]->term_id ) : '';
						?>
				<article class="c-post">
					<div class="c-meta">
						<?php if ( ! empty( $category_name ) ) : ?>
						<span class="c-label"
							style="background:<?php echo esc_attr( $category_color ); ?>;"><?php echo esc_html( $category_name ); ?></span>
						<?php endif; ?>
						<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"
							class="c-date"><?php echo esc_html( get_the_date( 'Y/m/d' ) ); ?></time>
					</div>
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="c-post-thumbnail">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php
							the_post_thumbnail(
								'full',
								array(
									'width'  => '1200',
									'height' => '630',
									'alt'    => get_the_title(),
								)
							);
							?>
						<?php else : ?>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/thumbnail.png' ); ?>"
							width="1200" height="630" alt="<?php echo esc_attr( get_the_title() ); ?>" />
						<?php endif; ?>
					</a>
					<h2 class="c-post-title">
						<a
							href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
					</h2>
				</article>
						<?php
					endwhile;
				else :
					?>
				<div class="no-results">
					<?php if ( ! empty( $search_query ) ) : ?>
					<p>『<?php echo esc_html( $search_query ); ?>』の検索結果が見つかりませんでした。</p>
					<?php else : ?>
					<p>記事が見つかりませんでした。</p>
					<?php endif; ?>
				</div>
					<?php
				endif;
				?>
			</div>
			<!-- end posts -->

			<!-- pagination -->
			<?php get_template_part( 'template-parts/pagination' ); ?>
			<!-- end pagination -->
		</div>
	</div>
</main>

<!-- Breadcrumb -->
<div class="c-breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<div class="l-container">
		<div class="c-breadcrumbs-inner">
			<?php
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
			?>
		</div>
	</div>
</div>
<!-- end Breadcrumb -->

<?php get_template_part( 'template-parts/cta' ); ?>

<?php get_footer(); ?>
