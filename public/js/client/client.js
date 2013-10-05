$(document).ready(function(){
	 
	 var base_url = $("#hid-base-url").val();
	 $(".client-link").click(function(){
	 	
	 	var client_no = $(this).attr("client_no");
	 	
	 	$.post(base_url+"client/pcs/getAward", {company_no:client_no}, function(data){
	 		
	 		var json_data = $.parseJSON(data);
	 		
	 		var str = "";
	 		
	 		str = "<table class='table table-bordered table-condesed table-stripped'>;" 
	 		str = str + "<thead>";
	 		str = str + "<tr>";
	 		str = str + "<th>Trans. No.</th>"
	 		str = str + "<th>Trans. No.</th>"
	 		str = str + "<th>Action</th>"
	 		str = str + "</tr>";
	 		str = str + "</thead>";
	 		
	 		str = str + "<tbody>";
	 		$.each(json_data, function(i, item){
	 			str = str + "<tr>";
	 			str = str + "<td>"+item.trans_no+"</td>";
	 			str = str + "<td>"+item.transaction_name+"</td>";
	 			str = str + "<td><a href='"+base_url+"/client/pcs/getUpcomingRates/"+item.trans_no+"'>Upcoming Rates</a></td>";
	 			str = str + "</tr>";
	 		});
	 		
	 		str = str + "</tbody>";
	 		str = str + "</table>";
	 		$("#cur_rate").html(str);
	 	});
	 });
	 
	 $(".company-link").click(function(){
        var clicked_client_no = $(this).attr("client-no");
        if($("#"+clicked_client_no).is(':visible')) {
            $("#"+clicked_client_no).slideUp();
        } else {
            $("#"+clicked_client_no).slideDown();
        }
        return false;
	 });
});
