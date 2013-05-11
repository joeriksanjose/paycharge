$(document).ready(function(){
    var base_url = $("#base-url").val();
    // delete
    var company_no;
    $('.delete-state-btn').live("click", function(){
        company_no = $(this).attr("del-id");
        remove_row = $(this).parent().parent(); 

        $('#deleteModal').modal();
    });
    
    $('#delete-state-btn-modal').click(function(){
         var contact_no = $("#contact_no").val();
         $.post(base_url+"libraries/contacts/deleteClientInfo", {company_no:company_no, contact_no:contact_no}, function(data){
             var result = $.parseJSON(data);
             if (result.status) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 alert("Database Error");
                 $('#deleteModal').modal("hide");
             }   
         });
    });
    // end delete
    
    // view info
    $('#view-info').live("click", function(){
        company_no = $(this).attr("show-id");
        contact_no = $("#contact_no").val();
        $.post(base_url+"libraries/contacts/showClientInfo", {company_no:company_no, contact_no:contact_no}, function(data){
           res = $.parseJSON(data);
           $("#s_company_name").html(res.company_name);
           $("#s_department").html(res.department);
           $("#s_address1").html(res.address_line1);
           $("#s_address2").html(res.address_line2);
           $("#s_c_first_name").html(res.contact_first_name);
           $("#s_c_full_name").html(res.contact_full_name);
           $("#s_c_title").html(res.contact_title);
           $("#s_state").html(res.state_name);
           $("#s_client_no").html(res.client_no);
           $('#infoModal').modal(); 
        });
    });
    
    $('#delete-state-btn-modal').click(function(){
         var contact_no = $("#contact_no").val();
         $.post(base_url+"libraries/contacts/deleteClientInfo", {company_no:company_no, contact_no:contact_no}, function(data){
             var result = $.parseJSON(data);
             if (result.status) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 alert("Database Error");
                 $('#deleteModal').modal("hide");
             }   
         });
    });
});
