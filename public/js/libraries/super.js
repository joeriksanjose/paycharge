$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    $('#datetimepicker').datetimepicker({
      pickTime: false,
      format: "dd/MM/yyyy"
    });
    
    $('#e_datetimepicker').datetimepicker({
      pickTime: false,
      format: "dd/MM/yyyy"
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
            $.post(base_url+"libraries/super/update", 
                {id:$("#id").val(),
                 super_no:$("#e_super_no").val(),
                 effective_date:$("#e_effective_date").val(),
                 super:$("#e_super").val()
                 },
                function(data){
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Super was successfully updated.");
                     var str = "";
                     var swi_active;
                     str = str + "<table class='table table-striped table-bordered' id='super-table'>";
                     str = str + "<thead>";
                     str = str + "<tr>";
                     str = str + "<th>Super No</th>";
                     str = str + "<th>Super Value</th>";
                     str = str + "<th>Effective Date</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         str = str + "<tr>";
                         str = str + "<td>"+item.super_no+"</td>";
                         str = str + "<td>"+item.super+"</td>";
                         str = str + "<td>"+item.effective_date+"</td>";
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
                     $("#super-table").tablesorter();
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
        $.post(base_url+"libraries/super/search", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             var swi_active;
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='super-table'>";
                 str = str + "<thead>";
                 str = str + "<tr>";
                 str = str + "<th>Super No</th>";
                 str = str + "<th>Super Value</th>";
                 str = str + "<th>Effective Date</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.super_no+"</td>";
                     str = str + "<td>"+item.super+"</td>";
                     str = str + "<td>"+item.effective_date+"</td>";
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
                 str = str + "<table class='table table-striped table-bordered'>";
                 str = str + "<tr>";
                 str = str + "<th>Super No</th>";
                 str = str + "<th>Super Value</th>";
                 str = str + "<th>Effective Date</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='4'>";
                 str = str + "No results found.";
                 str = str + "</td>";
                 str = str + "</tr>";
                 str = str + "</table>";
             }
             
             $("#tbl").html(str);
             $("#super-table").tablesorter();
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
         $.post(base_url+"libraries/super/delete", {del_id:del_id}, function(data){
             var result = $.parseJSON(data);
             if (result.is_error == false && result.success_delete == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Super was successfully removed.");
                     
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 $('#deleteModal').modal("hide");
             }   
         });
    }); 
    
    $("#btn_e_gen, #btn_gen").click(function(){
        $.post(base_url+"libraries/super/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            $("#e_super_no").val(json_data);
            $("#super_no").val(json_data);
        });
    });
    
    $(".edit-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/super/edit", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.id);
            $("#e_super_no").val(json_data.super_no);
            $("#e_super").val(json_data.super);
            $("#e_effective_date").val(json_data.effective_date);
        });
        
        $("#showModal").modal("show");
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
});


