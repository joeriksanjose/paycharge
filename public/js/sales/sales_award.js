$(document).ready(function(){
    base_url = $("#base_url").val();
    var client_no = $("#hid_client_no").val();
    
    var process_id;
    $(".process-award-btn").live("click", function(){
        
        process_id = $(this).attr("process-id");
        
        $("#processModal").modal("show");
    });
    
    $("#process-award-btn-modal").click(function(){
        
        $.post(base_url+"sales_transaction/processSalesModern", {trans_no:process_id, company_no:client_no}, function(data){
           res = $.parseJSON(data);
           if (!res.status) {
              alert("Database Error");
           } else {
               
                str = '<thead>'
                str = str + '<tr>'
                str = str + '<th>Trans No.</th>'
                str = str + '<th>Award Name</th>'
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
                        str = str + '<li><a target="_blank" href="'+base_url+'reports/rate_confirmation/print_modern/'+item.trans_no+'/'+item.modern_award_no+'">'
                        str = str + '<i class="icon-print"></i> View</a></li>'
                        str = str + '<li>'
                        str = str + '<a href="#" del-id="'+item.trans_no+'" class="delete-award-btn">'
                        str = str + '<i class="icon-trash"></i> Delete</a></li></ul></div>'   
                        str = str + '</td>'
                        str = str + '</tr>';
                    })
                } else {
                    str = str + '<tr><td colspan="5">No results found.</td></tr>'
                }
                
                $("#tblAwards").html(str);            

           }
           
           $("#processModal").modal("hide");
           $("#div-process").css("display", "");
           $("#div-process").css("display", "");
           
           
        });
    });
    
    
    $("#btn-save-only").click(function(){
        $("#frm").attr("action", base_url+"sales_transaction/save");
        $("#frm").submit();
    });
    
    $("#btn-save-process").click(function(){
        if($(this).val() != "UPDATE"){
            $("#frm").attr("action", base_url+"sales_transaction/saveAndProcess");
            $("#frm").submit();
        }
    });
    
    $("#btn-save-update").click(function(){
        $("#frm").attr("action", base_url+"sales_transaction/update");
        $("#frm").submit();
    });
    
    $("#btn-save-process-update").click(function(){
        $("#frm").attr("action", base_url+"sales_transaction/updateAndProcess");
        $("#frm").submit();
    });
    
    $(".add_position").click(function(){
        
        $("#positionModal").modal("show");
        return false;
    });
    
    $("#btn-add-position").click(function(){
        
        var position = $("#position").val();
        var description = $("#description").val();
        
        var cmb = {};
        $.post(base_url+"libraries/position/save_position", {position : position, description : description}, 
        
        function(data){
            
            var json_data = $.parseJSON(data);
            
            if(json_data.status == "error"){
                $("#success_div").css("display", "none");
                $("#error_div").css("display", "");
                $("#error_div").html(json_data.status_msg);
            } else {
                $("#error_div").css("display", "none");
                $("#success_div").css("display", "");
                $("#success_div").html(json_data.status_msg);
            }
            
            
            
            
                var str1 = "";
                var str2 = "";
                var str3 = "";
                var str4 = "";
                var str5 = "";
                var str6 = "";
                var str7 = "";
                var str8 = "";
                var str9 = "";
                var str10 = "";
                var str = "<option></option>";
                $.each(json_data.data, function(i, item){
                    if($("#position_no1").val() == item.id){
                        str1 = str1 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str1 = str1 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no2").val() == item.id){
                        str2 = str2 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str2 = str2 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no3").val() == item.id){
                        str3 = str3 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str3 = str3 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no4").val() == item.id){
                        str4 = str4 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str4 = str4 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no5").val() == item.id){
                        str5 = str5 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str5 = str5 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no6").val() == item.id){
                        str6 = str6 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str6 = str6 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no7").val() == item.id){
                        str7 = str7 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str7 = str7 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no8").val() == item.id){
                        str8 = str8 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str8 = str8 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no9").val() == item.id){
                        str9 = str9 + "<option selected='selected' value="+item.id+">"+item.position+"</option>";   
                    } else {
                        str9 = str9 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    if($("#position_no10").val() == item.id){
                        str10 = str10 + "<option selected='selected' value="+item.id+">"+item.position+"</option>"; 
                    } else {
                        str10 = str10 + "<option value="+item.id+">"+item.position+"</option>";
                    }
                    
                    
                });
                
                $("#position_no1").html(str +str1);
                $("#position_no2").html(str +str2);
                $("#position_no3").html(str +str3);
                $("#position_no4").html(str +str4);
                $("#position_no5").html(str +str5);
                $("#position_no6").html(str +str6);
                $("#position_no7").html(str +str7);
                $("#position_no8").html(str +str8);
                $("#position_no9").html(str +str9);
                $("#position_no10").html(str +str10);
            
        });
        
        

        
    });
    
    // search
    $("#searchAwardtInput").keypress(function(event){
        if (event.keyCode == 13) {
            $("#searchAwardBtn").click();
        }
    })
    
    $("#searchAwardBtn").live("click", function(){
        var key = $("#searchAwardtInput").val();
        $.post(base_url+"sales/home/ajaxSearchAward", {key:key, client_no:$("#hid_client_no").val()}, function(data){
            json = $.parseJSON(data);
            str = '<thead>'
            str = str + '<tr>'
            str = str + '<th>Trans No.</th>'
            str = str + '<th>Award Name</th>'
            str = str + '<th>Client</th>'
            str = str + '<th>Date of Quotation</th>'
            str = str + '<th>Process Status</th>'
            str = str + '<th>Action</th>'
            str = str + '</tr>'
            str = str + '</thead>'
            if (json.is_found) {
                $.each(json.result, function(i, item){
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
                    str = str + '<li><a target="_blank" href="'+base_url+'reports/rate_confirmation/print_modern/'+item.trans_no+'/'+item.modern_award_no+'">'
                    str = str + '<i class="icon-print"></i> View</a></li>'
                    str = str + '<li>'
                    str = str + '<a href="#" del-id="'+item.trans_no+'" class="delete-award-btn">'
                    str = str + '<i class="icon-trash"></i> Delete</a></li></ul></div>'   
                    str = str + '</td>'
                    str = str + '</tr>';
                })
            } else {
                str = str + '<tr><td colspan="5">No results found.</td></tr>'
            }
            
            $("#tblAwards").html(str);            
        })
    })
})
