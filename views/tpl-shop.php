<?php /* Template Name: Shop */
	get_header();
?>

<section class="shop-page-section">
	<div class="container container-md">
		<div class="section-top content-wrap text-center">
			<?php the_content();?>
		</div>

		<div class="shop-grid">
            <?php $special=get_field('products');?>
            <?php if($special){?>
                <?php $i = 0;?>
                <?php foreach($special as $value){ ?>
                    <div class="shop-card">
                        <div class="card-image">
                            <?php
                            $thumb_id = get_post_thumbnail_id($value);
                            $thumb_url = wp_get_attachment_image_src($thumb_id,'product', true);
                            $image_alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true);
                            ?>
                            <img src="<?php echo $thumb_url[0]; ?>" alt="<?php echo $image_alt; ?>">
                        </div>
                        <div class="card-content">
                            <h3 class="card-caption"><a href="#"><?php echo get_the_title($value);?></a></h3>

                            <ul class="card-info">
                                <li><strong>מחיר:</strong><?php echo get_field('price',$value);?></li>
                                <li>
                                    <strong>כמות:</strong>
                                    <div class="count-select">
                                        <button class="change-count plus">+</button>
                                        <input type="tel" value="1">
                                        <button class="change-count minus">-</button>
                                    </div>
                                </li>
                            </ul>

                            <div class="card-footer">
                                <a href="#" class="btn btn-small yellow">רכישה</a>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
            <?php  } ?>


		</div>
	</div>
</section>

<?php
	get_footer();
?>