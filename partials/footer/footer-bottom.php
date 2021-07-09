<?php
$link = get_field( 'copyrights_link', 'option' );
?>
<div class="footer-bottom">
	<div class="container">
		<div class="copyrights">
			<?php echo the_field( 'copyrights', 'option' ) . ' ' . gmdate('Y') . ' ' . '©'; ?>

			<?php if ( $link ) : ?>
				<a href="<?php echo $link['url']; ?>" target="_blank">
					<?php echo $link['title']; ?>
				</a>
			<?php endif; ?>
		</div>
	</div>
</div>
