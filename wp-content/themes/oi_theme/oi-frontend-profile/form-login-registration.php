<?php
/*
	Login and Registration forms template
*/
?>
<div class="oi_frontend">
	<div class="row">
		<?php
		$col = 12;
		?>
		<div class="col-xs-12 col-md-<?php print $col; ?>">
			<h3><?php _e( 'Вход', 'oi_frontend' ); ?></h3>
			<?php
			// load login form template
			oi_frontend_get_template_part( 'form-login' );
			?>
		</div>
	</div>
</div>