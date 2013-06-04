$(document).ready(function(){
    var base_url = $("#base_url").val();
    
    // show contact form
    $("#showContactForm").click(function(){
        $("#frmNewContact").show("fast"); 
    });
    
    // hide contact form
    $("#hideContactForm").click(function(){
        $("#frmNewContact").hide("fast");
    });
    
    // contact no. generator    
    $("#generateClientNo").click(function(){
        $.post(base_url+"libraries/contacts/get_last_id", function(data){
            var json_data = $.parseJSON(data);
            $("#contact_no").val(json_data);
        });
    });
});
