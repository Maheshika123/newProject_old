<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img id="logo" style="width: 150px" src="<?=asset_url() ?>images/Capture.png" class="logo img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="<?= $pageid==11?'active':''?>"><a href="<?=base_url() ?>main">We are</a></li>
                        <li class="<?= $pageid==12?'active':''?>"><a href="<?=base_url() ?>offers">Offers</a></li>
                        <li class="<?= $pageid==13?'active':''?>"><a href="<?=base_url() ?>menu">Menu</a></li>
                        <li class="<?= $pageid==14?'active':''?>"><a href="<?=base_url() ?>order">Order Now!</a></li>
                        <li class="<?= $pageid==15?'active':''?>"><a href="<?=base_url() ?>reservation">reservation</a></li>
                        <li class="<?= $pageid==16?'active':''?>"><a href="<?=base_url() ?>login">login</a></li>
                        <li class="<?= $pageid==17?'active':''?>"><a href="<?=base_url() ?>contact">contact</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>