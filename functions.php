<?php
/**
 * 武者への道 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Musya_Test
 */

/**
 * Google Fontsを読み込む
 *
 * @return void
 */
function theme_enqueue_google_fonts() {
	wp_enqueue_style(
		'google-fonts',
		'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap',
		array(),
		'1.0.0'
	);
}

/**
 * テーマのCSSとJSを読み込む
 *
 * @return void
 */
function theme_enqueue_scripts() {
	wp_enqueue_style(
		'theme-main-style',
		get_template_directory_uri() . '/css/style.css',
		array( 'google-fonts' ),
		'1.0.0'
	);

	wp_enqueue_script(
		'theme-main-script',
		get_template_directory_uri() . '/js/main.js',
		array( 'jquery' ),
		'1.0.0',
		true
	);
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_google_fonts' );
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );


/**
 * エディターにCSS追加
 */
function my_theme_setup() {
	// Gutenberg でエディター用のCSSの適用する.
	add_theme_support( 'editor-styles' );
	// 読み込むスタイルシートを配列で指定する.
	add_editor_style( 'css/editor-style.css' );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

/**
 * アイキャッチ画像を有効化
 */
add_theme_support( 'post-thumbnails' );

/**
 * メニュー
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => 'ヘッターメニュー',
			'pickup'      => 'ピックアップ',
			'footer-menu' => 'フッターメニュー',
		)
	);
}
add_action( 'after_setup_theme', 'register_my_menus' );


/**
 * 検索結果のフィルタリング（投稿タイプを指定）
 *
 * @param WP_Query $query The query object.
 * @return WP_Query The modified query object.
 */
function search_filter( $query ) {
	if ( $query->is_search ) {
		$query->set( 'post_type', 'post' );
	}
	return $query;
}
	add_filter( 'pre_get_posts', 'search_filter' );

/**
 * タイトルタグを有効化
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
	}
);

/**
 * 日付アーカイブで記事がない場合でも404エラーにしない
 *
 * @param bool $handled Whether the 404 has been handled.
 * @return bool Whether the 404 should be handled.
 */
function allow_empty_date_archive( $handled ) {
	if ( $handled ) {
		return $handled; // すでに404確定なら何もしない.
	}

	if ( ! is_date() || is_paged() ) {
		return $handled; // 日付アーカイブ以外 or 2ページ目以降は素通り.
	}

	$year  = (int) get_query_var( 'year' );
	$month = (int) get_query_var( 'monthnum' );
	$day   = (int) get_query_var( 'day' );

	$now_year  = (int) current_time( 'Y' );
	$now_month = (int) current_time( 'n' );
	$now_day   = (int) current_time( 'j' );

	$is_future = false;

	if ( $year > $now_year ) {
		$is_future = true;
	} elseif ( $year === $now_year && $month && $month > $now_month ) {
		$is_future = true;
	} elseif ( $year === $now_year && $month === $now_month && $day && $day > $now_day ) {
		$is_future = true;
	}

	// 未来でなければ 404 を回避.
	return $is_future ? true : $handled;
}
add_filter( 'pre_handle_404', 'allow_empty_date_archive', 10 );

/**
 * カテゴリラベルを表示する関数
 *
 * @param int $post_id 投稿ID（省略時は現在の投稿）.
 * @return void
 */
function display_category_label( $post_id = null ) {
	if ( is_null( $post_id ) ) {
		$post_id = get_the_ID();
	}

	$categories = get_the_category( $post_id );
	if ( $categories ) {
		$category_color = get_field( 'color', 'category_' . $categories[0]->term_id );
		$category_name  = $categories[0]->name;
		echo '<span class="c-label" style="' . esc_attr( 'background-color:' . $category_color ) . ';">' . esc_html( $category_name ) . '</span>';
	}
}