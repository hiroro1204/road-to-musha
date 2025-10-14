<?php
/**
 * The template for displaying the archive page
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
			$archive_year  = get_query_var( 'year' );
			$archive_month = get_query_var( 'monthnum' );
			$archive_day   = get_query_var( 'day' );

			if ( $archive_year && $archive_month && $archive_day ) {
				// 年月日.
				$archive_title = sprintf( '%04d年%02d月%02d日', $archive_year, $archive_month, $archive_day );
			} elseif ( $archive_year && $archive_month ) {
				// 年月.
				$archive_title = sprintf( '%04d年%02d月', $archive_year, $archive_month );
			} elseif ( $archive_year ) {
				// 年のみ.
				$archive_title = sprintf( '%04d年', $archive_year );
			} else {
				$archive_title = '日付';
			}
			?>
			<h1 class="c-title-level1">『<?php echo esc_html( $archive_title ); ?>』の記事一覧</h1>
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
								'medium',
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
					<p>該当する日付の記事が見つかりませんでした。</p>
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

<?php get_template_part( 'template-parts/cta' ); ?>

<?php get_footer(); ?>
