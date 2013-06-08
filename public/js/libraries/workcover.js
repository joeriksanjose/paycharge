$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    $("#btn-add").click(function(){
        if($("#error_div").css("display") == "block"){
            return false;
        }   
    });
    
    $("#work_cover_no").keyup(function(){
        $.post(base_url+"libraries/workcover/checkTransNo", {work_cover_no:$(this).val()}, function(data){
            var json_data = $.parseJSON(data);
            
            if(json_data.status == 0){
                $("#error_div").css("display", "block");
                $("#success_div").css("display", "none");
                $("#error_div").html(json_data.status_msg);
            } else {
                $("#error_div").css("display", "none");
            }
        });
    });
    
    $('#datetimepicker').datetimepicker({
      pickTime: false
    });
    $('#e_datetimepicker').datetimepicker({
      pickTime: false
    });
    
    $("#frm-new").submit(function(){
        if($("#super_no").val() == "" || $("#super").val() ==""|| $("#effective_date").val() ==""){
            $("#div-success").css("display", "none");
            $("#div-error").css("display", "");
            $("#div-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        }
    });
    
    $("#edit-btn-modal").live("click", function(){
        if($("#e_super_no").val() == "" || $("#e_super").val() ==""|| $("#e_effective_date").val() ==""){
            $("#div-success").css("display", "none");
            $("#div-edit-error").css("display", "");
            $("#div-edit-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        } else {
            $.post(base_url+"libraries/workcover/update", 
                {id:$("#id").val(),
                 work_cover_no:$("#e_work_cover_no").val(),
                 work_cover:$("#e_work_cover").val(),
                 work_cover_code:$("#e_work_cover_code").val(),
                 state_no:$("#e_state_no").val()
                 },
                function(data){
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-ok").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Super was successfully updated.");
                     var str = "";
                     str = str + "<table class='table table-striped table-bordered' id='workcover-table'>";
                     str = str + "<thead>";
                     str = str + "<tr>";
                     str = str + "<th>Workcover No</th>";
                     str = str + "<th>Workcover</th>";
                     str = str + "<th>Workcover Code</th>";
                     str = str + "<th>State Name</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         str = str + "<tr>";
                         str = str + "<td>"+item.work_cover_no+"</td>";
                         str = str + "<td>"+item.work_cover+"</td>";
                         str = str + "<td>"+item.work_cover_code+"</td>";
                         str = str + "<td>"+item.state_name+"</td>";
                         str = str + "<td><button type='button' class='btn edit-btn' show-id='"+item.id+"'>";
                         str = str + "<i class='icon-edit'></i> Edit</button> ";
                         str = str + "<button type='button' class='btn btn-danger delete-btn' del-id='"+item.id+"'>";
                         str = str + "<i class='icon-trash icon-white'></i> Delete";
                         str = str + "</button></td>";
                         str = str + "</tr>";
                     });
                     str = str + "</tbody>";
                     str = str + "</table>";
                     
                     $("#tbl").html(str);
                     $("#workcover-table").tablesorter();
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
    $("#btn-search").live("click", function(){
        var active;
        $("#div-success").css("display", "none");
        $.post(base_url+"libraries/workcover/search", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             var swi_active;
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='workcover-table'>";
                 str = str + "<thead>";
                 str = str + "<tr>";
                 str = str + "<th>Workcover No</th>";
                 str = str + "<th>Workcover</th>";
                 str = str + "<th>Workcover Code</th>";
                 str = str + "<th>State Name</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.work_cover_no+"</td>";
                     str = str + "<td>"+item.work_cover+"</td>";
                     str = str + "<td>"+item.work_cover_code+"</td>";
                     str = str + "<td>"+item.state_name+"</td>";
                     str = str + "<td><button type='button' class='btn edit-btn' show-id='"+item.id+"'>";
                     str = str + "<i class='icon-edit'></i> Edit</button> ";
                     str = str + "<button type='button' class='btn btn-danger delete-btn' del-id='"+item.id+"'>";
                     str = str + "<i class='icon-trash icon-white'></i> Delete";
                     str = str + "</button></td>";
                     str = str + "</tr>";
                 });
                 str = str + "</tbody>";
                 str = str + "</table>";
             } else {
                 str = str + "<table class='table table-striped table-bordered' id='workcover-table'>";
                 str = str + "<tr>";
                 str = str + "<th>Workcover No</th>";
                 str = str + "<th>Workcover</th>";
                 str = str + "<th>Workcover Code</th>";
                 str = str + "<th>State Name</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='5'>";
                 str = str + "No results found";
                 str = str + "</td>";
                 str = str + "</tr>";
                 str = str + "</table>";
             }
             
             $("#tbl").html(str);
             $("#workcover-table").tablesorter();
        });
    });
        
    $("#add-new").click(function(){
        $("#new-form").show("fast");
        $("#div-error").css("display", "none");
    });
    
    $("#close-add-form").click(function(){
        $("#new-form").hide("fast");
    });
    
    var del_id;
    $('.delete-btn').live("click", function(){
        del_id = $(this).attr("del-id");
        remove_row = $(this).parent().parent(); 

        $('#deleteModal').modal();
    });
    
    $('#delete-btn-modal').click(function(){
         $.post(base_url+"libraries/workcover/delete", {del_id:del_id}, function(data){
             var result = $.parseJSON(data);
             if (result.is_error == false && result.success_delete == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                     $("#div-error").css("display", "none");
                     $("#div-ok").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Super was successfully removed.");
                     
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 $('#deleteModal').modal("hide");
             }   
         });
    }); 
    
    $("#btn_gen").click(function(){
        $.post(base_url+"libraries/workcover/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            $("#work_cover_no").val(json_data);
            $("#error_div").css("display", "none");
        });
    });
    
    $(".edit-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/workcover/edit", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.data.id);
            $("#e_work_cover_no").val(json_data.data.work_cover_no);
            $("#e_work_cover").val(json_data.data.work_cover);
            $("#e_work_cover_code").val(json_data.data.work_cover_code);
            var state_no = json_data.data.state_no;
            var str = "";
            $.each(json_data.data_state, function(i, item){
                if(state_no == item.state_no){
                    str = str + "<option value='"+item.state_no+"' selected='selected'>"+item.state_name+"</option>;"    
                } else {
                    str = str + "<option value='"+item.state_no+"'>"+item.state_name+"</option>;"
                }
            });
            
            $("#e_state_no").html(str);
        });
        
        $("#showModal").modal("show");
    });
    
    $("#work_cover_no").keydown(function(evt){
        inputNumbers(evt);
    });
    
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
    
    // CSV import
    $("#trig-file-browser").click(function(){
        $("#csv_file").click();
    });
    
    $("#csv_file").change(function(){
       $("#file-name").val($(this).val().replace("C:\\fakepath\\", "")); 
    });
    
    $("#upload").click(function(){
        $("#frm-importer").submit();
    });
    // end CSV import
});


