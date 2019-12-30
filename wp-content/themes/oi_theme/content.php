<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 21.12.16
 * Time: 21:15
 */
global $post;
$_mixin = '';
$post_id = get_the_ID();
$author = get_the_author();
$atts                   = array(
	'block_class'   => 'box_shadow',
	'term_taxonomy' => 'category',
);

// получение миниатюры поста текущего размера миниатюры
$article__thumbnail = article__thumbnail( [
	'post_id'    => $post_id,
	'image_size' => 'large',
	'image'      => get_srcset_img( [
		'post_id' => $post_id,
		'class'   => '',
	] ),
] );

$author_template        = oi_get_template_part( 'templates/author' );
$article__meta_template = oi_get_template_part( 'templates/article__meta' );

$article__image = get_srcset_img( array(
		//'post_id' => $post_id,
		'class' => ! empty( $atts['thumb_image_class'] ) ? $atts['thumb_image_class'] : '',
	)
);

$article__terms = article__terms( array(
	'_mixin'        => $_mixin,
	'post_id'       => $post_id,
	'term_taxonomy' => $atts['term_taxonomy'],
) );


$author = author_template( array(
	'author_id' => $post->post_author,
	'html'      => $author_template,
) );

$article__meta = article__meta( array(
	'_mixin'         => $_mixin,
	'author'         => $author,
	'article__terms' => $article__terms,
	'html'           => $article__meta_template,
) );
?>

<article <?php post_class('article box_shadow'); ?> itemscope="" itemtype="http://schema.org/BlogPosting">
	<div class="article__container">
		<div class="article__header">
			<a class="article__link" href="<?php echo get_permalink(); ?>" title="<?php the_title(); ?>">
				<figure class="article__thumbnail" <?php echo $article__thumbnail; ?>>
					<meta itemprop="image" content="<?php echo $article__thumbnail; ?>"/>
				</figure>
				<h2 class="article__title"><?php the_title(); ?></h2>
			</a>
		</div>
		<?php echo $article__meta; ?>
	</div>
</article>
