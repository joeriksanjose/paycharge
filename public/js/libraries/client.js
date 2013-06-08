$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    // adding
    $("#client_no, e_client_no").keydown(function(evt){
        inputNumbers(evt);
    });
    
    $("#frm-new-state").submit(function(){
        if (
                $("#company_name").val() == "" || 
                $("#address_line1").val() == "" ||
                $("#middle_name").val() == "" ||
                $("#contact_first_name").val() == "" ||
                $("#contact_full_name").val() == "" ||
                $("#contact_title").val() == "" ||
                $("#client_no").val() == ""
            ) {
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
        $.post(base_url+"libraries/clients/search_clients", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered table-condensed' id='contacts-table' style='font-size: 12px;'>";
                 str = str + "<thead>"
                 str = str + "<tr>";
                 str = str + "<th>Company Name</th>";
                 str = str + "<th>Department</th>";
                 str = str + "<th>C. First Name</th>";
                 str = str + "<th>C. Full Name</th>";
                 str = str + "<th>C. Title</th>";
                 str = str + "<th>State</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.company_name+"</td>";
                     str = str + "<td>"+item.department+"</td>";
                     str = str + "<td>"+item.contact_first_name+"</td>";
                     str = str + "<td>"+item.contact_full_name+"</td>";
                     str = str + "<td>"+item.contact_title+"</td>";
                     str = str + "<td>"+item.state_name+"</td>";
                     str = str + "<td><button type='button' class='btn btn-mini edit-state-btn' show-id='"+item.id+"'>";
                     str = str + "<i class='icon-edit'></i></button> ";
                     str = str + "<button type='button' class='btn btn-mini btn-danger delete-state-btn' del-id='"+item.id+"'>";
                     str = str + "<i class='icon-trash icon-white'></i>";
                     str = str + "</button></td>";
                     str = str + "</tr>";
                 });
                 str = str + "<tbody>";
                 str = str + "</table>";
             } else {
                 str = str + "<table class='table table-striped table-bordered' style='font-size: 12px;'>";
                 str = str + "<tr>";
                 str = str + "<th>Company Name</th>";
                 str = str + "<th>Department</th>";
                 str = str + "<th>C. First Name</th>";
                 str = str + "<th>C. Full Name</th>";
                 str = str + "<th>C. Title</th>";
                 str = str + "<th>State</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='7'>";
                 str = str + "No results found.";
                 str = str + "</td>";
                 str = str + "</tr>";
                 str = str + "</table>";
             }
             
             $("#tbl").html(str);
             $("#contacts-table").tablesorter();

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
         $.post(base_url+"libraries/clients/delete_clients", {del_id:del_id}, function(data){
             var result = $.parseJSON(data);
             if (result.is_error == false && result.success_delete == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html("<b>Done!</b> Contact was successfully removed.");
                     
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 $('#deleteModal').modal("hide");
             }   
         });
    });
    // end delete
    
    // id generator    
    $("#btn_gen").click(function(){
        $.post(base_url+"libraries/clients/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            
            $("#error_div").css("display", "none");
            $("#contact_no").val(json_data);
        });
    });
    // end id generator
    
    // edit
    $(".edit-state-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/clients/edit_clients", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.id);
            $("#e_company_name").val(json_data.company_name);
            $("#e_contact_first_name").val(json_data.contact_first_name);
            $("#e_contact_full_name").val(json_data.contact_full_name);
            $("#e_contact_title").val(json_data.contact_title);
            $("#e_department").val(json_data.department);
            $("#e_address_line1").val(json_data.address_line1);
            $("#e_address_line2").val(json_data.address_line2);
            $("#e_client_no").val(json_data.client_no);
            $("#e_state").val(json_data.state_no).attr("selected", "selected");
        });
        
        $("#showModal").modal("show");
    });
    
    $("#edit-btn-modal").live("click", function(){
        if(
            $("#e_company_name").val() == "" || 
            $("#e_address_line1").val() == "" ||
            $("#e_middle_name").val() == "" ||
            $("#e_contact_first_name").val() == "" ||
            $("#e_contact_full_name").val() == "" ||
            $("#e_contact_title").val() == "" ||
            $("#e_client_no").val() == ""
        ) {
            $("#div-success").css("display", "none");
            $("#div-edit-error").css("display", "");
            $("#div-edit-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        } else {
            $.post(base_url+"libraries/clients/update_clients", 
                {
                    id:$("#id").val(),
                    company_name:$("#e_company_name").val(),
                    contact_first_name:$("#e_contact_first_name").val(),
                    contact_full_name:$("#e_contact_full_name").val(),
                    contact_title:$("#e_contact_title").val(),
                    department:$("#e_department").val(),
                    address_line1:$("#e_address_line1").val(),
                    address_line2:$("#e_address_line2").val(),
                    client_no:$("#e_client_no").val(),
                    state_no:$("#e_state").val()
                },
                function(data) {
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html(
                         "<b>Done!</b> Client was successfully updated." + "<button type='button' class='close' data-dismiss='alert'>&times;</button>"
                     );
                     var str = "";
                     str = str + "<table class='table table-striped table-bordered table-condensed' id='contacts-table' style='font-size: 12px;'>";
                     str = str + "<thead>"
                     str = str + "<tr>";
                     str = str + "<th>Company Name</th>";
                     str = str + "<th>Department</th>";
                     str = str + "<th>C. First Name</th>";
                     str = str + "<th>C. Full Name</th>";
                     str = str + "<th>C. Title</th>";
                     str = str + "<th>State</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         str = str + "<tr>";
                         str = str + "<td>"+item.company_name+"</td>";
                         str = str + "<td>"+item.department+"</td>";
                         str = str + "<td>"+item.contact_first_name+"</td>";
                         str = str + "<td>"+item.contact_full_name+"</td>";
                         str = str + "<td>"+item.contact_title+"</td>";
                         str = str + "<td>"+item.state_name+"</td>";
                         str = str + "<td><button type='button' class='btn btn-mini edit-state-btn' show-id='"+item.id+"'>";
                         str = str + "<i class='icon-edit'></i></button> ";
                         str = str + "<button type='button' class='btn btn-mini btn-danger delete-state-btn' del-id='"+item.id+"'>";
                         str = str + "<i class='icon-trash icon-white'></i>";
                         str = str + "</button></td>";
                         str = str + "</tr>";
                     });
                     str = str + "</tbody>"
                     str = str + "</table>";
                     
                     $("#tbl").html(str);
                     $("#contacts-table").tablesorter();
                     $('#showModal').modal("hide");
                } else {
                     $('#showModal').modal("hide");
                }   
            });
        }
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


