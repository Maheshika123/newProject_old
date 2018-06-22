
/*
	--------------------- Add To Order ----------------------------
*/
/*
	Change the Food item list according to the category selected
*/
$("#categorySelect").change(function() {
	if ($(this).data('options') == undefined) {
		/*Taking an array of all options-2 and kind of embedding it on the select1*/
		$(this).data('options', $('#itemSelect option').clone());
	}
	var id = $(this).val();
	var options;
	if(id=='0'){
		options = $(this).data('options');
	}else{
		options = $(this).data('options').filter('[category=' + id + ']');
	}
	 
	console.log(options);
	$('#itemSelect').html(options);
	$("#itemSelect").change();
});

/*
	Show unit price for a food item
*/
$("#itemSelect").change(function() {
	if ($(this).data('options') == undefined) {
		/*Taking an array of all options-2 and kind of embedding it on the select1*/
		$(this).data('options', $('#itemSelect option').clone());
	}
	var id = $(this).val();
	var option = $(this).data('options').filter('[value=' + id + ']');
	$('#unitPrice').html($(option).attr('price'));
	$("#itemQuantity").val(1);
});


/*
	Load initial values
*/
var itemCount = 1;
var totalAmount = 0;
$(document).ready(function() {
	$("#itemSelect").change();
	$( "#addOrderItem" ).click(addRow);

});
function addRow() {
		var itemID = $("#itemSelect").val();
		var itemName = $("#itemSelect option:selected").text();
		var quantity = $("#itemQuantity").val();
		var unitprice = $("#itemSelect option:selected").attr('price');
		var total = 0;
		try{
			total = unitprice*quantity;
		}catch(e){

		}
		var newRow = "";
		newRow += "<tr style='font-size: 16px;' id='order_"+itemCount+"' quantity='"+quantity+"' price='"+unitprice+"'>";
		newRow += "<td align='left'><input type='hidden' name ='it_"+itemCount+"' value='"+itemID+"' />"+itemName+"</td>";
		newRow += "<td align='center'><input class='hidden-input' type='hidden' name='quant_"+itemCount+"' readonly=readonly value='"+quantity+"'>"+quantity+"</td>";
		newRow += "<td align='center'>"+unitprice+"</td>";
		newRow += "<td align='center'>"+total+"</td>";
		newRow += "<td align='center'><button type='button' onclick='removeRow("+itemCount+")' class='button -salmon center'>Remove</button></td>";
		newRow += "</tr>";
		
		$("#orderTable tbody").append(newRow);
		totalAmount = updatedTotalPrice(quantity,unitprice,false);
		$('#dueAmount').html("Rs. "+parseFloat(Math.round(totalAmount * 100) / 100).toFixed(2));

		itemCount = itemCount+1;
		showHideOrderList();
}
function removeRow(countID){
	var row = $("#order_"+countID)
	totalAmount = updatedTotalPrice(row.attr('quantity'),row.attr('price'),true);
	$('#dueAmount').html("Rs. "+parseFloat(Math.round(totalAmount * 100) / 100).toFixed(2));
	row.remove();
	showHideOrderList();
}
function updatedTotalPrice(quantity,unitprice,isRemove){
	var value = quantity*unitprice;
	if(isRemove){
		return totalAmount-value;
	}
	return totalAmount+value;
}
function showHideOrderList(){
	if(totalAmount<=0){
		$("#orderTable").hide();
		$("#msgbox").show();
	}else{
		$("#orderTable").show();
		$("#msgbox").hide();
	}
}