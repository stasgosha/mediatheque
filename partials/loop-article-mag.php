<?php
$date        = get_the_date( 'j F, Y', $post->ID );
$author      = get_field( 'article_author' );
?>
<div <?php post_class( 'entry-article' ); ?> id="article-<?php echo $post->ID; ?>">
		<a href="<?php the_permalink(); ?>">
			<div class="post-thumbnail">
				<?php H::the_post_thumbnail( 'large' ); ?>
			</div>
		</a>
		<footer class="entry-footer" data-mh="entry-footer">
			<a href="<?php the_permalink(); ?>">
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>
			</a>

			<div class="entry-subtitle">

				<?php
				echo $date;
				if ( $author ) {
					echo ' / ' . $author;
				}
				?>

			</div>
			<p class="entry-excerpt">
				<?php H::the_excerpt( 15 ); ?>
			</p>
			<a href="<?php the_permalink(); ?>" class="entry-link">
				<span class="icon meditech-long-left"></span>
			</a>

		</footer>
</div>
