<?php

if ( ! post_type_exists( 'mt_article' ) ) {
    return;
}
$cats = get_field( 'article_cat' );


if ( $cats ) :
?>
<section data-scroll-section>
    <div class="container">
        <ul class="entry-categories">

            <?php foreach ( $cats as $key => $cat ) : ?>
                <li>
                    <a href="<?php echo get_term_link( $cat ); ?>">
                        <?php echo $cat->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>

    </div>
</section>
<?php
endif;
