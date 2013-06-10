$(document).ready(function(){
    base_url = $("#base_url").val();
    
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
                    str = str + '<td>'
                    str = str + '<button type="button" class="btn btn-mini edit-award-btn" edit-id="'+item.trans_no+'"><i class="icon-edit"></i></button>'
                    str = str + ' <a target="_blank" href="'+base_url+'reports/rate_confirmation/print_modern/'+item.trans_no+'/'+item.modern_award_no+'" class="btn btn-mini">'
                    str = str + '<i class="icon-print"></i>'
                    str = str + '</a>'
                    str = str + ' <button type="button" del-id="'+item.trans_no+'" class="btn btn-mini btn-danger delete-award-btn"><i class="icon-trash icon-white"></i></button>'
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
