<?php
/**
 * The template for displaying the single page
 *
 * @package Musya_Test
 */

?>

<?php get_header(); ?>

<main class="u-ptb">
	<div class="l-container-s">
		<!-- single-article -->



		<article class="single-article">
			<div class="c-meta">
				<?php if ( have_posts() ) : ?>
					<?php
					while ( have_posts() ) :
						the_post();
						?>

						<?php
						$this_categories = get_the_category();
						if ( $this_categories ) {
							$this_category_color = get_field( 'color', 'category_' . $this_categories[0]->term_id );
							$this_category_name  = $this_categories[0]->name;
						}
						?>

				<span class="c-label"
					style="background:<?php echo esc_attr( $this_category_color ); ?>;"><?php echo esc_html( $this_category_name ); ?></span>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" class="c-date"><?php the_time( 'Y/m/d' ); ?></time>
						<?php
					endwhile;
					endif;
				?>

			</div>

			<div class="single-title">
				<h1 class="c-title-level1"><?php the_title(); ?></h1>
			</div>

			<div class="single-thumbnail">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'full' ); ?>
				<?php else : ?>
				<img width="1520" height="798"
					src="<?php echo esc_url( get_template_directory_uri() . '/img/single-thumbnail.png' ); ?>" alt="..."
					loading="lazy" />
				<?php endif; ?>
			</div>

			<div class="single-contents">
				<?php the_content(); ?>
			</div>

			<a href="https://www.google.com/" target="_blank" class="single-banner" rel="noopener noreferrer">
				<picture>
					<source media="(max-width: 767px)"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/img/banner-sp.png' ); ?>" />
					<source media="(min-width: 768px)"
						srcset="<?php echo esc_url( get_template_directory_uri() . '/img/banner.png' ); ?>" />
					<img src="<?php echo esc_url( get_template_directory_uri() . '/img/banner.png' ); ?>" width="1520"
						height="338" alt="模写修行 駆け出しエンジニアのためのコーディング練習教材 詳しくはこちら" />
				</picture>
			</a>
		</article>
		<!-- end single-article -->

		<!-- single-recommend -->
		<aside class="single-recommend">
			<h2 class="single-recommend-title">おすすめ記事</h2>

			<div class="single-recommend-posts">
				<div class="c-posts c-posts--col2">
					<?php
					// 現在の投稿のカテゴリを取得.
					$current_categories = get_the_category();

					$category_ids = array();
					foreach ( $current_categories as $category ) {
						$category_ids[] = $category->term_id;
					}

					// 現在の投稿IDを取得（除外用）.
					$current_post_id = get_the_ID();

					// カスタムクエリを作成.
					$args = array(
						'post_type'      => 'post',
						'posts_per_page' => 6,
						'orderby'        => 'rand', // ランダム表示.
						'post_status'    => 'publish',
						'post__not_in'   => array( $current_post_id ), // 現在の投稿を除外.
					);

					// カテゴリが存在する場合は、そのカテゴリの記事のみを取得.
					if ( ! empty( $category_ids ) ) {
						$args['category__in'] = $category_ids;
					}

					$same_category_posts = new WP_Query( $args );

					if ( $same_category_posts->have_posts() ) :
						while ( $same_category_posts->have_posts() ) :
							$same_category_posts->the_post();
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
						<h3 class="c-post-title">
							<a
								href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
						</h3>
					</article>
							<?php
						endwhile;
						wp_reset_postdata(); // クエリをリセット.
					else :
						// 記事がない場合の表示.
						echo '<p>関連記事が見つかりませんでした。</p>';
					endif;
					?>
				</div>
			</div>
		</aside>
		<!-- end single-recommend -->
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
