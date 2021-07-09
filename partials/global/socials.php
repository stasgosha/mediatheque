<?php

$title  = get_field( 'footer_social_text', 'option' );
$socials = get_field( 'social_networks', 'option' );

if ( have_rows( 'social_networks', 'option' ) ) {

?>
<h4 class="entry-title m-top">
    <?php echo $title; ?>
</h4>
<ul class="social-list toggle-black">
    <?php
    while( have_rows( 'social_networks', 'option' ) ) :
        the_row();
        $network = get_sub_field( 'network' );

        switch ( $network ) {
            case 'facebook':
                $icon_class = "facebook";
                break;
            case 'instagram':
                $icon_class = "instagram";
                break;

            case 'youtube':
                $icon_class = "youtube";
                break;

        }
        ?>
        <li>
            <a href="<?php the_sub_field( 'url' ); ?>">
                <span class="icon meditech-<?php echo $icon_class; ?>"></span>
            </a>
        </li>
    <?php endwhile; ?>
</ul>
<?php
}
