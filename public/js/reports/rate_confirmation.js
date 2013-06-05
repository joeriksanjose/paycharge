$(document).ready(function(){
	
	var base_url = $("#hid-base-url").val();
	$("#btn-search").click(function(){
		
		var search = $("#search").val();
		
		$.post(base_url+"reports/rate_confirmation/search_award",{search:search}, function(data){
			
			var json_data = $.parseJSON(data);
			
			var str;
			str = '<table class="table table-bordered table-striped" id="award-table" style="margin-top: 15px;">';
		    str = str + '<thead>';
			str = str + '<tr>';
			str = str + '<th>Modern Award No</th>';
			str = str + '<th>Modern Award Name</th>';
			str = str + '<th>Date Created</th>';
			str = str + '<th>Action</th>';
			str = str + '</tr>';
			str = str + '</thead>';
			str = str + '<tbody>';
			if(json_data.length>0){
				$.each(json_data, function(i, item){
					str = str + '<tr>';
					str = str + '<td>'+item.modern_award_no+'</td>';
					str = str + '<td>'+item.transaction_name+'</td>';
					str = str + '<td>'+item.created_at+'</td>';
					str = str + '<td>';
					str = str + '<a target="_blank" class="btn edit-award-btn" href="'+base_url+'reports/rate_confirmation/print_modern/'+item.trans_no+'/'+item.modern_award_no+'">';
					str = str + '<i class="icon-print"></i></a>';
					str = str + '</td>';
					str = str + '</tr>';
				
				});
			} else {
				str = str + '<tr>';
				str = str + '<td colspan="4">Empty Record</td>';
				str = str + '</tr>';
			}
			str = str + '</tbody>';
			str = str + '</table>';
		
			$("#div").html(str);
		});
	});
	
	$("#btn-search-client").click(function(){
		
		var search = $("#search").val();
		
		$.post(base_url+"reports/rate_confirmation/search_client",{search:search}, function(data){
			
			var json_data = $.parseJSON(data);
			
			var str;
			str = '<table class="table table-bordered table-striped" id="award-table" style="margin-top: 15px;">';
		    str = str + '<thead>';
			str = str + '<tr>';
			str = str + '<th>Trans No</th>';
			str = str + '<th>Modern Award Name</th>';
			str = str + '<th>Date Created</th>';
			str = str + '<th>Action</th>';
			str = str + '</tr>';
			str = str + '</thead>';
			str = str + '<tbody>';
			if(json_data.length>0){
				$.each(json_data, function(i, item){
					str = str + '<tr>';
					str = str + '<td>'+item.trans_no+'</td>';
					str = str + '<td>'+item.transaction_name+'</td>';
					str = str + '<td>'+item.created_at+'</td>';
					str = str + '<td>';
					str = str + '<a target="_blank" class="btn edit-award-btn" href="'+base_url+'reports/rate_confirmation/print_client/'+item.trans_no+'">';
					str = str + '<i class="icon-print"></i></a>';
					str = str + '</td>';
					str = str + '</tr>';
				
				});
			} else {
				str = str + '<tr>';
				str = str + '<td colspan="4">Empty Record</td>';
				str = str + '</tr>';
			}
			str = str + '</tbody>';
			str = str + '</table>';
		
			$("#div").html(str);
		});
	});
	
});
