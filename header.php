<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Musya_Test
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="format-detection" content="telephone=no" />

	<!-- favicon / webclip だけ残す -->
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() . '/favicon.ico' ); ?>" />
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/webclip.png' ); ?>" />

	<?php wp_head(); ?>
</head>


<body>
	<!-- header -->
	<header class="header">
		<div class="l-container">
			<div class="header-head-inner">
				<?php $html_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo esc_html( $html_tag ); ?> class="header-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<picture>
							<source media="(max-width: 499px)"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/img/logo-sp.png' ); ?>" />
							<source media="(min-width: 500px)"
								srcset="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" />
							<img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>"
								width="640" height="84" alt="武者への道 Presented by 模写修行" loading="lazy" />
						</picture>
					</a>
				</<?php echo esc_html( $html_tag ); ?>>

				<div class="header-search">
					<button type="button" class="header-search-button js-button" aria-label="検索を開く">
						記事検索
					</button>
				</div>

				<div class="c-sns">
					<a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-twitter.svg' ); ?>"
							width="400" height="400" alt="twitter" loading="lazy" />
					</a>

					<a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-facebook.svg' ); ?>"
							width="1024" height="1024" alt="facebook" loading="lazy" />
					</a>
				</div>
			</div>
		</div>

		<nav class="header-nav">
			<div class="l-container">
				<?php
				// ヘッダーメニューが設定されている場合は表示.
				if ( has_nav_menu( 'header-menu' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'header-menu',
							'container'      => false, // <nav>は既にあるので不要
							'menu_class'     => 'header-list', // <ul>に付与するクラス
							'fallback_cb'    => false, // メニュー未設定時は何も表示しない.
							'items_wrap'     => '<ul class="%2$s">%3$s</ul>', // <ul>ラップ
							'depth'          => 1, // 階層は1階層のみ.
						)
					);
				endif;
				?>
			</div>
		</nav>
	</header>
	<!-- end header-->

	<dialog class="c-search-dialog js-modal">
		<div class="c-search-dialog-inner">
			<div class="c-search-dialog-content js-contents">
				<button type="button" class="c-search-dialog-close js-close-button" aria-label="検索を閉じる">
				</button>
				<p class="c-search-dialog-title">キーワードを入力</p>
				<?php get_search_form(); ?>
			</div>
		</div>
	</dialog>
	<div class="c-modal-bg js-modal-bg"></div>