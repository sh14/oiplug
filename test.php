<?php
/**
 * Date: 2019-12-27
 * @author Isaenko Alexey <info@oiplug.com>
 */

function getClass( $classTrail ) {
	$classTrail = array_values( array_filter( explode( '.', $classTrail ) ) );

	$mixins  = [];
	$classes = [];
	$block   = '';
	$count   = sizeof( $classTrail );
	foreach ( $classTrail as $i => $item ) {
		if ( 0 === $i ) {
			$block = $classTrail[ $i ];

			if ( 1 == $count ) {
				$classes[] = $block;
			}
		}
		else {

			if ( 0 === strpos( $classTrail[ $i ], '_' ) ) {
				$mixins[] = $classTrail[ $i ];
			}
			else {
				$classes[] = $block . '__' . $classTrail[ $i ];
			}
		}
	}

	foreach ( $classes as $i => $class ) {
		foreach ( $mixins as $j => $mixin ) {
			$classes[] = $classes[ $i ] . $mixin;
		}
	}
	$classes = join( ' ', $classes );
	return $classes;
}

getClass( '.block' );
getClass( '.block.item' );
getClass( '.block.item._one' );
getClass( '.block.item._one._active' );

// eof
