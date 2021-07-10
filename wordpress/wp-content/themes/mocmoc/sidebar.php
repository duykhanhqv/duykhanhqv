<div class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="logo">
                    <a href="index.html">
                        <?php
                        if(function_exists('the_custom_logo')){
                            //the_custom_logo();
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src($custom_logo_id);
                            //dd($logo);
                        }
                        ?>
                        <img width="" src="<?php echo $logo[0] ?>" alt=""></a>
                </div><!-- end logo -->
            </div>
        </div><!-- end row -->
    </div><!-- end header-logo -->
</div><!-- end header -->

<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-toggleable-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#cloapediamenu"
                aria-controls="cloapediamenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="cloapediamenu">

                <ul class="navbar-nav">
                    <?php
                        mocmoc_showmenu('primary_menu', true)

                        ?>

                </ul>
            </div>
        </nav>
    </div><!-- end container -->
</header><!-- end header -->