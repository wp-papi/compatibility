<?php

/**
 * Change post type name to page type name.
 *
 * @param  array  $contex
 * @param  string $message
 * @param  array  $row
 *
 * @return array
 */
add_filter( 'simple_history/logger/interpolate/context', function( $context, $message, $row ) {
	if ( empty( $row ) ) {
		return $context;
	}

	if ( $row->logger === 'SimplePostLogger' && $row->context_message_key === 'post_updated' ) {
		if ( $page_type_name = papi_get_page_type_name( $context['post_id'] ) ) {
			$context['post_type'] = $page_type_name;
		}
	}

	return $context;
}, 10, 3 );
