<!------------------------------------------------------------------
    THIS IS THE HOME PAGE
    as long as is set the option: "homepage displays a static page"
-------------------------------------------------------------------->
<?php get_header(); ?>

    <div class="container pb-s pt-s" >

        <!--BLOCCO Testo immagine-->
        <section class="testo-img">
            <div class="row">
                <div class="col-12 col-lg-6 immagine">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/4-3.png" alt="">
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="mb-s">H2 here</h2>
                    <p>P here</p> 
                    <a class="btn mt-m" href="#">BTN here</a>
                </div>
            </div>
        </section>


        <!--BLOCCO Titolo + paragrafo-->
        <section class="titolo-paragrafo">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <h2 class="mb-s">H2 here</h2>
                    <p>P here</p> 
                </div>
            </div>
        </section>

        
        <!--BLOCCO Keypoints img + titolo + p-->
        <section class="keypoints">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/1-1.png" alt="">
                    <h3 class="mb-s">H3 here</h3>
                    <p>P here</p> 
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/1-1.png" alt="">
                    <h3 class="mb-s">H3 here</h3>
                    <p>P here</p> 
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/1-1.png" alt="">
                    <h3 class="mb-s">H3 here</h3>
                    <p>P here</p> 
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/1-1.png" alt="">
                    <h3 class="mb-s">H3 here</h3>
                    <p>P here</p> 
                </div>
            </div>
        </section>



    </div> <!--container-->

<?php get_footer(); ?>