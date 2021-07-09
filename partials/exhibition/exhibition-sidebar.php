<?php $credit = get_field( 'side_img_credit' ); ?>
<div class="box-wrap">

    <?php if ( have_rows( 'ozarim' ) ) : ?>
        <h3 class="entry-title">
            <?php _e( 'אוצרים', 'ystheme' ); ?>
        </h3>
        <ul class="entry-links">
            <?php
            while ( have_rows( 'ozarim' ) ) :
                the_row();
                $link = get_sub_field( 'link' );
                ?>
                <li>
                    <a href="<?php echo $link['url'] ?>" target="_blank">
                        <?php echo $link['title']; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
        <hr>
    <?php endif; ?>

    <?php if ( have_rows( 'designers' ) ) : ?>
        <h3 class="entry-title">
            <?php _e( 'מעצבים', 'ystheme' ); ?>
        </h3>
        <ul class="entry-links">
            <?php
            while ( have_rows( 'designers' ) ) :
                the_row();
                $link = get_sub_field( 'link' );
                ?>
                <li>
                    <a href="<?php echo $link['url'] ?>" target="_blank">
                        <?php echo $link['title']; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php if ( have_rows( 'graphic_designers' ) ) : ?>
        <hr>
        <h3 class="entry-title">
            <?php _e( 'מעצבים', 'ystheme' ); ?>
        </h3>
        <ul class="entry-links">
            <?php
            while ( have_rows( 'graphic_designers' ) ) :
                the_row();
                $link = get_sub_field( 'link' );
                ?>
                <li>
                    <a href="<?php echo $link['url'] ?>" target="_blank">
                        <?php echo $link['title']; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>

    <?php if ( get_field( 'side_img' ) ) : ?>
        <div class="img-wrap">
            <?php echo H::render_image( 'side_img' ); ?>

            <?php if ( $credit ) : ?>
                <div class="bottom-img-credit">
                    <?php echo $credit; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>


</div>

<div class="box-wrap">
    <?php if ( have_rows( 'links' ) ) : ?>
        <h3 class="entry-title">
            <?php _e( 'קישורים', 'ystheme' ); ?>
        </h3>
        <h5 class="entry-subtitle">
            <?php _e( 'כתבו עלינו', 'ystheme' ); ?>
        </h5>
        <ul class="entry-links">
            <?php
            while ( have_rows( 'links' ) ) :
                the_row();
                $link = get_sub_field( 'link' );
                ?>
                <li>
                    <a href="<?php echo $link['url'] ?>" target="_blank">
                        <?php echo $link['title']; ?>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>
