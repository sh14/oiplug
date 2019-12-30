<?php
/**
 * Created by PhpStorm.
 * User: sh14ru
 * Date: 21.01.17
 * Time: 23:55
 */
?>
<div class="sidebar-wide">
	<div class="row subscribtion_block">
		<div class="col-xs-12">
			<div class="container">
				<?php
				ob_start();
				dynamic_sidebar( 'after-content' );
				$out = ob_get_contents();
				ob_clean();
				$out = str_replace( 'name="jetpack_subscriptions_widget"', 'name="jetpack_subscriptions_widget" class="btn btn-oiplug btn-lg"', $out );
				$out = str_replace( 'class="required"', 'class="required form-control"', $out );
				echo $out;
				?>
			</div>
		</div>
	</div>
</div>