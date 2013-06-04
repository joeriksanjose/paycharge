$(document).ready(function(){
    var base_url = $("#base_url").val();
    
    /*
     * Adding contacts
     */
    $("#add-contact-btn").click(function(){
        //show form
        $("#new-contact-frm").show("fast"); 
    });
    
    $("#close-add-form").click(function(){
        //close form
        $("#new-contact-frm").hide("fast");
    });
});
