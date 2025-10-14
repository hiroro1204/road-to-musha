<?php
/**
 * The search form for our theme
 *
 * This is the template that displays the search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Musya_Test
 */

?>

<form method="get" class="c-search-form" action="<?php echo esc_url( home_url() ); ?>">
	<input type="text" name="s" class="c-search-form-input" placeholder="キーワードで検索する" autofocus>
	<button type="submit" class="c-search-form-button">検索する</button>
</form>
