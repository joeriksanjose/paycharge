$(document).ready(function(){
	
	var base_url = $("#base-url").val();
	
	$("#btn_gen").click(function(){
        $.post(base_url+"sales_transaction/getTransNo", function(data){
            var json_data = $.parseJSON(data);
            
            $("#trans_no").val(json_data);
        });
    });
    
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
			
			/*
			 * allowance
			 */
			$("#B_51").val(json_data.B_51);
			// $("#B_52").val(json_data.B_52);
			// $("#B_53").val(json_data.B_53);
			// $("#B_54").val(json_data.B_54);
			// $("#B_55").val(json_data.B_55);
			// $("#B_56").val(json_data.B_56);
			
			/*
			 * allowances rules
			 */
			$("#C_52").val(json_data.C_52);
			$("#C_53").val(json_data.C_53);
			$("#C_54").val(json_data.C_54);
			$("#C_55").val(json_data.C_55);
			$("#C_56").val(json_data.C_56);
			$("#C_57").val(json_data.C_57);
			
			/*
			 * grade
			 */
			$("#payrate_1").val(json_data.payrate_1);
			$("#payrate_2").val(json_data.payrate_2);
			$("#payrate_3").val(json_data.payrate_3);
			$("#payrate_4").val(json_data.payrate_4);
			$("#payrate_5").val(json_data.payrate_5);
			$("#payrate_6").val(json_data.payrate_6);
			$("#payrate_7").val(json_data.payrate_7);
			$("#payrate_8").val(json_data.payrate_8);
			$("#payrate_9").val(json_data.payrate_9);
			$("#payrate_10").val(json_data.payrate_10);
			
			
			var weekly = parseInt(json_data.B_26);
			var base_rate;
			
			var base_rate_1 = (weekly / json_data.payrate_1).toFixed(2);
			$("#txt-base-rate-1").val(base_rate_1);
			
			var base_rate_2 = (weekly / json_data.payrate_2).toFixed(2);
			$("#txt-base-rate-2").val(base_rate_2);
			
			var base_rate_3 = (weekly / json_data.payrate_3).toFixed(2);
			$("#txt-base-rate-3").val(base_rate_3);
			
			var base_rate_4 = (weekly / json_data.payrate_4).toFixed(2);
			$("#txt-base-rate-4").val(base_rate_4);
			
			var base_rate_5 = (weekly / json_data.payrate_5).toFixed(2);
			$("#txt-base-rate-5").val(base_rate_5);
			
			var base_rate_6 = (weekly / json_data.payrate_6).toFixed(2);
			$("#txt-base-rate-6").val(base_rate_6);
			
			var base_rate_7 = (weekly / json_data.payrate_7).toFixed(2);
			$("#txt-base-rate-7").val(base_rate_7);
			
			var base_rate_8 = (weekly / json_data.payrate_8).toFixed(2);
			$("#txt-base-rate-8").val(base_rate_8);
			
			var base_rate_9 = (weekly / json_data.payrate_9).toFixed(2);
			$("#txt-base-rate-9").val(base_rate_9);
			
			var base_rate_10 = (weekly / json_data.payrate_10).toFixed(2);
			$("#txt-base-rate-10").val(base_rate_10);	
			
			
			var normal = parseInt(json_data.B_27);
			var casual_rate;
			
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_1)) + parseFloat(base_rate_1)).toFixed(2);
			$("#txt-casual-rate-1").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_2)) + parseFloat(base_rate_2)).toFixed(2);
			$("#txt-casual-rate-2").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_3)) + parseFloat(base_rate_3)).toFixed(2);
			$("#txt-casual-rate-3").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_4)) + parseFloat(base_rate_4)).toFixed(2);
			$("#txt-casual-rate-4").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_5)) + parseFloat(base_rate_5)).toFixed(2);
			$("#txt-casual-rate-5").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_6)) + parseFloat(base_rate_6)).toFixed(2);
			$("#txt-casual-rate-6").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_7)) + parseFloat(base_rate_7)).toFixed(2);
			$("#txt-casual-rate-7").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_8)) + parseFloat(base_rate_8)).toFixed(2);
			$("#txt-casual-rate-8").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_9)) + parseFloat(base_rate_9)).toFixed(2);
			$("#txt-casual-rate-9").val(casual_rate);
			
			casual_rate = (((normal / 100) * parseFloat(base_rate_10)) + parseFloat(base_rate_10)).toFixed(2);
			$("#txt-casual-rate-10").val(casual_rate);	
			
			
			var rate = parseInt(json_data.B_51);
			var allow;
			
			if($.trim(json_data.allowance_rate1) != null){
				allow = ((parseFloat(json_data.allowance_rate1) / 100) * rate).toFixed(2);
				$("#B_52").val(allow);
			} else {
				$("#B_52").removeAttr("disabled");
			}
			
			if($.trim(json_data.allowance_rate2) != null){
				allow = ((parseFloat(json_data.allowance_rate2) / 100) * rate).toFixed(2);
				$("#B_53").val(allow);
			} else {
				$("#B_53").removeAttr("disabled");
			}
			
			if($.trim(json_data.allowance_rate3) != null){
				allow = ((parseFloat(json_data.allowance_rate3) / 100) * rate).toFixed(2);
				$("#B_54").val(allow);
			} else {
				$("#B_54").removeAttr("disabled");
			}
			
			if($.trim(json_data.allowance_rate4) != null){
				allow = ((parseFloat(json_data.allowance_rate4) / 100) * rate).toFixed(2);
				$("#B_55").val(allow);
			} else {
				$("#B_55").removeAttr("disabled");
			}
			
			if($.trim(json_data.allowance_rate5) != ""){
				allow = ((parseFloat(json_data.allowance_rate5) / 100) * rate).toFixed(2);
				$("#B_56").val(allow);
			} else {
				$("#B_56").removeAttr("disabled");
			}
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
	
	$("#close-modern-form").click(function(){
       $("#modern_form").hide("fast");
       $(".div-award").show("fast"); 
    });
	
	$("#add-new-modern").click(function(){
	    $(document).scrollTop(0);
	    $("#modern_form").show("fast");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $(".div-award").hide("fast");
    });
    
    $("#show-tab-1").click(function(){
    	$(this).parent().addClass("active");
    	$(document).scrollTop(0);
    	$("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#tab1").show("fast");
        $("#tab2, #tab3, #tab4").hide("fast");
        return false;
    });
    
    $("#show-tab-2").click(function(){
        $(document).scrollTop(0);
    	$(this).parent().addClass("active");
    	$("#show-tab-1, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#tab2").show("fast");
        $("#tab1, #tab3, #tab4").hide("fast");
        return false;
    });
    
    $("#show-tab-3").click(function(){
        $(document).scrollTop(0);
    	$(this).parent().addClass("active");
    	$("#show-tab-1, #show-tab-2, #show-tab-4").parent().removeClass("active");
        $("#tab3").show("fast");
        $("#tab1, #tab2, #tab4").hide("fast");
        return false;
    });
    
    $("#show-tab-4").click(function(){
        $(document).scrollTop(0);
    	$(this).parent().addClass("active");
    	$("#show-tab-1, #show-tab-3, #show-tab-2").parent().removeClass("active");
        $("#tab4").show("fast");
        $("#tab1, #tab3, #tab2").hide("fast");
        return false;
    });
    
});
