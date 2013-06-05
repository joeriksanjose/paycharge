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
    
    // validate adding
    $("#frmNewContact").submit(function(){
        if (
            $("#contacts_no").val() == "" || 
            $("#first_name").val() == "" ||
            $("#pref_first_name").val() == "" ||
            $("#last_name").val() == "" ||
            $("#email").val() == "" ||
            $("#username").val() == "" ||
            $("#password").val() == "" ||
            $("#re_password").val() == ""
        ) {
            $(document).scrollTop(0);
            $("#divError").addClass("alert alert-error");
            $("#divError").html("<b>Error!</b> Please fill out required fields");
            $("#divError").show("fast");
            return false;
        }
        
        if ($("#password").val() != $("#re_password").val()) {
            $(document).scrollTop(0);
            $("#divError").addClass("alert alert-error");
            $("#divError").html("<b>Error!</b> Password did not match");
            $("#divError").show("fast");
            return false;
        }
    });
});
