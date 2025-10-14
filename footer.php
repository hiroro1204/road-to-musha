<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Musya_Test
 */

?>

<!-- footer -->
<footer class="footer">
	<div class="l-container">
		<div class="footer-inner">
			<div class="footer-site-info">
				<div class="footer-logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" width="640"
							height="84" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
					</a>
				</div>

				<p class="footer-site-description"><span>武者への道は駆け出しデザイナー・エンジニアを</span><span>応援するメディアです</span></p>

				<div class="footer-sns">
					<div class="c-sns">
						<a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-twitter.svg' ); ?>"
								width="400" height="400" alt="twitter" />
						</a>

						<a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-facebook.svg' ); ?>"
								width="1024" height="1024" alt="facebook" />
						</a>
					</div>
				</div>
			</div>


			<?php
			// フッター用ナビゲーション.
			if ( has_nav_menu( 'footer-menu' ) ) : // ←スラッグを一致させる.
				wp_nav_menu(
					array(
						'theme_location'  => 'footer-menu',
						'container'       => 'nav',              // <nav> ラッパーを自動生成
						'container_class' => 'footer-nav',       // <nav> に付くクラス
						'menu_class'      => 'footer-nav-list', // <ul> に付くクラス.
						'fallback_cb'     => false,               // 未設定時に固定ページ一覧を出さない.
					)
				);
endif;
			?>

		</div>

		<small class="footer-copyright">&copy; 2024 Road to MUSHA, inc.</small>
	</div>
</footer>
<!-- end footer -->
<?php wp_footer(); ?>

</body>

</html>