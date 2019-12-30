<?php
global $data;
if( ! empty( $data ) )
{
	extract( $data );
	/*
	if( ! is_user_logged_in() )
	{
		$demo = ' href="#" data-toggle="modal" data-target="#myModal"';
		$source = $demo;
	}else
	*/
	$out = '';
	if( ! $jsfiddle_type )
	{
		if( $jsfiddle )
		{
			$jsfiddle = rtrim( $jsfiddle, "/" );
			$demo = ' href="' . $jsfiddle . '/embedded/result/" target="_blank"';
			$source = ' href="' . $jsfiddle . '" target="_blank" target="_blank"';
			ob_start();
			?>
			<div class="jsfiddle">
				<div class="links">
					<a class="btn btn-primary"<?php print $demo; ?>>Демо</a>
					<a class="btn btn-success"<?php print $source; ?>>Исходный код</a>
				</div>
				<div class="text">
					<p>Посмотрите пример работы или исходный, кликнув на соответствующую кнопку:</p>
					<h4>"<?php the_title(); ?>"</h4>
				</div>
			</div>
			<?php
			$out = ob_get_contents();
			ob_clean();
		}		
	}else
	{
		if( $jsfiddle )
		{
			$out = '<iframe width="100%" height="300" src="'. $jsfiddle .'embedded/'. $tabs .'/" allowfullscreen="allowfullscreen" frameborder="0"></iframe>';
		}
	}
	print $out;
}
?>