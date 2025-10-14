<?php
/**
 * ページネーションのテンプレートパーツ
 *
 * @package Musya_Test
 */

the_posts_pagination(
	array(
		'prev_text' => '<span class="u-visually-hidden">前のページ</span>',
		'next_text' => '<span class="u-visually-hidden">次のページ</span>',
		'mid_size'  => 1,
		'end_size'  => 1,
	)
);
