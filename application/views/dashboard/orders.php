<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<link rel="stylesheet" type="text/css" href="<?=asset_url()?>dashboard/css/orders/table.css">
<link rel="stylesheet" type="text/css" href="<?=asset_url()?>dashboard/css/orders/button.css">
<link rel="stylesheet" type="text/css" href="<?=asset_url()?>dashboard/css/orders/manageorders.css">
<div class="row">
	<table style="width:90%;">
		<tbody>
				<tr>
					<th colspan="11"><center><h3>Manage Orders</h3></center></th>
				</tr>
				<tr>
					<th>ID</th>
					<th>UserID</th>
					<th>User Name</th>
					<th>Date</th>
					<th>Due Date</th>
					<th>Contact</th>
					<th>Address</th>
					<th>paid?</th>
					<th>completed?</th>
				</tr>
			<?php foreach ($orders as $order): ?>
						<tr>
							<td><p><?=htmlspecialchars($order->or_id) ?></p></td>
							<td><p><?=htmlspecialchars($order->or_user) ?></p></td>
							<td><p><?=htmlspecialchars($order->user_name) ?></p></td>
							<td><p><?=htmlspecialchars($order->or_date) ?></p></td>
							<td><p><?=htmlspecialchars($order->or_duedate) ?></p></td>
							<td><p><?=htmlspecialchars($order->or_contact) ?></p></td>
							<td><p><?=htmlspecialchars($order->or_address) ?></p></td>
							<td><p><?=htmlspecialchars($order->or_ispaid==0?"No":"Yes") ?><br/>(<?=$order->or_method?>)</p></td>
							<td><p><?=htmlspecialchars($order->or_iscomplete==0?"No":"Yes") ?></p></td>
							<td><button type="button" name="update" class="button -blue center" onclick="getOrder('<?=htmlspecialchars($order->or_id) ?>')">Show</button></td>
							<td><button type="button" name="delete" class="button -salmon center" onclick="deleteOrder('<?=htmlspecialchars($order->or_id) ?>')">Delete</button></td>
						</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<form id="editOrderTable" action="<?=base_url()?>dashboard/orders/modify" method="post">
		<table style="float:left;">
			<tbody>
				<tr>
					<th colspan="6" style="padding: 0px;"><center><h3>Edit Order (<span id="paytype"></span>)</h3><input id="or_id" type="hidden" name="or_id" value="0"></center></th>
				</tr>

				<tr>
					<td>Date</td>
					<td><input id="date" type="date" name="date"></td>
					<td>Due Date</td>
					<td><input id="duedate" type="date" name="duedate"></td>
					<td>Is Paid?</td>
					<td><select id="ispaid" name="ispaid"><option value="0">No</option><option value="1">Yes</option></select></td>
				</tr>

				<tr>
					<td>Contact</td>
					<td><input id="contact" type="tel" name="contact"></td>
					<td>Address</td>
					<td><textarea id="address" name="address"></textarea></td>
					<td>Is Completed?</td>
					<td><select id="iscomplete" name="iscomplete"><option value="0">No</option><option value="1">Yes</option></select></td>
				</tr>

				<tr>
					<th colspan="2"></th>
					<th colspan="1">
						<center>
							<button class="button -salmon center" type="button" onclick="hideEdit()" style="width:100%;">Cancel</button>
						</center>
					</th>
					<th colspan="1">
						<center>
							<button class="button -green center" type="submit" name="modify" style="width:100%;">Modify</button>
						</center>
					</th>
					
					<th colspan="2"></th>

				</tr>

			</tbody>
		</table>

		<table style="float:left;" id="itemTable">
			<tbody>
				
			</tbody>
		</table>
	</form>
	<script src="<?=asset_url()?>dashboard/js/jquery-3.1.1.min.js"></script>
	<script src="<?=asset_url()?>dashboard/js/orders/manageorders.js"></script>	
</div>
		
		
								
		


