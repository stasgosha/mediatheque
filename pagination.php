<?php if ( $wp_query->max_num_pages > 1 ) : ?>

	<div class="custom-row row-pagination">
		<div class="col12">
			<div class="pagination">
				<?php H::theme_pagination(); ?>
			</div>
		</div>
	</div>

	<?php
endif;
