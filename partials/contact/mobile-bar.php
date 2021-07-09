<?php

$phone    = get_field( 'phone', 'option' );
$mail     = get_field( 'email', 'option' );
$whatsapp = get_field( 'whatsapp', 'option' );
?>


<div class="contact-mobile-bar hide-desktop">
    <ul>
        <li>
            <a href="<?php echo $whatsapp; ?>">
                <span class="icon meditech-whatsapp"></span>
                <span class="text">
                    <?php _e( 'וואטסאפ', 'ystheme' ); ?>
                </span>
            </a>
        </li>

        <li>
            <a href="mailto:<?php echo $phone; ?>">
                <span class="icon meditech-phone"></span>
                <span class="text">
                    <?php _e( 'טלפון קופות', 'ystheme' ); ?>
                </span>
            </a>
        </li>

        <li>
            <a href="tel:<?php echo $mail; ?>">
                <span class="icon meditech-mail"></span>
                <span class="text">
                    <?php _e( 'שלחו לנו מייל', 'ystheme' ); ?>
                </span>
            </a>
        </li>


    </ul>
</div>
