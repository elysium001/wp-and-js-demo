// Import components
import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';
import { RichText } from '@wordpress/editor';
import { Button } from '@wordpress/components';

// Register the block
registerBlockType( 'wp-and-js-demo/simple-block', {
    title: __( 'Simple Block' ),
    description: __( 'A simple block.' ),
    icon: 'smiley',
    category: 'common',
    keywords: [
        __( 'Simple Block' ),
        __( 'WP and JS Demo' ),
    ],
    edit: props => {
        const {
            className,
        } = props;

        // simple div with a class name
        return (
            <div className={ className }>
                <RichText
                    tagName="p"
                    className="content"
                />
            </div>
        );
    },
    save: () => {
        return (
            <div>
                <RichText.Content
                    tagName="p"
                    className="content"
                />
            </div>
        );
    }
} );

console.log('simple-block.js loaded');
