<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section id="breakfast" class="breakfast">
            <div class="wrapper">
                <div class="container-fluid">
                    <div class="row dis-table" style="margin-top: 80px;">
                        <div class="col-xs-6 col-sm-6 dis-table-cell color-bg">
                            <h2 class="section-title">Select a payment method</h2>
                        </div>
                        <div class="col-xs-6 col-sm-6 dis-table-cell">

                            <center>
                                <form action="<?=base_url()?>payment/payondelivery" method="post">
                                    <h3>Amount : <?=$orderprice?><br/>Order : <?=$orderid?></h3>
                                    <input type="hidden" name="orderid" value="<?=$orderid?>">
                                    <input style="width: 50%;" src="http://lootsales.com/wp-content/uploads/2016/10/cod_logo.jpg" type="image" name="submit" border="0">  
                                </form>
                                <h2>OR</h2>
                                <form action="<?=$paypal_url; ?>" method="post">
                                    <!-- Identify your business so that you can collect the payments. -->
                                    <input type="hidden" name="business" value="<?=$paypal_id?>">
                                    <!-- Specify a Buy Now button. -->
                                    <input type="hidden" name="cmd" value="_xclick">
                                     <!-- Specify details about the item that buyers will purchase. -->
                                    <input type="hidden" name="item_name" value="order">
                                    <input type="hidden" name="item_number" value="<?=$orderid?>">
                                    <input type="hidden" name="amount" value="<?=$orderprice?>">
                                    <input type="hidden" name="currency_code" value="USD">
                                    
                                    <!-- Specify URLs -->
                                    <input type='hidden' name='cancel_return' value='<?=base_url()?>payment/cancel'>
                                    <input type='hidden' name='return' value='<?=base_url()?>payment/success?tx=<?=$orderid?>&item_number=<?=$orderid?>&amt=<?=$orderprice?>&cc=USD&st=1'>
                                    
                                    <!-- Display the payment button. -->
                                    <input style="width: 50%;" type="image" name="submit" border="0"
                                    src="http://boppalongtours.net/wp-content/uploads/2016/02/1431389879455.png" alt="PayPal - The safer, easier way to pay online">

                                    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                                </form>
                                
                            </center>
                        </div>
                    </div> <!-- /.dis-table -->
                </div> <!-- /.row -->
            </div> <!-- /.wrapper -->
        </section> <!-- /#breakfast -->

