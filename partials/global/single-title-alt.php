<?php
$text = get_field( 'title_alt' );
if ( $text ) :
?>
<div class="container single-content-wrap">
    <div class="top-row">
        <h2 class="text-right-border">
            <?php echo $text; ?>
        </h2>
    </div>
</div>
<?php
endif;
