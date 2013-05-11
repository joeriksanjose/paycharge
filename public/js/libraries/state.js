$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    $("#tax").keydown(function(evt){
        inputNumbers(evt);
    });
    $("#e_tax").keydown(function(evt){
        inputNumbers(evt);
    });
    
    $("#frm-new-state").submit(function(){
        if($("#state_no").val() == "" || $("#state_name").val() ==""|| $("#tax").val() ==""){
            $("#div-success").css("display", "none");
            $("#div-error").css("display", "");
            $("#div-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        }
    });
    
    $("#edit-btn-modal").live("click", function(){
        if($("#e_state_no").val() == "" || $("#e_state_name").val() ==""|| $("#e_tax").val() ==""){
            $("#div-success").css("display", "none");
            $("#div-edit-error").css("display", "");
            $("#div-edit-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        } else {
            var active;
            if($("#e_swi_active").is(":checked")){
                active = 1;
            } else {
                active = 0;
            }
            $.post(base_url+"libraries/state/update_state", 
                {id:$("#id").val(),
                 state_no:$("#e_state_no").val(),
                 state_name:$("#e_state_name").val(),
                 tax:$("#e_tax").val(),
                 swi_active:active},
                function(data){
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> State was successfully updated.");
                     var str = "";
                     var swi_active;
                     str = str + "<table class='table table-striped table-bordered' id = 'state-table'>";
                     str = str + "<thead>"
                     str = str + "<tr>";
                     str = str + "<th>State No</th>";
                     str = str + "<th>State Name</th>";
                     str = str + "<th>Active</th>";
                     str = str + "<th>Payroll Tax %</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         if(item.swi_active==1){
                             swi_active="Yes";
                         } else {
                             swi_active="No";
                         }
                         str = str + "<tr>";
                         str = str + "<td>"+item.state_no+"</td>";
                         str = str + "<td>"+item.state_name+"</td>";
                         str = str + "<td>"+swi_active+"</td>";
                         str = str + "<td>"+item.tax+"</td>";
                         str = str + "<td><button type='button' class='btn edit-state-btn' show-id='"+item.id+"'>";
                         str = str + "<i class='icon-edit'></i> Edit</button> ";
                         str = str + "<button type='button' class='btn btn-danger delete-state-btn' del-id='"+item.id+"'>";
                         str = str + "<i class='icon-trash icon-white'></i> Delete";
                         str = str + "</button></td>";
                         str = str + "</tr>";
                     });
                     str = str + "</tbody>"
                     str = str + "</table>";
                     
                     $("#tbl").html(str);
                     $("#state-table").tablesorter();
                     $('#showModal').modal("hide");
                } else {
                     $('#showModal').modal("hide");
                }   
            });
        }
    });
    
    $("#search").keypress(function(evt){
        if(evt.which==13){
            $("#btn-search").click();
        }
    });
    $("#btn-search").live("click" ,function(){
        var active;
        $("#div-success").css("display", "none");
        $.post(base_url+"libraries/state/search_state", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             var swi_active;
             
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='state-table'>";
                 str = str + "<thead>"
                 str = str + "<tr>";
                 str = str + "<th>State No</th>";
                 str = str + "<th>State Name</th>";
                 str = str + "<th>Active</th>";
                 str = str + "<th>Payroll Tax %</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     if(item.swi_active==1){
                         swi_active="Yes";
                     } else {
                         swi_active="No";
                     }
                     str = str + "<tr>";
                     str = str + "<td>"+item.state_no+"</td>";
                     str = str + "<td>"+item.state_name+"</td>";
                     str = str + "<td>"+swi_active+"</td>";
                     str = str + "<td>"+item.tax+"</td>";
                     str = str + "<td><button type='button' class='btn edit-state-btn' show-id='"+item.id+"'>";
                     str = str + "<i class='icon-edit'></i> Edit</button> ";
                     str = str + "<button type='button' class='btn btn-danger delete-state-btn' del-id='"+item.id+"'>";
                     str = str + "<i class='icon-trash icon-white'></i> Delete";
                     str = str + "</button></td>";
                     str = str + "</tr>";
                 });
                 str = str + "<tbody>";
                 str = str + "</table>";
             } else {
                 str = str + "<table class='table table-striped table-bordered'>";
                 str = str + "<tr>";
                 str = str + "<th>State No</th>";
                 str = str + "<th>State Name</th>";
                 str = str + "<th>Active</th>";
                 str = str + "<th>Payroll Tax %</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='5'>";
                 str = str + "No results found.";
                 str = str + "</td>";
                 str = str + "</tr>";
                 str = str + "</table>";
             }
             
             $("#tbl").html(str);
             $("#state-table").tablesorter();
        });
    });
        
    $("#add-new-state").click(function(){
        $("#new-state-form").show("fast");
        $("#div-error").css("display", "none");
    });
    
    $("#close-add-form").click(function(){
        $("#new-state-form").hide("fast");
    });
    
    var del_id;
    $('.delete-state-btn').live("click", function(){
        del_id = $(this).attr("del-id");
        remove_row = $(this).parent().parent(); 

        $('#deleteModal').modal();
    });
    
    $('#delete-state-btn-modal').click(function(){
         $.post(base_url+"libraries/state/delete_state", {del_id:del_id}, function(data){
             var result = $.parseJSON(data);
             if (result.is_error == false && result.success_delete == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> State was successfully removed.");
                     
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 $('#deleteModal').modal("hide");
             }   
         });
    }); 
    
    $("#btn_e_gen, #btn_gen").click(function(){
        $.post(base_url+"libraries/state/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            $("#e_state_no").val(json_data);
            $("#state_no").val(json_data);
        });
    });
    
    $(".edit-state-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/state/edit_state", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.id);
            $("#e_state_no").val(json_data.state_no);
            $("#e_state_name").val(json_data.state_name);
            $("#e_state_no").val(json_data.state_no);
            $("#e_tax").val(json_data.tax);
            if(json_data.swi_active == 1){
                $("#e_swi_active").prop("checked", true);
            } else {
                $("#e_swi_active").prop("checked", false);
            }
        });
        
        $("#showModal").modal("show");
    });
    
    function inputNumbers(event)
    {
        if ( event.keyCode == 190 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || (event.keyCode >=48 && event.keyCode <= 57))
        {
            return;
        }
        else
        {
            
                event.preventDefault(); 
        }
    }
});


