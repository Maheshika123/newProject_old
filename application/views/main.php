<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" href="<?=asset_url() ?>css/flexslider.css">
<script type="text/javascript" src="<?=asset_url() ?>js/jquery.flexslider.min.js"></script>
<script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
</script>

        <section id="header-slider" class="owl-carousel">
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">Sri Lankan<br/> Taste!</h1>
                        <p class="header-sub-title">Value added to Sri Lankan taste</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">Spicy</h1>
                        <p class="header-sub-title"></p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <div class="header-content text-right pull-right">
                        <h1 class="header-title">Hangouts</h1>
                        <p class="header-sub-title">Best place to meet someone</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
        </section>



        <!--== 6. About us ==-->
        <section id="about" class="about">
            <img src="<?=asset_url() ?>images/icons/about_color.png" class="img-responsive section-icon hidden-sm hidden-xs">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table">
                        <div class="hidden-xs col-sm-6 section-bg about-bg dis-table-cell">

                        </div>
                        <div class="col-xs-12 col-sm-6 dis-table-cell">
                            <div class="section-content">
                                <h2 class="section-content-title">About us</h2>
                                <p class="section-content-para">
                                    WE ARE A COMPANY OF COOKS.
We passionately believe that restaurant quality food can be made in every setting, and we are excited to share it with you.
Whoa Nelly! is a boutique catering company serving Los Angeles and Southern California. We offer local, seasonal, farmers market menus for events large and small. Our long-standing relationships with local farmers ensure that we will bring the best of the market to your table. A sustainable philosophy is at the heart of everything we do, and we are committed to using local produce and sustainably raised meats and fish.

        
                                </p>
                                <p class="section-content-para">
                                    We believe that the menus for special events should be just that: Special
                                </p>
                            </div> <!-- /.section-content -->
                        </div>
                    </div> <!-- /.row -->
                </div> <!-- /.container-fluid -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#about -->








