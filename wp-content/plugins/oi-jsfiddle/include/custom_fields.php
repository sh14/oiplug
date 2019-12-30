<?php
function oijsfiddle_add_post_meta_boxes() // install custom meta box
{
	add_meta_box(
		'oi-post-class',                        // block ID
		__( 'Дополнительно', 'oi' ),    // Title
		'oijsfiddle_custom_fields_special',                    // Callback function
		array( 'post','page'),                                // activate on specific post type
		'normal',                                    // Wher it should be placed
		'core'                                // Priority
	);
}

add_action( 'add_meta_boxes', 'oijsfiddle_add_post_meta_boxes' );

class oijsfiddle_custom_fields_special_class {
	// указываем поля и их атрибуты
	public static $fields = array();
	public static $values = array(); // custom fields values

	public function set_values() {
		self::$fields = array(
			'jsfiddle'      => array(
				'name'  => 'oijsfiddle_custom_fields_special[jsfiddle]',
				'id'    => 'jsfiddle',
				'type'  => 'text',
				'label' => __( 'Ссылка на проект в JSFIDDLE', 'oi' ),
				'style' => 'width: 100%;',
				'hint'  => __( 'Например: //jsfiddle.net/sh14/5L8nk3wa/', 'oi' ),
				'html'  => '<tr><th>%2$s</th><td>%1$s</td></tr>',
			),
			'jsfiddle_type' => array(
				'name'  => 'oijsfiddle_custom_fields_special[jsfiddle_type]',
				'id'    => 'jsfiddle_type',
				'type'  => 'checkbox',
				'label' => __( 'Показывать вставку или кнопки', 'oi' ),
				'hint'  => __( '', 'oi' ),
				'html'  => '<tr><th>%2$s</th><td>%1$s</td></tr>',
			),
		);
		self::$values = self::get_meta();
	}

	public function get_meta( $post_id = null ) // get variable values from db and put them in array
	{
		if ( $post_id == null ) {
			$post_id = get_the_ID();
		}
		$fields = self::$fields;
		$values = $_POST['oijsfiddle_custom_fields_special'];
		if ( sizeof( $values ) == 0 && sizeof( $_POST ) == 0 ) // если не происходит сохранение данных
		{
			$values = get_post_meta( $post_id, 'oijsfiddle_custom_fields_special', true ); // get values from db
		}

		return $values;
	}
}

function oijsfiddle_custom_fields_special() //displays the form in the custom write post screen
{
	if ( sizeof( oijsfiddle_custom_fields_special_class::$values ) == 0 ) {
		oijsfiddle_custom_fields_special_class::set_values();
	}
	$values = oijsfiddle_custom_fields_special_class::$values;
	$fields = oijsfiddle_custom_fields_special_class::$fields;

	$i = 0;
	wp_nonce_field( plugin_basename( __FILE__ ), 'oijsfiddle_custom_fields_special_noncename' );
	?>
	<table class="form-table">
		<?php
		if ( sizeof( $fields ) > 0 ) {//pr($fields);
			foreach ( $fields as $k => $v ) //
			{
				//if( $values[$k] )
				{
					$v['value'] = @$values[ $k ];
					print oinput( $v );
				}
			}
		}
		//pr($fields);
		//pr($values);
		?>
	</table>
	<style>
	</style>
	<?
}

function oijsfiddle_custom_fields_special_save( $post_id, $post_object ) {
	// Doing revision, exit earlier **can be removed**
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Doing revision, exit earlier
	if ( 'revision' == $post_object->post_type ) {
		return;
	}

	// Verify authenticity
	if ( ! wp_verify_nonce( $_POST['oijsfiddle_custom_fields_special_noncename'], plugin_basename( __FILE__ ) ) ) {
		return;
	}

	// Correct post type
	// if ( 'page' != $_POST['post_type'] )
	//     return;

	if ( $_POST['oijsfiddle_custom_fields_special'] ) {
		oijsfiddle_custom_fields_special_class::set_values();
		$values = oijsfiddle_custom_fields_special_class::$values;

		if ( $values ) {
			update_post_meta( $post_id, 'oijsfiddle_custom_fields_special', $values );
		} else {
			delete_post_meta( $post_id, 'oijsfiddle_custom_fields_special' );
		}
	} // Nothing received, all fields are empty, delete option
	else {
		delete_post_meta( $post_id, 'oijsfiddle_custom_fields_special' );
	}
}

add_action( 'save_post', 'oijsfiddle_custom_fields_special_save', 10, 2 );