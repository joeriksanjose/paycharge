$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    $("#btn-add").click(function(event){
        var json;
        $.post(base_url+"libraries/position/checkPosition", {position:$("#position").val()}, function(data){
            var json_data = $.parseJSON(data);
            json = json_data.status;
            if(json == 0){
                $("#error_div").css("display", "block");
                $("#error_div").html(json_data.status_msg);
                event.preventDefault();
                return false;
            }
        });
        
        if($("#error_div").css("display") == "block"){
            event.preventDefault();
            return false;
        }
        
    });
    
    
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
        if($("#e_position").val() == "" || $("#e_description").val() ==""){
            $("#div-success").css("display", "none");
            $("#div-edit-error").css("display", "");
            $("#div-edit-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        } else {
            $.post(base_url+"libraries/position/update", 
                {id:$("#id").val(),
                 position:$("#e_position").val(),
                 description:$("#e_description").val()
                 },
                function(data){
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-ok").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Position was successfully updated.");
                     var str = "";
                     var swi_active;
                     str = str + "<table class='table table-striped table-bordered' id='super-table'>";
                     str = str + "<thead>";
                     str = str + "<tr>";
                     str = str + "<th>Position</th>";
                     str = str + "<th>Description</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         str = str + "<tr>";
                         str = str + "<td>"+item.position+"</td>";
                         str = str + "<td>"+item.description+"</td>";
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
                     $("#table").tablesorter();
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
        $.post(base_url+"libraries/position/search", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             var swi_active;
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='super-table'>";
                     str = str + "<thead>";
                     str = str + "<tr>";
                     str = str + "<th>Position</th>";
                     str = str + "<th>Description</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.position+"</td>";
                     str = str + "<td>"+item.description+"</td>";
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
                 str = str + "<table class='table table-striped table-bordered' id='super-table'>";
                 str = str + "<thead>";
                 str = str + "<tr>";
                 str = str + "<th>Position</th>";
                 str = str + "<th>Description</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
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
         $.post(base_url+"libraries/position/delete", {del_id:del_id}, function(data){
             var result = $.parseJSON(data);
             if (result.is_error == false && result.success_delete == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                     $("#div-error").css("display", "none");
                     $("#div-ok").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Position was successfully removed.");
                     
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 $('#deleteModal').modal("hide");
             }   
         });
    }); 
    
    $("#btn_gen").click(function(){
        $.post(base_url+"libraries/position/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            $("#position_no").val(json_data);
        });
    });
    
    $(".edit-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/position/edit", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.id);
            $("#e_position").val(json_data.position);
            $("#e_description").val(json_data.description);
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


