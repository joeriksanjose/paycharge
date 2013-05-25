$(document).ready(function(){
    
    var base_url = $("#base-url").val();
    
    
    // adding
    $('#datetimepicker').datetimepicker({
      pickTime: false,
      format: "dd/MM/yyyy"
    });
    
    $('#e_datetimepicker').datetimepicker({
      pickTime: false,
      format: "dd/MM/yyyy"
    });
    
    $("#frm-new-state").submit(function(){
        if (
                $("#contacts_no").val() == "" || 
                $("#first_name").val() == "" ||
                $("#pref_first_name").val() == "" ||
                $("#last_name").val() == "" ||
                $("#middle_name").val() == "" ||
                $("#email").val() == "" ||
                $("#username").val() == "" ||
                $("#password").val() == "" ||
                $("#re_password").val() == ""
            ) {
            $("#div-success").css("display", "none");
            $("#div-error").css("display", "");
            $("#div-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        }
        
        if ($("#password").val() != $("#re_password").val()) {
            $("#div-success").css("display", "none");
            $("#div-error").css("display", "");
            $("#div-error").html("<b>Error!</b> Password did not match.");
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
        $.post(base_url+"libraries/contacts/search_contacts", 
            {key:$("#search").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='contacts-table' style='font-size: 12px;'>";
                 str = str + "<thead>"
                 str = str + "<tr>";
                 str = str + "<th>Contact No.</th>";
                 str = str + "<th>Name</th>";
                 str = str + "<th>Mobile No.</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.contact_no+"</td>";
                     str = str + "<td>"+item.last_name+", "+item.first_name+" "+item.middle_name+"</td>";
                     str = str + "<td>"+item.contact_phone_no+"</td>";
                     str = str + "<td><a target='_blank' href='"+base_url+"libraries/contacts/client_info/"+item.contact_no+"' class='btn btn-mini'>CLIENT</a>";
                     str = str + " <button type='button' class='btn btn-mini edit-state-btn' show-id='"+item.id+"'>";
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
                 str = str + "<th>Contact No.</th>";
                 str = str + "<th>Last Name</th>";
                 str = str + "<th>First Name</th>";
                 str = str + "<th>Middle Name</th>";
                 str = str + "<th>Mobile No.</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='6'>";
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
         $.post(base_url+"libraries/contacts/delete_contacts", {del_id:del_id}, function(data){
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
    $("#btn_e_gen, #btn_gen").click(function(){
        $.post(base_url+"libraries/contacts/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            
            $("#e_contact_no").val(json_data);
            $("#contact_no").val(json_data);
        });
    });
    // end id generator
    
    // edit
    $(".edit-state-btn").live("click", function(){
        var id = $(this).attr("show-id");
        $("#div-edit-error").css("display", "none");
        $.post(base_url+"libraries/contacts/edit_contacts", {id:id}, function(data){
            var json_data = $.parseJSON(data);
            $("#id").val(json_data.id);
            $("#e_contact_no").val(json_data.contact_no);
            $("#e_first_name").val(json_data.first_name);
            $("#e_pref_first_name").val(json_data.pref_first_name);
            $("#e_last_name").val(json_data.last_name);
            $("#e_middle_name").val(json_data.middle_name);
            $("#e_date_of_birth").val(json_data.date_of_birth);
            $("#e_position").val(json_data.position);
            $("#e_contact_phone_no").val(json_data.contact_phone_no);
            $("#e_email").val(json_data.email);
            $.each(json_data.client_nos_exploded, function(i, item) {
               $("#e_client_nos option[value='"+item+"']").attr("selected", "selected"); 
            });
            $("#e_can_view").prop("checked", parseInt(json_data.can_view));
            $("#e_can_approve").prop("checked", parseInt(json_data.can_approve));
            $("#e_can_forecast").prop("checked", parseInt(json_data.can_forecast));
        });
        
        $("#showModal").modal("show");
    });
    
    $("#edit-btn-modal").live("click", function(){
        if(
            $("#e_contacts_no").val() == "" || 
            $("#e_first_name").val() == "" ||
            $("#e_pref_first_name").val() == "" ||
            $("#e_last_name").val() == "" ||
            $("#e_middle_name").val() == "" ||
            $("#e_email").val() == ""
        ) {
            $("#div-success").css("display", "none");
            $("#div-edit-error").css("display", "");
            $("#div-edit-error").html("<b>Error!</b> Do not leave blank fields.");
            return false;
        } else {
            $.post(base_url+"libraries/contacts/update_contacts", 
                {
                    id:$("#id").val(),
                    contact_no:$("#e_contact_no").val(),
                    first_name:$("#e_first_name").val(),
                    pref_first_name:$("#e_pref_first_name").val(),
                    last_name:$("#e_last_name").val(),
                    middle_name:$("#e_middle_name").val(),
                    date_of_birth:$("#e_date_of_birth").val(),
                    position:$("#e_position").val(),
                    contact_phone_no:$("#e_contact_phone_no").val(),
                    email:$("#e_email").val(),
                    client_nos:$("#e_client_nos").val(),
                    can_view:$("#e_can_view").is(":checked") ? 1 : 0,
                    can_approve:$("#e_can_approve").is(":checked") ? 1 : 0,
                    can_forecast:$("#e_can_forecast").is(":checked") ? 1 : 0
                },
                function(data) {
                var result = $.parseJSON(data);
                if (result.is_error == false && result.success_update == true) {
                     $("#div-error").css("display", "none");
                     $("#div-success").css("display", "");
                     $("#div-success").html(
                         "<b>Done!</b> contacts was successfully updated." + "<button type='button' class='close' data-dismiss='alert'>&times;</button>"
                     );
                     var str = "";
                     str = str + "<table class='table table-striped table-bordered' id='contacts-table' style='font-size: 12px;'>";
                     str = str + "<thead>"
                     str = str + "<tr>";
                     str = str + "<th>Contact No.</th>";
                     str = str + "<th>Name</th>";
                     str = str + "<th>Mobile No.</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result.data, function(i, item){
                         str = str + "<tr>";
                         str = str + "<td>"+item.contact_no+"</td>";
                         str = str + "<td>"+item.last_name+", "+item.first_name+" "+item.middle_name+"</td>";
                         str = str + "<td>"+item.contact_phone_no+"</td>";
                         str = str + "<td><a target='_blank' href='"+base_url+"libraries/contacts/client_info/"+item.contact_no+"' class='btn btn-mini'>CLIENT</a>";
                         str = str + " <button type='button' class='btn btn-mini edit-state-btn' show-id='"+item.id+"'>";
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


