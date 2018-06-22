
/*
	--------------------- Manage Orders ----------------------------
*/

$(document).ready(function() {
	hideEdit();
});
function showEdit(){
	$("#editOrderTable").show();
}
function hideEdit(){
	$("#editOrderTable").hide();
}
var result;
var items;
function getOrder(or_id){
	hideEdit();
	fillInputs();
	$("#itemTable").empty();
	result = "";
	$.post("ajaxcontroller/getorder", {task: "getorder",or_id:or_id}, function(resultText){
        //console.log(resultText);
        if(resultText!="error"){
        	result = JSON.parse(resultText);

        	/*
			{"or_id":"23","or_user":"1","or_date":"2016-11-12",
			"or_duedate":"2016-12-08","or_contact":"23432432",
			"or_address":"dfdsfds","or_ispaid":"0","or_iscomplete":"0"}
        	*/
        	fillInputs(result.or_id,result.or_date,result.or_duedate,result.or_contact,result.or_address,result.or_ispaid,result.or_iscomplete);
        	showEdit();
        	getItems(or_id);
        }
    });
}
function getItems(or_id){
	$("#itemTable").empty();
	$.post("ajaxcontroller/getorderitems", {task: "getorderitems",or_id:or_id}, function(resultText){
        console.log(resultText);
        $("#itemTable").append('<tr><th colspan="3" style="padding: 0px;"><center><h3>Ordered Items</h3></center></th></tr>');
        //[{"oi_orderid":"27","oi_itemid":"1","oi_quantity":"1","it_name":"Coca Cola","it_price":"100.00"}]
        if(resultText!="error"){
        	items = JSON.parse(resultText);
        	var i=0
        	var total=0;
        	for(i=0;i<items.length;i++){
        		var newRow = "";
				newRow += "<tr>";
				newRow += "<td align='center'>"+items[i].it_name+"</td>";
				newRow += "<td align='center'>"+items[i].oi_quantity+"</td>";
				newRow += "<td align='center'>"+(items[i].it_price*items[i].oi_quantity)+"</td>";
				newRow += "</tr>";
				total += items[i].it_price*items[i].oi_quantity;
				
				$("#itemTable").append(newRow);
        	}
        	$("#itemTable").append('<tr><th colspan="3" style="padding: 0px;"><center><h4>Total:Rs. '+parseFloat(Math.round(total * 100) / 100).toFixed(2)+'</h4></center></th></tr>');
        	
        }
    });
	
}
function fillInputs(or_id=0,date="",duedate="",contact="",address="",ispaid=0,iscomplete=0){
	$("#or_id").val(or_id);
	$("#date").val(date);
	$("#duedate").val(duedate);
	$("#contact").val(contact);
	$("#address").val(address);
	$("#ispaid").val(ispaid);
	$("#iscomplete").val(iscomplete);
}
function deleteOrder(or_id){
	$.post("ajaxcontroller/deleteorder", {task: "deleteorder",or_id:or_id}, function(resultText){
        console.log(resultText);
        if(resultText!="error"){
        	alert("Deleted!")
        	window.location.reload();
        }else{
        	alert("Error Occured!");
        }
    });
}