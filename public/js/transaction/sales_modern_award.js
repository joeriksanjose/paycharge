$(document).ready(function(){
	
	var base_url = $("#base-url").val();
	
	$("#cmb-modern").change(function(){
		$.post(base_url+"sales_transaction/get_modern_info", {modern_award_no:$(this).val()}, function(data){
			var json_data = $.parseJSON(data);
			$("#B_26").val(json_data.B_26);
			$("#B_27").val(json_data.B_27);
			$("#B_28").val(json_data.B_28);
			$("#B_29").val(json_data.B_29);
			$("#B_30").val(json_data.B_30);
			$("#B_31").val(json_data.B_31);
			$("#B_32").val(json_data.B_32);
			$("#B_33").val(json_data.B_33);
			$("#B_34").val(json_data.B_34);
			$("#B_35").val(json_data.B_35);
			$("#B_36").val(json_data.B_36);
			$("#B_37").val(json_data.B_37);
			$("#B_38").val(json_data.B_38);
			
			$("#allowance_caption1").val(json_data.allowance_caption1);
			$("#allowance_caption2").val(json_data.allowance_caption2);
			$("#allowance_caption3").val(json_data.allowance_caption3);
			$("#allowance_caption4").val(json_data.allowance_caption4);
			$("#allowance_caption5").val(json_data.allowance_caption5);
			
			$("#allowance_rate1").val(json_data.allowance_rate1);
			$("#allowance_rate2").val(json_data.allowance_rate2);
			$("#allowance_rate3").val(json_data.allowance_rate3);
			$("#allowance_rate4").val(json_data.allowance_rate4);
			$("#allowance_rate5").val(json_data.allowance_rate5);
			
			$("#B_51").val(json_data.B_51);
			$("#B_52").val(json_data.B_52);
			$("#B_53").val(json_data.B_53);
			$("#B_54").val(json_data.B_54);
			$("#B_55").val(json_data.B_55);
			$("#B_56").val(json_data.B_56);
			
			$("#C_52").val(json_data.C_52);
			$("#C_53").val(json_data.C_53);
			$("#C_54").val(json_data.C_54);
			$("#C_55").val(json_data.C_55);
			$("#C_56").val(json_data.C_56);
			$("#C_57").val(json_data.C_57);
			
			
		});
	});
	
	$("#cmb-company").change(function(){
		$.post(base_url+"sales_transaction/get_company_info", {client_no:$(this).val()}, function(data){
			var json_data = $.parseJSON(data);
			$("#department").val(json_data.company_info.department);
			$("#add1").val(json_data.company_info.address_line1);
			$("#add2").val(json_data.company_info.address_line2);
			$("#c_first_name").val(json_data.company_info.contact_first_name);
			$("#c_full_name").val(json_data.company_info.contact_full_name);
			$("#c_title").val(json_data.company_info.contact_title);
			$("#state_no").val(json_data.company_info.state_no);
			
			var str = "";
			str = str + "<option></option>";
			$.each(json_data.work_cover, function(i, item){
				str = str + "<option value="+item.work_cover_no+">"+item.work_cover+"</option>";
			});
			
			$("#cmb-workcover").empty().append(str);
			
			$("#tax").val(json_data.tax.tax);
		});
	});
	
	$("#cmb-super").change(function(){
		$.post(base_url+"sales_transaction/get_effective_date", {super_no:$(this).val()}, function(data){
			var json_data = $.parseJSON(data);
			$("#effective_date").val(json_data.effective_date);
		});
	});
	
	$("#cmb-workcover").change(function(){
		$.post(base_url+"sales_transaction/get_workcover_info", {work_cover_no:$(this).val()}, function(data){
			var json_data = $.parseJSON(data);
			$("#wic_code").val(json_data.work_cover_code);
		});
	});
	$("#add-new-modern").click(function(){
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $(".div-award").hide("fast");
    });
    
    $("#show-tab-1").click(function(){
    	$(this).parent().addClass("active");
    	$("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#tab1").show("fast");
        $("#tab2, #tab3, #tab4").hide("fast");
        return false;
    });
    
    $("#show-tab-2").click(function(){
    	$(this).parent().addClass("active");
    	$("#show-tab-1, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#tab2").show("fast");
        $("#tab1, #tab3, #tab4").hide("fast");
        return false;
    });
    
    $("#show-tab-3").click(function(){
    	$(this).parent().addClass("active");
    	$("#show-tab-1, #show-tab-2, #show-tab-4").parent().removeClass("active");
        $("#tab3").show("fast");
        $("#tab1, #tab2, #tab4").hide("fast");
        return false;
    });
    
    $("#show-tab-4").click(function(){
    	$(this).parent().addClass("active");
    	$("#show-tab-1, #show-tab-3, #show-tab-2").parent().removeClass("active");
        $("#tab4").show("fast");
        $("#tab1, #tab3, #tab2").hide("fast");
        return false;
    });
    
});
