<?php
/*---------------------------------------------------------------------------
    ADD FEATURES TO THE CUSTOMIZE PAGE (che sarebbe Aspetto -> personalizza)
----------------------------------------------------------------------------*/

    function DA_customize_register($wp_customize) {
        

        /*ADD SECTION FOR CONTACT INFO (utile se i contanti vengono ripetuti su più pagine poichè permette di modificarli tutti in una volta)
        /*per stampare poi i valori basta usare <?php echo get_theme_mod("DA_contatti_telefono"); ?>
        ----------------------------------------------------------*/
        $wp_customize -> add_section("DA_contatti", array(
            "title"                 =>                  "Contatti",
            "description"           =>                  "Inserisci i contatti dell'azienda",
            "priority"              =>                  20
        ));
            /*FIELD Telefono*/
            $wp_customize -> add_setting("DA_contatti_telefono", array(
                "default"           =>                  "Inserisci il tuo numero di telefono"
            ));
                $wp_customize -> add_control("DA_contatti_telefono", array(
                    "section"       =>                 "DA_contatti", /*INSERT THIS FIELD IN SECTION Contatti*/         
                    "label"         =>                 "Telefono",
                    "type"          =>                 "text"
                ));
            /*FIELD Indirizzo*/
            $wp_customize -> add_setting("DA_contatti_indirizzo", array(
                "default"           =>                  "Inserisci il tuo indirizzo"
            ));
                $wp_customize -> add_control("DA_contatti_indirizzo", array(
                    "section"       =>                  "DA_contatti", 
                    "label"         =>                  "Indirizzo",
                    "type"          =>                  "text"

                ));
            /*FIELD Piva*/
            $wp_customize -> add_setting("DA_contatti_piva", array(
                "default"           =>                  "Inserisci il tuo codice P.IVA"
            ));
                $wp_customize -> add_control("DA_contatti_piva", array(
                    "section"       =>                  "DA_contatti", 
                    "label"         =>                  "Partita IVA",
                    "type"          =>                  "text"

                ));

            /*FIELD Facebook*/
            $wp_customize -> add_setting("DA_social_facebook", array(
                "default"           =>                  "Inserisci url della pagina facebook"
            ));
                $wp_customize -> add_control("DA_social_facebook", array(
                    "section"       =>                 "DA_contatti",        
                    "label"         =>                 "Facebook",
                    "type"          =>                 "url"
                ));
            
            /*FIELD Instagram*/
            $wp_customize -> add_setting("DA_social_instagram", array(
                "default"           =>                  "Inserisci url della pagina instagram"
            ));
                $wp_customize -> add_control("DA_social_instagram", array(
                    "section"       =>                  "DA_contatti",
                    "label"         =>                  "Instagram",
                    "type"          =>                  "url"

                ));
                
            /*FIELD Youtube*/
            $wp_customize -> add_setting("DA_social_youtube", array(
                "default"           =>                  "Inserisci url della pagina Youtube"
            ));
                $wp_customize -> add_control("DA_social_youtube", array(
                    "section"       =>                  "DA_contatti",
                    "label"         =>                  "Youtube",
                    "type"          =>                  "url"

                ));
            
    }      
    add_action("customize_register", "DA_customize_register");

?>