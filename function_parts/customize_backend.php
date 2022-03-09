<?php
    /*WP custom backend
    --------------------------------*/
    
    //custom wp backend logo = 17x17px
    function DA_custom_logo() {
        echo '<style type="text/css">
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-logo.png) !important;
                background-position: 0 0;
                background-size: cover;
                color:rgba(0, 0, 0, 0);
            }
             #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
                background-position: 0 0;
            }
        </style>';
    }
    add_action('wp_before_admin_bar_render', 'DA_custom_logo');

    //custom wp login logo = 85x85px
    function DA_custom_login_logo() { 
        echo '<style type="text/css">
            #login h1 a, .login h1 a {
                background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/custom-login-logo.png);
                background-repeat: no-repeat;
                background-size: cover;
                margin-bottom: 10px
            }
            #login h1::after, .login h1::after {
                content: "by Federico Toldo e Matteo Bruschetti";
                font-size: 16px;
                font-weight: 400;
                opacity: 0.8;
                margin-bottom: 20px
            }
        </style>';
    }
    add_action('login_enqueue_scripts', 'DA_custom_login_logo');

    function colorschemedoughacademy_admin_color_scheme() {
        //Get the theme directory
        $theme_dir = get_stylesheet_directory_uri();
      
        //Dough Academy
        wp_admin_css_color( 'color-scheme-dough-academy', __( 'Dough Academy' ),
          $theme_dir . '/css-parts/color-scheme-dough-academy.css',
          array( '#534741', '#fff', '#dc0500' , '#c7b299')
        );
      }
      add_action('admin_init', 'colorschemedoughacademy_admin_color_scheme');
?>