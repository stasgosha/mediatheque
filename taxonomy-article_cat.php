<?php

$term = get_queried_object();
$text = get_field( 'text', $term );

get_header();
?>
<div class="mag-page-wrap" style="background: linear-gradient(180deg,#999999 0%, #000 100%);">
	<?php
	get_template_part( 'partials/mag/header' );
	get_template_part( 'partials/home/magazin' );
	get_template_part( 'partials/article-cat-grid' );

	?>
</div>
<?php
get_footer();
