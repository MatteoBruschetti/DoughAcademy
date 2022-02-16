<?php function DA_setup_theme() {
        //tag title dinamico inserito in automatico nell'header
        add_theme_support("title-tag");
         //add feed RSS supports
        add_theme_support( 'automatic-feed-links' );
        //supporto all'img in evidenza
        add_theme_support("post-thumbnails");
        //aggiunta di una posizione del menu
        register_nav_menu("header", "Navbar Header");
    }
    add_action("after_setup_theme", "DA_setup_theme");

    
    
    //add CSS
    function DA_styles() {
        wp_enqueue_style("DA-grid", get_template_directory_uri().'/css-parts/bootstrap-grid.min.css');
        wp_enqueue_style("DA-style", get_template_directory_uri().'/style.min.css');       
    }
    add_action("wp_enqueue_scripts", "DA_styles");
    //add JS
    function DA_scripts() {
        wp_enqueue_script("DA-scrollreveal", get_template_directory_uri().'/js/scrollreveal.min.js', array(), null, false);
        wp_enqueue_script("DA-scriptjs", get_template_directory_uri().'/js/script.js', array("jquery"), null, true);
    }
    add_action("wp_enqueue_scripts", "DA_scripts");



    /*REMOVE
    ----------------------------------------------*/ 
    // Remove comments
    add_action('admin_init', function () {
        global $pagenow;
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    });
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);
    add_filter('comments_array', '__return_empty_array', 10, 2);
    add_action('admin_menu', function () {
        remove_menu_page('edit-comments.php');
    });
    add_action('init', function () {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    });

    //Remove emoji
    function DA_disable_emojis() {
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
        add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
    }
    add_action( 'init', 'DA_disable_emojis' );
        function disable_emojis_tinymce( $plugins ) {
            if ( is_array( $plugins ) ) {
            return array_diff( $plugins, array( 'wpemoji' ) );
            } else {
            return array();
            }
        }
        function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
            if ( 'dns-prefetch' == $relation_type ) {
                $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
                $urls = array_diff( $urls, array( $emoji_svg_url ) );
            }
            return $urls;
        }
    
    //Remove embeded
    function DA_disable_embed(){
        wp_dequeue_script( 'wp-embed' );
       }
    add_action( 'wp_footer', 'DA_disable_embed' );

    //disable gb Sidebar Settings
    function DA_disable_gutenberg_sidebar_settings() {
        //hide Color
        add_theme_support( 'disable-custom-colors' );
        add_theme_support( 'disable-custom-colors' );
        add_theme_support( 'editor-color-palette' );
        add_theme_support( 'editor-gradient-presets', [] );
        add_theme_support( 'disable-custom-gradients' );
    }
    add_action( 'after_setup_theme', 'DA_disable_gutenberg_sidebar_settings' );




    /*ADD
    --------------------------------------------*/
    // ADD support to SVG upload
    function DA_svg_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'DA_svg_types');


    //custom GB css
    function DA_custom_fullscreeneditor_logo(){
        $screen = get_current_screen();
        if( ! $screen->is_block_editor ) {
            return;
        }
        //ADD color to spacers
        //ADD dashed border to groups
        echo '<style>
            .wp-block-spacer{
                background: rgba(211, 211, 211, 0.3);
            }
            .wp-block-group{
                border: 2px dashed #C7B299;
                padding: 16px;
            }
        </style>';

        //HIDE unwanted gb block settings
        echo '<style>
        .components-panel .typography-block-support-panel{
            display:none;
        }
        </style>';
    }
    add_action( 'admin_head', 'DA_custom_fullscreeneditor_logo' );



    /*FUNCTION PARTS
    -------------------------------------------------*/
    require dirname(__FILE__).'/function_parts/customizer.php';
    require dirname(__FILE__).'/function_parts/customize_backend.php';
    require dirname(__FILE__).'/function_parts/wp-pattern.php';

    //CPT
    require dirname(__FILE__).'/function_parts/cpt/CPT_corsi.php'; 

?>
