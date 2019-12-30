</div>

<?php
if ( ! is_page() && ! is_front_page() && get_post_type() != 'edu' ) {
	?>
	<div class="block block-thin block-white">
		<div class="container">
			<?php echo do_shortcode( '[vkgroup]' ); ?>
		</div>
	</div>
	<?php
}
?>
<div class="bottom_sidebar">
	<div class="row">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div>
<div class="footer">
	<div class="footer__siderbar"></div>
	<div class="container">
		<div class="row">
			<div class="col-sd-6 col-md-6">
				<p class="oi-plug-poweredby-box">All rights reserved © <a class="oi-plug-poweredby"
				                                                          href="https://oiplug.com/">OiPlug</a>, 2017
				</p>
			</div>
			<div class="col-sd-6 col-md-6"></div>
		</div>
	</div>
</div>
<?php
//$allowedTags = '<style><link><meta><title>';
//$header_tags = theme_strip_tags_content( HEAD_CONTENT, $allowedTags );
//print implode("\n",$header_tags);
//pr( $header_tags[1]);
?>
<?php //theme_insert_js( HEAD_CONTENT ); ?>
<?php wp_footer(); ?>
<?php echo do_shortcode( "[uptolike]" ); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function ( d, w, c ) {
		(w[ c ] = w[ c ] || []).push( function () {
			try {
				w.yaCounter31945626 = new Ya.Metrika( {
					id : 31945626,
					clickmap : true,
					trackLinks : true,
					accurateTrackBounce : true,
					webvisor : true,
					trackHash : true
				} );
			} catch ( e ) {
			}
		} );

		var n   = d.getElementsByTagName( "script" )[ 0 ],
		    s   = d.createElement( "script" ),
		    f   = function () {
			    n.parentNode.insertBefore( s, n );
		    };
		s.type  = "text/javascript";
		s.async = true;
		s.src   = "https://mc.yandex.ru/metrika/watch.js";

		if ( w.opera == "[object Opera]" ) {
			d.addEventListener( "DOMContentLoaded", f, false );
		} else {
			f();
		}
	})( document, window, "yandex_metrika_callbacks" );
</script>
<noscript>
	<div><img src="https://mc.yandex.ru/watch/31945626" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>