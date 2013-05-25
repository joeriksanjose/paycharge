$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    
    // adding
    $("#long_services").keydown(function(evt){
        inputNumbers(evt);
    });
    
    $("#e_long_services").keydown(function(evt){
        inputNumbers(evt);
    });
    
    $("#frm-new-state").submit(function(){
        if ($("#long_services_no").val() == "" || $("#long_services").val() =="") {
            $("#div-success").css("display", "none");
            $("#div-error").css("display", "");
            $("#div-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        }
    });
    
    $("#add-new-state").click(function(){
        $("#new-state-form").show("fast");
        $("#div-error").css("display", "none");
    });
    
    $("#close-add-form").click(function(){
        $("#new-state-form").hide("fast");
    });
    
    // end adding
    
    // search    
    $("#search").keypress(function(evt){
        if(evt.which==13){
            $("#btn-search").click();
        }
    });
    
    $("#btn-search").live("click" ,function(){
        $("#div-success").css("display", "none");
        $.post(base_url+"libraries/long_services/search_long_services", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='long_services-table'>";
                 str = str + "<thead>"
                 str = str + "<tr>";
                 str = str + "<th>Long Service No</th>";
                 str = str + "<th>Long Service Value</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.long_services_no+"</td>";
                     str = str + "<td>"+item.long_services+"</td>";
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
                 str = str + "<th>Long Service No</th>";
                 str = str + "<th>Long Service Value</th>";
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
             $("#long_services-table").tablesorter();

        });
    });
    
    // end searh
    
    // delete
    var del_id;
    $('.delete-state-btn').live("click", function(){
        del_id = $(this).attr("del-id");
        remove_row = $(this).parent().parent(); 

        $('#deleteModal').modal();
    });
    
    $('#delete-state-btn-modal').click(function(){
         $.post(base_url+"libraries/long_services/delete_long_services", {del_id:del_id}, function(data){
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
    // end delete
    
    // id generator
    $("#btn_e_gen, #btn_gen").click(function(){
        $.post(base_url+"libraries/long_services/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            $("#e_long_services_no").val(json_data);
            $("#long_services_no").val(json_data);
        });
    });
    // end id generator
    
    // edit
    $(".edit-state-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/long_services/edit_long_services", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.id);
            $("#e_long_services_no").val(json_data.long_services_no);
            $("#e_long_services").val(json_data.long_services);
        });
        
        $("#showModal").modal("show");
    });
    
    $("#edit-btn-modal").live("click", function(){
        if($("#e_long_services_no").val() == "" || $("#e_long_services").val() ==""){
            $("#div-success").css("display", "none");
            $("#div-edit-error").css("display", "");
            $("#div-edit-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        } else {
            $.post(base_url+"libraries/long_services/update_long_services", 
                {
                    id:$("#id").val(),
                    long_services_no:$("#e_long_services_no").val(),
                    long_services:$("#e_long_services").val()
                },
                function(data) {
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Long service was successfully updated.");
                     var str = "";
                     str = str + "<table class='table table-striped table-bordered' id = 'long_services-table'>";
                     str = str + "<thead>"
                     str = str + "<tr>";
                     str = str + "<th>Long Service No</th>";
                     str = str + "<th>Long Service Value</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         str = str + "<tr>";
                         str = str + "<td>"+item.long_services_no+"</td>";
                         str = str + "<td>"+item.long_services+"</td>";
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
                     $("#long_services-table").tablesorter();
                     $('#showModal').modal("hide");
                } else {
                    alert(result.msg);
                     $('#showModal').modal("hide");
                }   
            });
        }
    });
    // end edit
    
    function inputNumbers(event)
    {
        if (
            event.keyCode == 190 || 
            event.keyCode == 8 || 
            event.keyCode == 9 || 
            event.keyCode == 27 || 
            event.keyCode == 13 || 
            (event.keyCode >= 48 && event.keyCode <= 57) ||
            (event.keyCode >= 96  && event.keyCode <= 105)
           ) {
            return;
        } else {
            event.preventDefault(); 
        }
    }
});


