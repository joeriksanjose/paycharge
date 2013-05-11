$(document).ready(function(){
    var base_url = $("#base-url").val();
    // delete
    var contact_no;
    $('.delete-state-btn').live("click", function(){
        contact_no = $(this).attr("del-id");
        remove_row = $(this).parent().parent(); 
		$('#contact_no').val(contact_no);
        $('#deleteModal').modal();
    });
    
    $('#delete-state-btn-modal').click(function(){
         var contact_no = $("#contact_no").val();
         var company_no = $("#company_no").val();
         $.post(base_url+"libraries/clients/deleteContactInfo", {company_no:company_no, contact_no:contact_no}, function(data){
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
    	contact_no = $(this).attr("show-id");
        $.post(base_url+"libraries/clients/showContactInfo", {contact_no:contact_no}, function(data){
           res = $.parseJSON(data);
           $("#last_name").html(res.last_name);
           $("#first_name").html(res.first_name);
           $("#pref_fname").html(res.pref_first_name);
           $("#middle_name").html(res.middle_name);
           $("#birthday").html(res.date_of_birth);
           $("#position").html(res.position);
           $("#mobile_no").html(res.contact_phone_no);
           $("#email").html(res.email);
           $('#infoModal').modal(); 
        });
    });
    
    
});
