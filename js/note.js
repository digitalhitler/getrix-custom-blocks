
(function(wp) {
	var el = wp.element.createElement,
		blocks = wp.blocks;

	var blockStyle = {
		backgroundColor: '#900',
		color: '#fff',
		padding: '20px',
	};


	blocks.registerBlockType( 'getrix-custom-blocks/note', {
		title: 'Getrix: Note',
		icon: 'dashicons-lightbulb',
		category: 'common',
		attributes: {
        	content: {
	            type: 'array',
	            source: 'children',
	            selector: 'p',
	        }
	    },
	    edit: function( props ) {
	        var content = props.attributes.content;
	        function onChangeContent( newContent ) {
	            props.setAttributes( { content: newContent } );
	        }

	        return el(
	            wp.editor.RichText,
	            {
	                tagName: 'p',
	                className: props.className,
	                onChange: onChangeContent,
	                value: content,
	            }
	        );
	    },

	    save: function( props ) {
	        var content = props.attributes.content;

	        return el( window.wp.editor.RichText.Content, {
	            tagName: 'p',
	            className: props.className,
	            value: content
	        } );
	    },
	} );
}(
	window.wp
));