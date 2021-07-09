<?php

$top_color    = get_field( 'top_color' );
$bottom_color = get_field( 'bottom_color' );
get_header();
?>
<div class="mag-page-wrap" style="background: linear-gradient(180deg, <?php echo $top_color ? $top_color : '#999999'; ?> 0%, <?php echo $bottom_color ? $bottom_color : '#999999'; ?> 100%);">
	<?php
	get_template_part( 'partials/mag/header' );
	get_template_part( 'partials/mag/category-nav' );
	get_template_part( 'partials/home/magazin' );
	the_content();
	?>
</div>


<?php
get_footer();
