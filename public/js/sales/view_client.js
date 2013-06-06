$(document).ready(function(){
    var base_url = $("#base_url").val();
    
    $("#tblSalesContacts").tablesorter();
    
    // show contact form
    $("#showContactForm").click(function(){
        $("#frmNewContact").show("fast"); 
    });
    
    // show contact form
    $("#showExistingForm").click(function(){
        $("#showExistingModal").modal("show"); 
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
    
    // delete contact
    var deleteId;
    $(".btnDeleteContact").live("click", function(){
        deleteId = $(this).attr("id");
        deleteRow = $(this).parent().parent();
        $("#deleteContactModal").modal("show");
    });
    
    $("#btnDeleteContactModal").live("click", function(){
        company_no = $("#hid_company_no").val();
        $.post(base_url+"sales/home/ajaxDeleteContact", {company_no:company_no, contact_no:deleteId}, function(data){
            json = $.parseJSON(data);
            if (json.is_deleted) {
                $("#deleteContactModal").modal("hide");
                deleteRow.fadeOut(700);
            } else {
                alert("database error.");
                $("#deleteContactModal").modal("hide");
            }
        })
    })
    
    // edit contact
    $(".btnEditContact").live("click", function(){
        $.post(base_url+"sales/home/ajaxGetUserInfo", {contact_no:$(this).attr("id")}, function(data){
            json = $.parseJSON(data);
            if (json.is_found) {
                $("#e_contact_no").val(json.result.contact_no);
                $("#e_first_name").val(json.result.first_name);
                $("#e_pref_first_name").val(json.result.pref_first_name);
                $("#e_last_name").val(json.result.last_name);
                $("#e_middle_name").val(json.result.middle_name);
                $("#e_date_of_birth").val(json.result.date_of_birth);
                $("#e_position").val(json.result.position);
                $("#e_contact_phone_no").val(json.result.contact_phone_no);
                $("#e_email").val(json.result.email);
                $("#e_first_name").val(json.result.first_name);
                $("#e_can_view").prop("checked", parseInt(json.result.can_view));
                $("#e_can_approve").prop("checked", parseInt(json.result.can_approve));
                $("#e_can_forecast").prop("checked", parseInt(json.result.can_forecast));
                $("#frmEditContact").show("fast");   
            } else {
                alert("Something went wrong");
                
            }
        })
    })
    
    // hide edit form
    $("#hideEditForm").click(function(){
        $("#frmEditContact").hide("fast");
    });
    
    // validate editing
    $("#frmEditContact").submit(function(){
        if (
            $("#e_contacts_no").val() == "" || 
            $("#e_first_name").val() == "" ||
            $("#e_pref_first_name").val() == "" ||
            $("#e_last_name").val() == "" ||
            $("#e_email").val() == ""
        ) {
            $(document).scrollTop(0);
            $("#eDivError").addClass("alert alert-error");
            $("#eDivError").html("<b>Error!</b> Please fill out required fields");
            $("#eDivError").show("fast");
            return false;
        }
    });
    
    // search contact
    $("#searchContactInput").keypress(function(event){
        if (event.keyCode == 13)
            $("#searchContactBtn").click();
    })
    
    $("#searchContactBtn").click(function(){
        str = "";
        company_no = $("#hid_company_no").val();
        loading = "<div style='height: 10px' class='progress progress-info progress-striped active'>";
        loading = loading + "<div class='bar' style='width: 100%'></div>";
        loading = loading + "</div>";
        $(".loading").html(loading);
        $.post(base_url+"sales/home/ajaxSearchContact", {key:$("#searchContactInput").val(), company_no:company_no}, function(data){
            str = str + '<thead>';
            str = str + '<th>#</th>';
            str = str + '<th>Name</th>';
            str = str + '<th>Mobile No.</th>';
            str = str + '<th>Email</th>';
            str = str + '<th>Action</th>';
            str = str + '</thead>';
            
            json = $.parseJSON(data);
            str = str + '<tbody>';
            if (json.is_found) {
                $.each(json.result, function(i, item){
                    str = str + '<tr><td>';
                    str = str + item.contact_no;
                    str = str + '</td>';
                    str = str + '<td>';
                    str = str + item.last_name+", "+item.first_name+" "+item.middle_name;
                    str = str + '</td>';
                    str = str + '<td>';
                    str = str + item.contact_phone_no;
                    str = str + '</td>';
                    str = str + '<td>';
                    str = str + item.email;
                    str = str + '</td>';
                    str = str + '<td>';
                    str = str + '<button type="button" class="btn btn-mini btnEditContact" id="'+item.contact_no+'">';
                    str = str + '<i class="icon-edit"></i></button>';
                    str = str + ' <button type="button" class="btn btn-mini btn-danger btnDeleteContact" id="'+item.contact_no+'">';
                    str = str + '<i class="icon-trash icon-white"></i></button>';
                    str = str + '</td></tr>';
                })
            } else {
                str = str + '<td colspan="5">No results found.</td>';
            }
            str = str + '</thead>';
            $(".loading").html("");
            $("#tblSalesContacts").html(str);
        })
    })
});
