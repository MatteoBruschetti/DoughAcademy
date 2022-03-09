<?php

function DA_custom_fullscreeneditor_logo(){
    $screen = get_current_screen();
    if( ! $screen->is_block_editor ) {
        return;
    }

    //basic helpers
    echo '<style>
        .wp-block.wp-block:not(.editor-post-title):not(.block-list-appender):not(.block-editor-default-block-appender):not([data-type="generateblocks/grid"]){
            margin-top: 24px; margin-bottom: 24px; padding: 8px;
            border: dashed 1px #C7B299;
            transition: all .4s ease;
        }
            .wp-block.wp-block:not(.editor-post-title):not(.block-list-appender):not(.block-editor-default-block-appender):not([data-type="generateblocks/grid"]):hover{
                border: solid 1px #534741; 
            }
        .wp-block-separator{
            background-color: #534741;
            opacity: 1;
            width: 100% !important;
        }
        .wp-block-group, .wp-block-buttons{
            padding: 8px;
        }
        /* add color to spacers */
        .wp-block-spacer{
            background: #C7B29964;
        }
    </style>';

    //HIDE unwanted gb Sidebar Settings
    echo '<style>
        .components-panel .typography-block-support-panel{
            display:none;
        }
        .components-toolbar-group button[aria-label="Allinea"]{
            display:none;
        }
        .components-panel .block-editor-hooks__flex-layout-justification-controls{
            display:none;
        }
            .components-panel .block-editor-hooks__flex-layout-orientation-controls{
                display:none;
            }
            .components-toolbar-group button[aria-label="Cambia la giustificazione dell\'elemento"]{
                display:none;
            }
            .block-editor-hooks__border-controls{
                display:none;
            }
            .components-panel .components-button-group[aria-label="Larghezza del pulsante"]{
                display:none;
            }
    </style>';

    //HIDE unwanted embed blocks
    echo '<style>
        .block-editor-block-types-list[aria-label="Incorporamenti"] button:not(.editor-block-list-item-embed){
            display:none; 
        }

    </style>';
}
add_action( 'admin_head', 'DA_custom_fullscreeneditor_logo' );


//disable gb Sidebar Settings
// function DA_disable_gutenberg_sidebar_settings() {
//     //hide Color
// 	add_theme_support( 'disable-custom-colors' );
// 	add_theme_support( 'editor-color-palette' );
// 	add_theme_support( 'editor-gradient-presets', [] );
// 	add_theme_support( 'disable-custom-gradients' );
// }
// add_action( 'after_setup_theme', 'DA_disable_gutenberg_sidebar_settings' );


// Remove block style pannel via JS 
function enqueue_block_editor_scripts() {
    wp_enqueue_script(
        'gb-style-blocks-js',
        get_stylesheet_directory_uri() . '/js/gb-style-blocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), // specify dependencies to avoid race condition
        '1.0',
        true
    );
}
add_action('enqueue_block_editor_assets', 'enqueue_block_editor_scripts');

?>