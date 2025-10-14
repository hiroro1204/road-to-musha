<?php
/**
 * The template for displaying the front page
 *
 * @package Musya_Test
 */

?>

<?php get_header(); ?>

<main>
	<!-- top-kv -->
	<div class="top-kv">
		<div class="l-container">
			<div class="top-kv-inner">
				<article class="top-kv-recommend">
					<?php
					// 「pickup」メニューに設定された投稿を取得
					$pickup         = wp_get_nav_menu_items( 'pickup' );
					$pickup_post_id = isset( $pickup[0]->object_id ) ? $pickup[0]->object_id : null;

					if ( $pickup_post_id ) :
						$item         = $pickup[0];
						$pickup_post  = get_post( $pickup_post_id );
						$thumbnail_id = get_post_thumbnail_id( $pickup_post_id );
						?>
					<a href="<?php echo esc_attr( $item->url ); ?>" class="top-kv-recommend-link">
						<div class="top-kv-recommend-thumbnail">
							<?php if ( has_post_thumbnail( $pickup_post_id ) ) : ?>
							<?php
									echo get_the_post_thumbnail(
										$pickup_post_id,
										'medium',
										array(
											'width'  => '1200',
											'height' => '630',
											'alt'    => get_the_title( $pickup_post_id ),
										)
									);
								?>
							<?php else : ?>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/img/thumbnail.png' ); ?>"
								width="1200" height="630"
								alt="<?php echo esc_attr( get_the_title( $pickup_post_id ) ); ?>" />
							<?php endif; ?>
						</div>
						<div class="top-kv-recommend-body">
							<?php display_category_label( $pickup_post_id ); ?>
							<h2 class="top-kv-recommend-title">
								<?php echo esc_html( get_the_title( $pickup_post_id ) ); ?></h2>
							<div class="top-kv-recommend-date">
								<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d', $pickup_post_id ) ); ?>"
									class="c-date"><?php echo esc_html( get_the_date( 'Y/m/d', $pickup_post_id ) ); ?></time>
							</div>
						</div>
					</a>
					<?php endif; ?>
				</article>

				<div class="top-kv-character">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-character.png' ); ?>"
						width="400" height="569" alt="おすすめの記事" />
				</div>
			</div>
		</div>

		<div class="top-kv-treat">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-treat.png' ); ?>" width="500"
				height="172" alt="" />
		</div>
	</div>
	<!-- end top-kv -->


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