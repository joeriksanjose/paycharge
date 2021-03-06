$(document).ready(function(){
	var client_no = $("#hid_client_no").val();	
	
	//delete
	var delete_id;
	var remove_row;
	
	var process_id;
    $(".process-award-btn").live("click", function(){
        
        process_id = $(this).attr("process-id");
        
        $("#processModal").modal("show");
    });
    
    $("#process-award-btn-modal").click(function(){
        $("#processModal").modal("hide");
        $("#loadingModal").modal("show");
        $.post(base_url+"client_agreement/processSalesModern", {trans_no:process_id, company_no:client_no}, function(data){
           res = $.parseJSON(data);
           if (!res.status) {
              alert("Database Error");
           } else {
               
                str = '<thead>'
                str = str + '<tr>'
                str = str + '<th>Trans No.</th>'
                str = str + '<th>Agreement Name</th>'
                str = str + '<th>Client</th>'
                str = str + '<th>Date of Quotation</th>'
                str = str + '<th>Process Status</th>'
                str = str + '<th>Action</th>'
                str = str + '</tr>'
                str = str + '</thead>'
                if (res.awards.length > 0) {
                    $.each(res.awards, function(i, item){
                        str = str + '<tr>';
                        str = str + '<td>'+item.trans_no+'</td>'
                        str = str + '<td>'+item.transaction_name+'</td>'
                        str = str + '<td>'+item.company_name+'</td>'
                        str = str + '<td>'+item.date_of_quotation+'</td>'
                        str = str + '<td>'+item.swi_process+'</td>'
                        str = str + '<td>'
                        str = str + '<div class="btn-group">'
                        str = str + '<a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">'
                        str = str + 'Action <span class="caret"></span></a>'
                        str = str + '<ul class="dropdown-menu pull-right">'
                        if(item.swi_process == 0){
                            str = str + '<li><a href="#" class="process-award-btn" process-id="'+item.trans_no+'">'
                            str = str + '<i class="icon-ok"></i> Process</a></li>'
                        }
                        str = str + '<li><a href="#" class="edit-award-btn" edit-id="'+item.trans_no+'">'
                        str = str + '<i class="icon-edit"></i> Edit</a></li>'
                        str = str + '<li><a target="_blank" href="'+base_url+'reports/rate_confirmation/print_client/'+item.trans_no+'">'
                        str = str + '<i class="icon-print"></i> Rate Confirmation</a></li>'
                        str = str + '<li>'
                        str = str + '<a target="_blank" href="'+base_url+'reports/allowance/print_client/'+item.trans_no+'">'
                        str = str + '<i class="icon-print"></i> Allowance</a></li>'
                        str = str + '<li>'
                        str = str + '<a target="_blank" href="'+base_url+'reports/paycharge_rate/print_client/'+item.trans_no+'">'
                        str = str + '<i class="icon-print"></i> Pay Charge Rate Schedule</a></li>'
                        str = str + '<li>'
                        str = str + '<a href="#" del-id="'+item.trans_no+'" class="delete-award-btn">'
                        str = str + '<i class="icon-trash"></i> Delete</a></li></ul></div>'   
                        str = str + '</td>'
                        str = str + '</tr>';
                    })
                } else {
                    str = str + '<tr><td colspan="5">No results found.</td></tr>'
                }
                
                $("#tblAgreement").html(str);            

           }
           
           $("#loadingModal").modal("hide");
           $("#div-process").css("display", "");
           $("#div-process").css("display", "");
           
           
        });
    });
	
	
	$(".delete-award-btn").live("click", function(){
		delete_id = $(this).attr("del-id");
		remove_row = $(this).parent().parent(); 

        $('#deleteModal').modal();
	});	
	
	$("#delete-btn-modal").click(function(){
		
		$.post(base_url+"client_agreement/delete", {trans_no:delete_id}, function(data){
			var result = $.parseJSON(data);
			if (result.charge_rate == true && result.payrate == true && result.print == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Client Agreement was successfully removed.");
                     
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 $('#deleteModal').modal("hide");
             }   
		});
	});	
	// edit
	$("#btn-save-update").click(function(){
        $("#frm").attr("action", base_url+"client_agreement/update");
        $("#frm").submit();
    });
    
    $("#btn-save-process-update").click(function(){ 
        $("#frm").attr("action", base_url+"client_agreement/updateAndProcess");
        $("#frm").submit();
    });
    
    $(".edit-award-btn").live("click", function(){
        $("#loadingModal").modal("show");
        $("#agreementRow").hide("fast")
        $(document).scrollTop(0);
        var edit_id = $(this).attr("edit-id");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4, #show-tab-5").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $("#frm").show("fast");
        $(".div-award").hide("fast");
        $("#tab2, #tab3, #tab4, #tab5").hide("fast");
        $("#frm").attr("action", base_url+"client_agreement/update");
        $("#trans_no").val(edit_id);
        $("#btn-save-update").show();
        $("#btn-save-update").val("Update Only");
        $("#btn-save-only").hide();
        $("#btn-save-process").hide();
        $("#btn_gen").attr("disabled", "disabled");
        
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
                if(work_cover == item.work_cover){
                    str = str + "<option work-cover-no="+item.work_cover_no+" selected='selected' value="+item.work_cover+">("+item.work_cover_code+") - "+item.work_cover+"</option>";
                } else {
                    str = str + "<option work-cover-no="+item.work_cover_no+" value="+item.work_cover+">("+item.work_cover_code+") - "+item.work_cover+"</option>";    
                }
                
            });
            
            $("#cmb-workcover").empty().append(str);
            
            $("#B_19").val(json_data.tax.tax);
        });
        
        $.post(base_url+"client_agreement/getAwardInfo", {trans_no:edit_id}, function(data){
           res = $.parseJSON(data);
           if (res.status) {
               // modern award
               
               company_no = res.charge_rate.company_no;
               super1 = res.charge_rate.B_14;
               work_cover = res.charge_rate.B_15;
               if (res.charge_rate.swi_process != 1) {
                   $("#btn-save-process-update").show();
                   $("#btn-save-process-update").val("Update and Process");
               } else {
                   $("#btn-save-process-update").hide();
               }
               
               $("#cmb-company").val(company_no).attr("selected", "selected");
               $("#cmb-super").val(super1).attr("selected", "selected");
               $("#cmb-super").change();
               $("#cmb-workcover").val(work_cover).attr("selected", "selected");
               $("#cmb-company").val(company_no).attr("selected", "selected");
                              
               $("#transaction_name").val(res.charge_rate.transaction_name);
               $("#B_16").val(res.charge_rate.B_15).attr("selected", "selected");
               $("#B_17").val(res.charge_rate.B_17);
               $("#B_16").val(res.charge_rate.B_16);
               $("#B_18").val(res.charge_rate.B_18);
               $("#B_20").val(res.charge_rate.B_20).attr("selected", "selected");
               $("#B_21").val(res.charge_rate.B_21).attr("selected", "selected");
               $("#B_22").val(res.charge_rate.B_22).attr("selected", "selected");
               $("#B_24").val(res.charge_rate.B_24).attr("selected", "selected");
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
               
               // print defaults
               
               
               $("#grade1").prop("checked", parseInt(res.prints.grade1));   
               $("#grade2").prop("checked", parseInt(res.prints.grade2));   
               $("#grade3").prop("checked", parseInt(res.prints.grade3));   
               $("#grade4").prop("checked", parseInt(res.prints.grade4));   
               $("#grade5").prop("checked", parseInt(res.prints.grade5));   
               $("#grade6").prop("checked", parseInt(res.prints.grade6));   
               $("#grade7").prop("checked", parseInt(res.prints.grade7));   
               $("#grade8").prop("checked", parseInt(res.prints.grade8));   
               $("#grade9").prop("checked", parseInt(res.prints.grade9));   
               $("#grade10").prop("checked", parseInt(res.prints.grade10));
               $("#normal").prop("checked", parseInt(res.prints.normal));
               $("#early").prop("checked", parseInt(res.prints.early));
               $("#afternoon").prop("checked", parseInt(res.prints.afternoon));
               $("#night").prop("checked", parseInt(res.prints.night));
               $("#50_shift").prop("checked", parseInt(res.prints.fifty_shift));
               $("#t_14").prop("checked", parseInt(res.prints.t_14));
               $("#t_12").prop("checked", parseInt(res.prints.t_12));
               $("#double").prop("checked", parseInt(res.prints.doubles));
               $("#dt_12").prop("checked", parseInt(res.prints.dt_12)); 
               $("#triple").prop("checked", parseInt(res.prints.triple));
               $("#p_normal_time").prop("checked", parseInt(res.prints.p_normal_time));
               $("#p_time_and_half").prop("checked", parseInt(res.prints.p_time_and_half));
               $("#p_double_time").prop("checked", parseInt(res.prints.p_double_time));
               $("#p_double_and_half").prop("checked", parseInt(res.prints.p_double_and_half));
               $("#p_triple").prop("checked", parseInt(res.prints.p_triple));
               $("#p_day").prop("checked", parseInt(res.prints.p_day));
               $("#p_early").prop("checked", parseInt(res.prints.p_early));
               $("#p_afternoon").prop("checked", parseInt(res.prints.p_afternoon));
               $("#p_night").prop("checked", parseInt(res.prints.p_night));
               $("#p_half").prop("checked", parseInt(res.prints.p_half));
               $("#p_t_14").prop("checked", parseInt(res.prints.p_t_14));
               $("#calculator").val(res.prints.p_t_14);
               $("#print_company_no").val(res.prints.print_company_no).attr("selected", "selected");
               $("#calculator").val(res.prints.calculator);
               // end print defaults
           } else {
               alert("Database Error.")
           }
		
			$.post(base_url+"client_agreement/get_effective_date", {super_no:super1}, function(data){
				var json_data = $.parseJSON(data);
				$("#effective_date").val(json_data.effective_date);
			});
		
        });
        
       
        $("#loadingModal").modal("hide");
        
    });
    
    // end edit
    
	function inputNumbers(event)
    {
        console.log(event.keyCode);
        if (
            event.keyCode == 190 || 
            event.keyCode == 8 || 
            event.keyCode == 9 || 
            event.keyCode == 27 || 
            event.keyCode == 13 ||
            event.keyCode == 110 || 
            (event.keyCode >= 48 && event.keyCode <= 57) ||
            (event.keyCode >= 96  && event.keyCode <= 105)
           ) {
            return;
        } else {
            event.preventDefault(); 
        }
    }
    
    $("#btn-gen-workcover").click(function(){
        $.post(base_url+"sales/home/get_last_id_workcover", function(data){
            var json_data = $.parseJSON(data);
            
            $("#work_cover_no").val(json_data);
            $("#error_div").css("display", "none");
        });
        return;
    });
    
    $(".add_workcover").click(function(){
        $("#success_div_wc").css("display", "none");
        $("#error_div_wc").css("display", "none");
        $("#workcoverModal").modal("show");
        return false;
    });
    
    $("#btn-add-workcover").click(function(){
        
        var workcoverno = $("#work_cover_no").val();
        var workcover = $("#work_cover").val();
        var workcovercode = $("#work_cover_code").val();
        var stateno = $("#state_no").val();
        
        var cmb = {};
        $.post(base_url+"sales/home/save_workcover", {work_cover_no : workcover,
            work_cover : workcover, work_cover_code : workcovercode, 
            state_no : stateno}, 
        
        function(data){
            
            var json_data = $.parseJSON(data);
            
            if(json_data.status == false){
                $("#success_div_wc").css("display", "none");
                $("#error_div_wc").css("display", "");
                $("#error_div_wc").html("<b>Error!</b> Please contact IT Administrator.");
            } else {
                $("#error_div_wc").css("display", "none");
                $("#success_div_wc").css("display", "");
                $("#success_div_wc").html("<b>Successful!</b> New Workcover has successfully added to the database.");
            }
           
                var str1 = "";
                var str = "<option></option>";
                $.each(json_data.data, function(i, item){
                    if($("#cmb-workcover").find(":selected").attr("work-cover-no") == item.work_cover_no){
                        str1 = str1 + "<option work-cover-no="+item.work_cover_no+" selected='selected' value="+item.work_cover_no+">("+item.work_cover_code+") - "+item.work_cover+"</option>";   
                    } else {
                        str1 = str1 + "<option work-cover-no="+item.work_cover_no+" value="+item.work_cover_no+">("+item.work_cover_code+") - "+item.work_cover+"</option>";
                    }                           
                    
                });
                
                $("#cmb-workcover").html(str +str1);
                $("#work_cover_no").val("");
                $("#work_cover").val("");
                $("#work_cover_code").val("");
                
                
        });
        
        

        
    });



    $(".txt, #payrate_1, #payrate_2, #payrate_3, #payrate_4, #payrate_5, #payrate_6, #payrate_7, #payrate_8, #payrate_9, #payrate_10").keydown(function(evt){
        inputNumbers(evt);
    });
    
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
                str = str + "<option work-cover-no="+item.work_cover_no+" value="+item.work_cover+">("+item.work_cover_code+") - "+item.work_cover+"</option>";
            });
			
			$("#cmb-workcover").empty().append(str);
			
			$("#B_19").val(json_data.tax.tax);
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
            $("#B_17").val(json_data.work_cover_code);
        });
    });
    
    $("#btn-save-only").click(function(){
        $("#frm").attr("action", base_url+"client_agreement/save");
        $("#frm").submit();
    });
    
    $("#btn-save-process").click(function(){
        if($(this).val() != "UPDATE"){
            $("#frm").attr("action", base_url+"client_agreement/saveAndProcess");
            $("#frm").submit();
        }
    });
    
    $("#add-new-modern").click(function(){
	    $("#frm").attr("action", base_url+"client_agreement/save");
	    $("#agreementRow").hide("fast");
	    $(document).scrollTop(0);
	    $(this).val("SAVE");
	    var d = new Date();
        var month = d.getMonth();
        var day = d.getDate();
        var year = d.getFullYear();
        $("input").val("");
        $("select  ").val("");
        $("#btn-save-update").hide();
        $("#btn-save-process-update").hide();
        $("#txt-standard").val("STANDARD RATE FOR CALS :");
        $("#m_allow_text").val("MARGIN FOR M ALLOWANCE");
        $("#txt-permanent").val("Permanent Guarantee Period in Days");
        $("#btn_gen").val("Generate No");
        $("#btn-save-process").val("Save and Process");
        $("#btn-save-only").val("Save Only");
        $("#date_of_quotation").val(("0"+day).slice(-2)+"/"+("0"+month).slice(-2)+"/"+year);
        $("#cmb-company").val(client_no).attr("selected", "selected");
        $("#cmb-company").change();
        $("#cmb-company").attr("readonly", "readonly");
        $("#trans_no").removeAttr("readonly");
        $("#btn_gen").removeAttr("disabled");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4, #show-tab-5").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $("#frm").show("fast");
        $(".div-award").hide("fast");
        $("#tab2, #tab3, #tab4, #tab5").hide("fast");
    });
    
    $("#close-modern-form").click(function(){
       $("#frm").hide("fast");
       $(".div-award").show("fast");
       $("#agreementRow").show("fast");
    });
    
    $("#show-tab-1").click(function(){
    	$(this).parent().addClass("active");
    	$(document).scrollTop(0);
    	$("#show-tab-2, #show-tab-3, #show-tab-4, #show-tab-5").parent().removeClass("active");
        $("#tab1").show("fast");
        $("#tab2, #tab3, #tab4, #tab5").hide("fast");
        return false;
    });
    
    $("#show-tab-2").click(function(){
    	$(this).parent().addClass("active");
    	$(document).scrollTop(0);
    	$("#show-tab-1, #show-tab-3, #show-tab-4, #show-tab-5").parent().removeClass("active");
        $("#tab2").show("fast");
        $("#tab1, #tab3, #tab4, #tab5").hide("fast");
        return false;
    });
    
    $("#show-tab-3").click(function(){
    	$(this).parent().addClass("active");
    	$(document).scrollTop(0);
    	$("#show-tab-1, #show-tab-2, #show-tab-4, #show-tab-5").parent().removeClass("active");
        $("#tab3").show("fast");
        $("#tab1, #tab2, #tab4, #tab5").hide("fast");
        return false;
    });
    
    $("#show-tab-4").click(function(){
    	$(this).parent().addClass("active");
    	$(document).scrollTop(0);
    	$("#show-tab-1, #show-tab-3, #show-tab-2, #show-tab-5").parent().removeClass("active");
        $("#tab4").show("fast");
        $("#tab1, #tab3, #tab2, #tab5").hide("fast");
        return false;
    });
    
    $("#show-tab-5").click(function(){
    	$(this).parent().addClass("active");
    	$(document).scrollTop(0);
    	$("#show-tab-1, #show-tab-3, #show-tab-2, #show-tab-4").parent().removeClass("active");
        $("#tab5").show("fast");
        $("#tab1, #tab3, #tab2, #tab4").hide("fast");
        return false;
    });
    
    $("#B_26, #payrate_1, #payrate_2, #payrate_3, #payrate_4, #payrate_5, #payrate_6, #payrate_7, #payrate_8, #payrate_9, #payrate_10").change(function(){
    	compute_baserate();
    });
    
    function compute_baserate()
    {
    	var weekly = parseFloat($("#B_26").val()).toFixed(2);
    	
    	var grade1 = parseFloat($("#payrate_1").val()).toFixed(2);
    	var grade2 = parseFloat($("#payrate_2").val()).toFixed(2);
    	var grade3 = parseFloat($("#payrate_3").val()).toFixed(2);
    	var grade4 = parseFloat($("#payrate_4").val()).toFixed(2);
    	var grade5 = parseFloat($("#payrate_5").val()).toFixed(2);
    	var grade6 = parseFloat($("#payrate_6").val()).toFixed(2);
    	var grade7 = parseFloat($("#payrate_7").val()).toFixed(2);
    	var grade8 = parseFloat($("#payrate_8").val()).toFixed(2);
    	var grade9 = parseFloat($("#payrate_9").val()).toFixed(2);
    	var grade10 = parseFloat($("#payrate_10").val()).toFixed(2);
    	
    	var normal = parseFloat($("#B_27").val()).toFixed(2);
    	
    	if($("#payrate_1").val() != ""){
	    	var base_rate_1 = grade1 / weekly;
	    	$("#txt-base-rate-1").val(base_rate_1.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_1)) + parseFloat(base_rate_1)).toFixed(2);
			$("#txt-casual-rate-1").val(casual_rate);
    	}
    	
    	if($("#payrate_2").val() != ""){
    		var base_rate_2 = grade2 / weekly;
    		$("#txt-base-rate-2").val(base_rate_2.toFixed(2));
    		
    		var casual_rate = (((normal / 100) * parseFloat(base_rate_2)) + parseFloat(base_rate_2)).toFixed(2);
			$("#txt-casual-rate-2").val(casual_rate);
    	}
    	
    	if($("#payrate_3").val() != ""){
    		var base_rate_3 = grade3 / weekly;
    		$("#txt-base-rate-3").val(base_rate_3.toFixed(2));
    		
    		var casual_rate = (((normal / 100) * parseFloat(base_rate_3)) + parseFloat(base_rate_3)).toFixed(2);
			$("#txt-casual-rate-3").val(casual_rate);
    	}
    	
    	if($("#payrate_4").val() != ""){
    		var base_rate_4 = grade4 / weekly;
    		$("#txt-base-rate-4").val(base_rate_4.toFixed(2));
    		
    		var casual_rate = (((normal / 100) * parseFloat(base_rate_4)) + parseFloat(base_rate_4)).toFixed(2);
			$("#txt-casual-rate-4").val(casual_rate);
    	}
    	
    	if($("#payrate_5").val() != ""){
    		var base_rate_5 = grade5 / weekly;
	    	$("#txt-base-rate-5").val(base_rate_5.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_5)) + parseFloat(base_rate_5)).toFixed(2);
			$("#txt-casual-rate-5").val(casual_rate);
    	}
    	
    	if($("#payrate_6").val() != ""){
	    	var base_rate_6 = grade6 / weekly;
	    	$("#txt-base-rate-6").val(base_rate_6.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_6)) + parseFloat(base_rate_6)).toFixed(2);
			$("#txt-casual-rate-6").val(casual_rate);
    	}
    	
    	if($("#payrate_7").val() != ""){
	    	var base_rate_7 = grade7 / weekly;
	    	$("#txt-base-rate-7").val(base_rate_7.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_7)) + parseFloat(base_rate_7)).toFixed(2);
			$("#txt-casual-rate-7").val(casual_rate);
    	}
    	
    	if($("#payrate_8").val() != ""){
	    	var base_rate_8 = grade8 / weekly;
	    	$("#txt-base-rate-8").val(base_rate_8.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_8)) + parseFloat(base_rate_8)).toFixed(2);
			$("#txt-casual-rate-8").val(casual_rate);
    	}
    	
    	if($("#payrate_9").val() != ""){
	    	var base_rate_9 = grade9 / weekly;
	    	$("#txt-base-rate-9").val(base_rate_9.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_9)) + parseFloat(base_rate_9)).toFixed(2);
			$("#txt-casual-rate-9").val(casual_rate);
    	}
    	
    	if($("#payrate_10").val() != ""){
	    	var base_rate_10 = grade10 / weekly;
	    	$("#txt-base-rate-10").val(base_rate_10.toFixed(2));
	    	
	    	var casual_rate = (((normal / 100) * parseFloat(base_rate_10)) + parseFloat(base_rate_10)).toFixed(2);
			$("#txt-casual-rate-10").val(casual_rate);
    	}	
    }
    
    $("#B_51, #allowance_rate1").change(function(){
    	compute_allow("#allowance_rate1", "#B_52");
    });
    
    $("#B_51, #allowance_rate2").change(function(){
        compute_allow("#allowance_rate2", "#B_53");
    });
    
    $("#B_51, #allowance_rate3").change(function(){
        compute_allow("#allowance_rate3", "#B_54");
    });
    
    $("#B_51, #allowance_rate4").change(function(){
        compute_allow("#allowance_rate4", "#B_55");
    });
    
    $("#B_51, #allowance_rate5").change(function(){
        compute_allow("#allowance_rate5", "#B_56");
    });
    
    function compute_allow(allow_rate, b){
    	
    	var rate = parseFloat($("#B_51").val()).toFixed(2);
    	var first_aid = parseFloat($(allow_rate).val()).toFixed(2);
    	
    	var allow = (first_aid / 100) * rate;
    	if($("#B_51").val() != "" && $(allow_rate).val() != ""){
    		$(b).val(allow.toFixed(2));
    	}
    }
    
});
