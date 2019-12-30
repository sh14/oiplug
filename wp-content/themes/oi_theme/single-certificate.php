<?php


get_header();
$data = [];

$data[] = 'ID: ' . get_the_ID();
$data[] = get_the_date();
$data[] = get_p2p_titles( [
	'connected_type' => 'certificate_to_user',
	'type'           => 'users',
] );

$data[] = get_p2p_titles( [
	'connected_type' => 'certificate_of_edu',
] );

$data_string = '';
foreach ( $data as $i => $item ) {
	if ( is_array( $item ) ) {
		$data[ $i ] = implode( ' ', $item );
	}
}
$data = implode( ', ', $data );
?>

	<div class="container">
		<?php
		echo $data;
		the_content();
		?>
	</div>

<?php
get_footer();
