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
			<h1 class="c-title-level1">『JavaScript』の記事一覧</h1>
		</div>
	</div>
	<!-- end page-kv -->

	<div class="u-ptb">
		<div class="l-container">
			<!-- posts -->
			<div class="c-posts c-posts--col3">
				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>

				<article class="c-post">
					<div class="c-meta">
						<span class="c-label c-label--javascript">JavaScript</span>
						<time datetime="2024-12-15" class="c-date">2024/12/15</time>
					</div>
					<a href="single.html" class="c-post-thumbnail">
						<img src="img/thumbnail.png" width="1200" height="630" alt="..." />
					</a>
					<h2 class="c-post-title">
						<a href="single.html">コーディング基礎から応用までの学習ロードマップ</a>
					</h2>
				</article>
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