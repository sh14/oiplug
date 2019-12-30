<article <?php post_class( 'post' ); ?> id="post-<?php the_ID(); ?>" itemscope=""
                                        itemtype="http://schema.org/BlogPosting">
	<div class="post-header font-alt">
		<?php
		$feat_image_url = '';
		if ( has_post_thumbnail() ) {
			$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' )[0];
		}
		?>
		<figure class="post-thumbnail" style="background-image:url(<?php echo $feat_image_url; ?>);">
			<meta itemprop="image" content="<?php echo $feat_image_url; ?>"/>
			<?php the_srcset_img( array( 'exclude' => array( 'oi_plug_cart_item_image_size', 'thumbnail' ) ) ); ?>
		</figure>
		<h2 class="post-title"><?php the_title(); ?></h2>
	</div>
	<div class="post-entry" itemprop="articleBody">
		<?php
		the_content();
		?>
	</div><!-- .entry-content -->

</article>

