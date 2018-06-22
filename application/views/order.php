<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <!--ORDER MENU==-->
        <section id="header-slider" class="owl-carousel">
            <div class="item" style="background:url(<?=asset_url() ?>images/order/orderimage.jpg);background-size: cover;background-position: bottom;">
                <div class="container">
                    <div class="header-content text-right pull-right">
                        <h1 class="header-title">Order NOW!</h1>
                        <p class="header-sub-title">YOUR MENU ONLINE</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
        </section>

        <section id="beer" class="beer">
            <div class="container-fluid">
                <div class="row dis-table" style="width:100%;">

                    <div class="col-xs-12 col-sm-12 dis-table-cell">
                        <div>
                            <div class="section-description">
                                <link rel="stylesheet" type="text/css" href="<?=asset_url() ?>css/ordernow/table.css">
								<link rel="stylesheet" type="text/css" href="<?=asset_url() ?>css/ordernow/placeorder.css">
								<link rel="stylesheet" type="text/css" href="<?=asset_url() ?>css/ordernow/button.css">

								<div class="col-md-4 col-sm-12" style="float:left;margin-left: 2%;margin-right:5%;">
									<table class="table" style="width: 100%;">
										<thead class="thead-inverse">
											<tr>
												<th colspan="2"><center><h3>Select Items to Order</h3></center></th>
											</tr>
										</thead>
										<tr>
											<td>Category:</td>
											<td>
												<select class="form-control" id="categorySelect" style="width:100%;">
													<option value="0">All</option>
													<?php
														foreach($categories as $category) {
														?>

														 <option value="<?=htmlspecialchars($category->cat_id) ?>">
                                                            <?=htmlspecialchars($category->cat_name)?>
                                                         </option>
														<?php
														}
													?>
												</select>
											</td>
										</tr>

										<tr>
											<td>Food Item:</td>
											<td>
												<select class="form-control" id="itemSelect" style="width:100%;">
													<?php
														foreach($items as $item) {
														?>
														  <option value="<?=htmlspecialchars($item->it_id) ?>" category="<?=htmlspecialchars($item->it_category) ?>" price="<?=htmlspecialchars($item->it_price) ?>">
														  	<?=htmlspecialchars($item->it_name)?>
														  </option>
														<?php
														}
													?>
												</select>
											</td>
										</tr>

										<tr>
											<td>Unit Price (LKR):</td>
											<td><span id="unitPrice"></span></td>
										</tr>

										<tr>
											<td>Quantity:</td>
											<td><input class="form-control" id="itemQuantity" type="number" min="1" value="1"></td>
										</tr>

										<tr>
											<td colspan="2"><center><button id="addOrderItem" class='button -alge center'>Add to Order</button></center></td>
										</tr>
									</table>

								</div>
                                <div class="col-md-7 col-sm-12" style="float:left;">

                                    <table class ="table" style="width:100%;">
	                                    <thead class="thead-inverse">
	                                        <tr>
	                                            <th colspan="2"><center><h3>Your Order</h3></center></th>
	                                        </tr>
	                                    </thead>
                                    </table>
                                    
                                    <form action="<?=base_url()?>payment" method="post">
                                        <table id="msgbox" style="width:100%;margin-top: -19px;">
                                            <tbody>
                                                <tr>
                                                    <td><h3 style="color:#ababab;text-align:center;font-size: 16px;">You have not added any food items!</h3></td>
                                                <tr>
                                        </table>
                                        <table class="table" id="orderTable" style="display:none;width:100%;margin-top: -19px;">
                                            <tbody>
                                                <tr>
                                                    <th align="center">Item</th>
                                                    <th align="center">Quantity</th>
                                                    <th align="center">Unit Price</th>
                                                    <th align="center">Price</th>
                                                    <th align="center"></th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table style="width:100%;margin-top: -19px;">
                                            <tbody>
                                                <tr >
                                                    <td>Due Amount</td>
                                                    <td align="right"><p id="dueAmount">Rs. 0.00</p></td>
                                                </tr>

                                                <tr>
                                                    <td><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>&nbsp;Date</td>
                                                    <td><input class="form-control" type="date" name="datetime" style="width:100%;" min="2016-12-01" required></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>&nbsp;Contact Number</td>
                                                    <td><input class="form-control" type="tel" name="phone" style="width:100%;" required></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Address</td>
                                                    <td><textarea class="form-control" name="address" style="width:100%;" required></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><center><button type="submit" class='button -green center'>Order Now!</button></center></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>  
                            </div>
                        </div>
                        <script type="text/javascript">
                        	var today = new Date().toISOString().split('T')[0];
							document.getElementsByName("datetime")[0].setAttribute('min', today);
						</script>
                        <script src="<?=asset_url() ?>js/logic/placeorder.js"></script>
                    </div>
                </div>
            </div>
        </section>
