<?php

function getrix_custom_blocks_register() {

	if ( ! function_exists( 'register_block_type' ) ) {
		// Gutenberg is not active.
		return;
	}
	wp_register_script(
		'getrix-note',
		plugins_url( '../js/note.js', __FILE__ ),
		array( 'wp-blocks', 'wp-element' ),
		filemtime( plugin_dir_path( __FILE__ ) . '../js/note.js' )
	);

	wp_register_style(
        'getrix-custom-blocks-editor-style',
        plugins_url( '../editor.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . '../editor.css' )
    );

    wp_register_style(
        'getrix-custom-blocks-style',
        plugins_url( '../blocks.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . '../blocks.css' )
    );

    register_block_type( 'getrix-custom-blocks/note', array(
		'script' => 'getrix-note',
		'style' => 'getrix-custom-blocks-style',
		'editor_style' => 'getrix-custom-blocks-editor-style'
	) );


} 
add_action( 'init', 'getrix_custom_blocks_register' );