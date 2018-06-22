<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
        	$(document).ready(function() {
				  $.ajaxSetup({ cache: true });
				  $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
				    FB.init({
				      appId: '2076052525957387',
				      version: 'v2.8' // or v2.1, v2.2, v2.3, ...
				    });     
				    $('#loginbutton,#feedbutton').removeAttr('disabled');
				    FB.getLoginStatus(updateStatusCallback);
				  });
				});
        </script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=2076052525957387";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!--==  Pricing  ==-->
        <section id="pricing" class="pricing">
            <div id="w">
                <div class="pricing-filter">
                    <div class="pricing-filter-wrapper">
                        <div class="container">
                            <div class="row" style="margin-top: 80px;">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="section-header">
                                        <h2 class="pricing-title">Menu Items</h2>
                                        <ul id="filter-list" class="clearfix">
                                            <li class="filter" data-filter="all">All</li>
                                            <?php
                                                foreach ($categories as $category) {
                                                    echo '<li class="filter" data-filter=".cat'.$category->cat_id.'">'.$category->cat_name.'</li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">  
                        <div class="col-md-10 col-md-offset-1">
                            <ul id="menu-pricing" class="menu-price">
                                <?php
                                    foreach ($items as $item) {
                                        ?>
                                        <li class="item cat<?=$item->it_category ?>">
                                            <a href="#">
                                                <img src="<?=asset_url() ?><?=$item->it_url ?>" style="width:200px;" class="img-responsive" alt="Food" >
                                                <div class="menu-desc text-center">
                                                    <span>
                                                        <h3><?=$item->it_name ?></h3>
                                                        foodee &amp; Dineth restuarent
                                                    </span>
                                                </div>
                                            </a>
                                                
                                            <h2 class="white"><?=$item->it_price ?></h2>
                                        </li>
                                        <?php
                                    }
                                ?>
                                
                            </ul>

                            <!-- <div class="text-center">
                                    <a id="loadPricingContent" class="btn btn-middle hidden-sm hidden-xs">Load More <span class="caret"></span></a>
                            </div> -->

                        </div>   
                    </div>
                </div>

            </div> 
        </section>
        <center>
        	<div class="fb-comments" data-href="http://localhost/newProject/menu" data-numposts="5" style="width:100%;"></div>
        <center>
        