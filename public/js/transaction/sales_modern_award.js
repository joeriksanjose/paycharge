$(document).ready(function(){
	
	var base_url = $("#base-url").val();
	var client_no = $("#hid_client_no").val();
	
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
			
			var base_rate_1 = computeBaseRate(json_data.payrate_1, weekly);
			$("#txt-base-rate-1").val(base_rate_1);
			
			var base_rate_2 = computeBaseRate(json_data.payrate_2, weekly);
			$("#txt-base-rate-2").val(base_rate_2);
			
			var base_rate_3 = computeBaseRate(json_data.payrate_3, weekly);
			$("#txt-base-rate-3").val(base_rate_3);
			
			var base_rate_4 = computeBaseRate(json_data.payrate_4, weekly);
			$("#txt-base-rate-4").val(base_rate_4);
			
			var base_rate_5 = computeBaseRate(json_data.payrate_5, weekly);
			$("#txt-base-rate-5").val(base_rate_5);
			
			var base_rate_6 = computeBaseRate(json_data.payrate_6, weekly);
			$("#txt-base-rate-6").val(base_rate_6);
			
			var base_rate_7 = computeBaseRate(json_data.payrate_7, weekly);
			$("#txt-base-rate-7").val(base_rate_7);
			
			var base_rate_8 = computeBaseRate(json_data.payrate_8, weekly);
			$("#txt-base-rate-8").val(base_rate_8);
			
			var base_rate_9 = computeBaseRate(json_data.payrate_9, weekly);
			$("#txt-base-rate-9").val(base_rate_9);
			
			var base_rate_10 = computeBaseRate(json_data.payrate_10, weekly);
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
			
			if($.trim(json_data.allowance_rate1) != "" && $.trim(json_data.B_52) != ""){
				allow = ((parseFloat(json_data.allowance_rate1) / 100) * rate).toFixed(2);
				$("#B_52").val(allow);
			} else if ($.trim(json_data.B_52)) {
			    $("#B_52").val(json_data.B_52);
			} else {
				$("#B_52").removeAttr("disabled");
			}
			
			if($.trim(json_data.allowance_rate2) != "" && $.trim(json_data.B_53) != ""){
                allow = ((parseFloat(json_data.allowance_rate2) / 100) * rate).toFixed(2);
                $("#B_53").val(allow);
            } else if ($.trim(json_data.B_53)) {
                $("#B_53").val(json_data.B_53);
            } else {
                $("#B_53").removeAttr("disabled");
            }
            
            if($.trim(json_data.allowance_rate3) != "" && $.trim(json_data.B_54) != ""){
                allow = ((parseFloat(json_data.allowance_rate3) / 100) * rate).toFixed(2);
                $("#B_54").val(allow);
            } else if ($.trim(json_data.B_54)) {
                $("#B_54").val(json_data.B_54);
            } else {
                $("#B_54").removeAttr("disabled");
            }
            
            if($.trim(json_data.allowance_rate4) != "" && $.trim(json_data.B_55) != ""){
                allow = ((parseFloat(json_data.allowance_rate4) / 100) * rate).toFixed(2);
                $("#B_55").val(allow);
            } else if ($.trim(json_data.B_55)) {
                $("#B_55").val(json_data.B_55);
            } else {
                $("#B_55").removeAttr("disabled");
            }
            
            if($.trim(json_data.allowance_rate5) != "" && $.trim(json_data.B_56) != ""){
                allow = ((parseFloat(json_data.allowance_rate5) / 100) * rate).toFixed(2);
                $("#B_56").val(allow);
            } else if ($.trim(json_data.B_56)) {
                $("#B_56").val(json_data.B_56);
            } else {
                $("#B_56").removeAttr("disabled");
            }
            
            // AWARD INTERPRETATION
            $("#B_59").val(json_data.B_59);
            $("#B_60").val(json_data.B_60);
            $("#B_61").val(json_data.B_61);
            $("#B_62").val(json_data.B_62);
            $("#B_63").val(json_data.B_63);
            $("#B_64").val(json_data.B_64);
            $("#B_65").val(json_data.B_65);
            $("#B_66").val(json_data.B_66);
            $("#B_67").val(json_data.B_67);
            $("#B_68").val(json_data.B_68);
            $("#B_69").val(json_data.B_69);
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
				str = str + "<option work-cover-no="+item.work_cover_no+" value="+item.work_cover+">("+item.work_cover_code+") - "+item.work_cover+"</option>";
			});
			
			$("#cmb-workcover").empty().append(str);
			
			$("#tax").val(json_data.tax.tax);
		});
	});
	
	$("#cmb-super").change(function(){
		$.post(base_url+"sales_transaction/get_effective_date", {super_no:$(this).find('option:selected').attr('super-no')}, function(data){
			var json_data = $.parseJSON(data);
			$("#effective_date").val(json_data.effective_date);
		});
	});
	
	$("#cmb-workcover").change(function(){
		$.post(base_url+"sales_transaction/get_workcover_info", {work_cover_no:$('option:selected', this).attr('work-cover-no')}, function(data){
			var json_data = $.parseJSON(data);
			$("#wic_code").val(json_data.work_cover_code);
		});
	});
	
	$("#close-modern-form").click(function(){
       $("#modern_form").hide("fast");
       $(".div-award").show("fast");
       $("#awardRow").show("fast"); 
    });
	
	$("#add-new-modern").click(function(){
	    $("#frm").attr("action", base_url+"sales_transaction/save");
	    $(this).val("SAVE");
	    $(document).scrollTop(0);
	    var d = new Date();
	    var month = d.getMonth();
	    var day = d.getDate();
	    var year = d.getFullYear();
	    $("input").val("");
	    $("select").val("");
	    $("#txt-standard").val("STANDARD RATE FOR CALS :");
	    $("#txt-margin").val("MARGIN FOR M ALLOWANCE");
	    $("#txt-permanent").val("Permanent Guarantee Period in Days");
	    $("#btn_gen").val("Generate No");
	    $("#btn-save-update").val("Save");
	    $("#date_of_quotation").val(("0"+day).slice(-2)+"/"+("0"+month).slice(-2)+"/"+year);
	    $("#cmb-company").val(client_no).attr("selected", "selected");
	    $("#cmb-company").change();
	    $("#cmb-company").attr("readonly", "readonly");
	    $("#trans_no").removeAttr("readonly");
        $("#btn_gen").removeAttr("disabled");
	    $("#modern_form").show("fast");
	    $("#awardRow").hide("fast");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $(".div-award").hide("fast");
        $("#tab2, #tab3, #tab4").hide("fast");
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
    
    // delete modern award
    var award_no_del;
    $(".delete-award-btn").live("click", function(){
       award_no_del = $(this).attr("del-id");
       remove_row = $(this).parent().parent();
       $("#deleteModal").modal("show"); 
    });
    
    $("#delete-award-btn-modal").click(function(){
        $.post(base_url+"sales_transaction/deleteSalesModern", {award_no:award_no_del}, function(data){
           res = $.parseJSON(data);
           if (res.status) {
               remove_row.fadeOut("slow", function(){
                  $(this).remove(); 
               });
           } else {
               alert("Database Error");
           }
           
           $("#deleteModal").modal("hide");
        });
    });
    // end delete modern award
    
    // search    
    $("#search-award").keypress(function(evt){
        if(evt.which==13){
            $("#btn-search-award").click();
        }
    });
    
    $("#btn-search-award").live("click" ,function(){
        $("#div-success").css("display", "none");
        $.post(base_url+"sales_transaction/ajaxSearchSalesAward", 
            {key:$("#search-award").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             
             if (result.status) {
                 str = str + "<table class='table table-striped table-bordered' id='award-table'>";
                 str = str + "<thead>"
                 str = str + "<tr>";
                 str = str + "<th>Transaction No</th>";
                 str = str + "<th>Modern Award Name</th>";
                 str = str + "<th>Date of Quotation</th>";
                 str = str + "<th>Company</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result.award_info, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.trans_no+"</td>";
                     str = str + "<td>"+item.transaction_name+"</td>";
                     str = str + "<td>"+item.date_of_quotation+"</td>";
                     str = str + "<td>"+item.company_name+"</td>";
                     str = str + "<td><button type='button' class='btn edit-award-btn' edit-id='"+item.trans_no+"'>";
                     str = str + "<i class='icon-edit'></i></button> ";
                     str = str + "<button type='button' class='btn btn-danger delete-award-btn' del-id='"+item.trans_no+"'>";
                     str = str + "<i class='icon-trash icon-white'></i>";
                     str = str + "</button></td>";
                     str = str + "</tr>";
                 });
                 str = str + "<tbody>";
                 str = str + "</table>";
             } else {
                 str = str + "<table class='table table-striped table-bordered'>";
                 str = str + "<tr>";
                 str = str + "<th>Transaction No</th>";
                 str = str + "<th>Modern Award Name</th>";
                 str = str + "<th>Date of Quotation</th>";
                 str = str + "<th>Company</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='5'>";
                 str = str + "No results found.";
                 str = str + "</td>";
                 str = str + "</tr>";
                 str = str + "</table>";
             }
             
             $("#modern-body").html(str);
             $("#award-table").tablesorter();

        });
    });
    
    // end searh
    
    // edit
    $(".edit-award-btn").live("click", function(){
        $("#loadingModal").modal("show");
        $(document).scrollTop(0);
        $("#awardRow").hide("fast"); 
        var edit_id = $(this).attr("edit-id");
        $("#trans_no").attr("readonly", "true");
        $("#btn_gen").attr("disabled", "true");
        $("#modern_form").show("fast");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4, #show-tab-5").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $(".div-award").hide("fast");
        $("#tab2, #tab3, #tab4, #tab5").hide("fast");
        $("#frm").attr("action", base_url+"sales_transaction/update");
        $("#trans_no").val(edit_id);
        $("#btn-save-update").attr("value", "UPDATE");
        
        var company_no;
        var work_cover;
        var super1;
        
        $.post(base_url+"client_agreement/get_company_info", {client_no:client_no}, function(data){
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
                if(work_cover == item.work_cover) {
                    str = str + "<option selected='selected' value="+item.work_cover+">("+item.work_cover_code+") - "+item.work_cover+"</option>";
                } else {
                    str = str + "<option value="+item.work_cover+">("+item.work_cover_code+") - "+item.work_cover+"</option>";    
                }
                
            });
            
            $("#cmb-workcover").empty().append(str);
            
            $("#B_19").val(json_data.tax.tax);
        });
        
        $.post(base_url+"sales_transaction/getAwardInfo", {trans_no:edit_id}, function(data){
           res = $.parseJSON(data);
           if (res.status) {
               // modern award
               
               company_no = res.charge_rate.company_no;
               super1 = res.charge_rate.B_14;
               work_cover = res.charge_rate.B_15;

               $("#cmb-company").val(company_no).attr("selected", "selected");
               $("#cmb-super").val(super1).attr("selected", "selected");
               $("#cmb-super").change();
               $("#cmb-workcover").val(work_cover).attr("selected", "selected");
               $("#cmb-company").val(company_no).attr("selected", "selected");
               $("#cmb-modern").val(res.charge_rate.modern_award_no).attr("selected", "selected");
               $("#cmb-modern").change();
               $("#date_of_quotation").val(res.charge_rate.date_of_quotation);
               $("#transaction_name").val(res.charge_rate.transaction_name);
               $("#industry_rate").val(res.charge_rate.B_16);
               $("#wic_code").val(res.charge_rate.B_17);
               $("#lp_wc").val(res.charge_rate.B_18);
               $("#tax").val(res.charge_rate.B_19);
               $("#p_liability").val(res.charge_rate.B_20).attr("selected", "selected");
               $("#insurance").val(res.charge_rate.B_21).attr("selected", "selected");
               $("#admin_txt").val(res.charge_rate.B_22).attr("selected", "selected");
               $("#B_24").val(res.charge_rate.B_24);
               $("#long_service").val(res.charge_rate.long_service).attr("selected", "selected");
               if(res.charge_rate.swi_peror_cur == "0"){
                    $("#_dollar").prop("checked", true);    
               } else {
                    $("#_percent").prop("checked", true);   
               }
               
               
               // VARIABLES
               $("#B_26").val(res.charge_rate.B_26);
               $("#B_27").val(res.charge_rate.B_27);
               $("#B_28").val(res.charge_rate.B_28);
               $("#B_29").val(res.charge_rate.B_29);
               $("#B_30").val(res.charge_rate.B_30);
               $("#B_31").val(res.charge_rate.B_31);
               $("#B_32").val(res.charge_rate.B_32);
               $("#B_33").val(res.charge_rate.B_33);
               $("#B_34").val(res.charge_rate.B_34);
               $("#B_35").val(res.charge_rate.B_35);
               $("#B_36").val(res.charge_rate.B_36);
               $("#B_37").val(res.charge_rate.B_37);
               $("#B_38").val(res.charge_rate.B_38);
               
               
               // ALLOWANCES
               $("#B_51").val(res.charge_rate.B_51);
               $("#B_52").val(res.charge_rate.B_52);
               $("#B_53").val(res.charge_rate.B_53);
               $("#B_54").val(res.charge_rate.B_54);
               $("#B_55").val(res.charge_rate.B_55);
               $("#B_56").val(res.charge_rate.B_56);
               
               //AWARD INTERPRETATION
               $("#B_59").val(res.charge_rate.B_59);
               $("#B_60").val(res.charge_rate.B_60);
               $("#B_61").val(res.charge_rate.B_61);
               $("#B_62").val(res.charge_rate.B_62);
               $("#B_63").val(res.charge_rate.B_63);
               $("#B_64").val(res.charge_rate.B_64);
               $("#B_65").val(res.charge_rate.B_65);
               $("#B_66").val(res.charge_rate.B_66);
               $("#B_67").val(res.charge_rate.B_67);
               $("#B_68").val(res.charge_rate.B_68);
               $("#B_69").val(res.charge_rate.B_69);
               
               // ALLOWANCES RULES
               $("#C_52").val(res.charge_rate.C_52);
               $("#C_53").val(res.charge_rate.C_53);
               $("#C_54").val(res.charge_rate.C_54);
               $("#C_55").val(res.charge_rate.C_55);
               $("#C_56").val(res.charge_rate.C_56);
               $("#C_57").val(res.charge_rate.C_57);
               
               
               //PAYROLL INFORMATION
               $("#D_4").val(res.charge_rate.D_4);
               $("#D_5").val(res.charge_rate.D_5);
               $("#D_15").val(res.charge_rate.D_15);
               $("#D_16").val(res.charge_rate.D_16);
               $("#D_17").val(res.charge_rate.D_17);
               $("#D_18").val(res.charge_rate.D_18);
               $("#D_19").val(res.charge_rate.D_19);
               $("#D_20").val(res.charge_rate.D_20);
               $("#D_21").val(res.charge_rate.D_21);
               $("#D_22").val(res.charge_rate.D_22);
               
               
               //MIGRATION
               $("#C_25").val(res.charge_rate.C_25);
               $("#C_26").val(res.charge_rate.C_26);
               $("#C_27").val(res.charge_rate.C_27);
               $("#C_28").val(res.charge_rate.C_28);
               
               $("#D_25").val(res.charge_rate.D_25);
               $("#D_26").val(res.charge_rate.D_26);
               $("#D_27").val(res.charge_rate.D_27);
               $("#D_28").val(res.charge_rate.D_28);
               
               
               //PERM BAND
               $("#C_30").val(res.charge_rate.C_30);
               $("#C_31").val(res.charge_rate.C_31);
               $("#C_32").val(res.charge_rate.C_32);
               $("#C_33").val(res.charge_rate.C_33);
               $("#C_34").val(res.charge_rate.C_34);
               $("#C_35").val(res.charge_rate.C_35);
               $("#C_36").val(res.charge_rate.C_36);
               $("#C_37").val(res.charge_rate.C_37);
               
               
               $("#D_30").val(res.charge_rate.D_30);
               $("#D_31").val(res.charge_rate.D_31);
               $("#D_32").val(res.charge_rate.D_32);
               $("#D_33").val(res.charge_rate.D_33);
               $("#D_34").val(res.charge_rate.D_34);
               $("#D_35").val(res.charge_rate.D_35);
               $("#D_36").val(res.charge_rate.D_36);
               $("#D_37").val(res.charge_rate.D_37);
               $("#D_38").val(res.charge_rate.D_38);
               
               $.each(res.payrate, function(i, item){
                    if(item.grade == "Grade 1"){
                        $("#payrate_1").val(item.payrate);
                        $("#txt-base-rate-1").val(item.base_rate);
                        $("#txt-casual-rate-1").val(item.casual_rate);
                        $("#position_no1").val(item.position_no).attr("selected", "selected");
                    }
                    if(item.grade == "Grade 2"){
                        $("#payrate_2").val(item.payrate);
                        $("#txt-base-rate-2").val(item.base_rate);
                        $("#txt-casual-rate-2").val(item.casual_rate);
                        $("#position_no2").val(item.position_no).attr("selected", "selected");
                    }   
                    if(item.grade == "Grade 3"){
                        $("#payrate_3").val(item.payrate);
                        $("#txt-base-rate-3").val(item.base_rate);
                        $("#txt-casual-rate-3").val(item.casual_rate);
                        $("#position_no3").val(item.position_no).attr("selected", "selected");
                    }       
                    if(item.grade == "Grade 4"){
                        $("#payrate_4").val(item.payrate);
                        $("#txt-base-rate-4").val(item.base_rate);
                        $("#txt-casual-rate-4").val(item.casual_rate);
                        $("#position_no4").val(item.position_no).attr("selected", "selected");
                    }       
                    if(item.grade == "Grade 5"){
                        $("#payrate_5").val(item.payrate);
                        $("#txt-base-rate-5").val(item.base_rate);
                        $("#txt-casual-rate-5").val(item.casual_rate);
                        $("#position_no5").val(item.position_no).attr("selected", "selected");
                    }
                    if(item.grade == "Grade 6"){
                        $("#payrate_6").val(item.payrate);
                        $("#txt-base-rate-6").val(item.base_rate);
                        $("#txt-casual-rate-6").val(item.casual_rate);
                        $("#position_no6").val(item.position_no).attr("selected", "selected");
                    }       
                    if(item.grade == "Grade 7"){
                        $("#payrate_7").val(item.payrate);
                        $("#txt-base-rate-7").val(item.base_rate);
                        $("#txt-casual-rate-7").val(item.casual_rate);
                        $("#position_no7").val(item.position_no).attr("selected", "selected");
                    }       
                    if(item.grade == "Grade 8"){
                        $("#payrate_8").val(item.payrate);
                        $("#txt-base-rate-8").val(item.base_rate);
                        $("#txt-casual-rate-8").val(item.casual_rate);
                        $("#position_no8").val(item.position_no).attr("selected", "selected");
                    }       
                    if(item.grade == "Grade 9"){
                        $("#payrate_9").val(item.payrate);
                        $("#txt-base-rate-9").val(item.base_rate);
                        $("#txt-casual-rate-9").val(item.casual_rate);
                        $("#position_no9").val(item.position_no).attr("selected", "selected");
                    }
                    if(item.grade == "Grade 10"){
                        $("#payrate_10").val(item.payrate);
                        $("#txt-base-rate-10").val(item.base_rate);
                        $("#txt-casual-rate-10").val(item.casual_rate);
                        $("#position_no10").val(item.position_no).attr("selected", "selected");
                    }
               });
               
               // AWARD INTERPRETATION
               $("#B_59").val(res.charge_rate.B_59);
               $("#B_60").val(res.charge_rate.B_60);
               $("#B_61").val(res.charge_rate.B_61);
               $("#B_62").val(res.charge_rate.B_62);
               $("#B_63").val(res.charge_rate.B_63);
               $("#B_64").val(res.charge_rate.B_64);
               $("#B_65").val(res.charge_rate.B_65);
               $("#B_66").val(res.charge_rate.B_66);
               $("#B_67").val(res.charge_rate.B_67);
               $("#B_68").val(res.charge_rate.B_68);
               $("#B_69").val(res.charge_rate.B_69);               
               
               $("#allowance_caption1").val(res.charge_rate.allowance_caption1);
               $("#allowance_caption2").val(res.charge_rate.allowance_caption2);
               $("#allowance_caption3").val(res.charge_rate.allowance_caption3);
               $("#allowance_caption4").val(res.charge_rate.allowance_caption4);
               $("#allowance_caption5").val(res.charge_rate.allowance_caption5);
               $("#allowance_rate1").val(res.charge_rate.allowance_rate1);
               $("#allowance_rate2").val(res.charge_rate.allowance_rate2);
               $("#allowance_rate3").val(res.charge_rate.allowance_rate3);
               $("#allowance_rate4").val(res.charge_rate.allowance_rate4);
               $("#allowance_rate5").val(res.charge_rate.allowance_rate5);
               $("#m_allow_margin").val(res.charge_rate.m_allow_margin);
               // end modern award
           } else {
               alert("Database Error.")
           }
        
            $.post(base_url+"client_agreement/get_effective_date", {super_no:super1}, function(data){
                var json_data = $.parseJSON(data);
                $("#effective_date").val(json_data.effective_date);
            });
        
            $.post(base_url+"client_agreement/get_workcover_info", {work_cover_no:work_cover}, function(data){
                var json_data = $.parseJSON(data);
                $("#B_17").val(json_data.work_cover_code);
            });
            
            $("#loadingModal").modal("hide");
        }); 
    });
    // end edit
    
});

function computeBaseRate(baseRate, weekly)
{
    return (baseRate/weekly).toFixed(2);
}
