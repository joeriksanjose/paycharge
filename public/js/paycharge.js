$(document).ready(function(){
    var base_url = $("#base-url").val();
    
    $("#search").keypress(function(evt){
        if (evt.which == 13) {
            $("#btn-search").click();
        }
    });
    
    $("#btn-search").click(function(){
        $.post(base_url+"utilities/search_user", 
                {key:$("#search").val()}, function(data){
                 var result = $.parseJSON(data);
                 var str = "";
                 var type;
                 
                 if (!result.is_error) {
                     str = str + "<table class='table table-striped table-bordered' id='user-table'>";
                     str = str + "<thead>"
                     str = str + "<tr>";
                     str = str + "<th>User ID</th>";
                     str = str + "<th>User Full Name</th>";
                     str = str + "<th>User Type</th>";
                     str = str + "<th>Action</th>";
                     str = str + "</tr>";
                     str = str + "</thead>";
                     str = str + "<tbody>";
                     $.each(result, function(i, item){
                         if(item.admin==1){
                             type="Administrator";
                         } else {
                             type="Sales";
                         }
                         str = str + "<tr>";
                         str = str + "<td>"+item.username+"</td>";
                         str = str + "<td>"+item.full_name+"</td>";
                         str = str + "<td>"+type+"</td>";
                         str = str + "<td><button type='button' class='btn edit-btn' show-id='"+item.id+"'>";
                         str = str + "<i class='icon-edit'></i> Edit</button> ";
                         str = str + "<button type='button' class='btn btn-danger delete-btn' del-id='"+item.id+"'>";
                         str = str + "<i class='icon-trash icon-white'></i> Delete";
                         str = str + "</button></td>";
                         str = str + "</tr>";
                     });
                     str = str + "<tbody>";
                     str = str + "</table>";
                 } else {
                     str = str + "<table class='table table-striped table-bordered'>";
                     str = str + "<tr>";
                     str = str + "<th>User ID</th>";
                     str = str + "<th>User Full Name</th>";
                     str = str + "<th>User Type</th>";
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
                 $("#user-table").tablesorter();
            });
        });
   
    
     $("#user-table").tablesorter();
    
    //set active nav
    var active_menu = $('.nav').find($('a[href="'+window.location.href+'"]'));
    $(active_menu).parent('li').addClass('active');
        
    // add new user
    $('#add-new-user').click(function(){
       if ($('#new-user-form').css("display") == "block") {
           $('#new-user-form').hide('fast');
           $(this).html("<i class='icon-plus'></i> Add new user");
       } else {
           $('#new-user-form').show('fast');
           $(this).html("<i class='icon-remove'></i> Close form");
       }
    });
    
    $('#close-add-form').click(function(){
        if ($('#new-user-form').css("display") == "block") {
            $('#new-user-form').hide('fast');
            $('#add-new-user').html("<i class='icon-plus'></i> Add new user");
        }
    });
    
    
    $("#admin").change(function(){
       if ($(this).val() == 0) {
           $("#state_assign").show("fast");
           $("#state_no").removeAttr("disabled");
           return;
       }
       
       $("#state_assign").hide("fast");
       $("#state_no").attr("disabled", "disabled");
    });
    
    // deleting user
    var del_id = 0;
    $('.delete-btn').click(function(){
        del_id = $(this).attr("del-id");
        remove_row = $(this).parent().parent(); 
        $('#deleteModal').modal();
    });
    
    $('#delete-btn-modal').click(function(){
         $.post(base_url+"home/ajaxDeleteUser", {del_id:del_id}, function(data){
             var result = $.parseJSON(data);
             if (result.is_error == false && result.success_delete == true) {
                 remove_row.fadeOut('slow', function(){
                     $(this).remove();
                 });
                 $('#deleteModal').modal("hide");
             } else {
                 alert(result.msg);
                 $('#deleteModal').modal("hide");
             }   
         });
    });  
    // end deleting user
    
    // show and updating user
    var user_id = 0;
    $('.edit-btn').click(function(){
       user_id = $(this).attr('show-id');
       $("#e_state_no option:selected").removeAttr("selected");
       $("#e_state_assign").hide("fast");
       $.post(base_url+"home/ajaxShowUserInfo", {user_id:user_id}, function(data){
          var result = $.parseJSON(data);
          if (result.is_error) {
              alert(result.error_msg);
              $("#showModal").modal("hide");
              return;
          }
          
          // show state assignment
          if (result.user.admin == 0) {
              $("#e_state_assign").show("fast");
              $("#e_state_no").removeAttr("disabled");
              $.each(result.user.state_no_exploded, function(i, item) {
                  $("#e_state_no option[value='"+item+"']").attr("selected", "selected"); 
              });
          }
          
          $("#e_admin").val(result.user.admin).attr("selected", "selected");
          $("#e_full_name").val(result.user.full_name);
          $("#e_username").val(result.user.username);
          $("#e_password").val("");
          $("#e_c_password").val("");
          $("#n_password").val("");
          $("#edit-success-box").css("display", "none");
          $("#edit-error-box").css("display", "none");
       }).done(function(){
          $("#showModal").modal("show");
       });
       return false;
    });
    
    $("#edit-btn-modal").click(function(){
        if($("#n_password").val()!= $("#e_c_password").val()){
            $("#edit-error-box").css("display", "");
            $("#edit-error-box").html("<b>Error:</b> Password did not match.");
            $("#edit-success-box").css("display", "none");
        } else{
            $.post(base_url+"home/ajaxUpdateUser", {
                user_id:user_id,
                e_state_no:$("#e_state_no").val(),
                e_password:$("#e_password").val(),
                e_c_password:$("#e_c_password").val()
            }, function(data){
               var res = $.parseJSON(data);
               if (res.is_error) {
                   $("#edit-error-box").css("display", "");
                   $("#edit-error-box").html(res.error_msg);
                   $("#edit-success-box").css("display", "none");
               } else {
                   $("#edit-error-box").css("display", "none");
                   $("#edit-success-box").html("<b>Done!</b> User successfully updated.");
                   $("#edit-success-box").css("display", "");
                   
                   $("#e_password").val("");
                   $("#e_c_password").val("");
                   $("#n_password").val("");
                   setTimeout(function(){
                       $("#showModal").modal("hide");
                   }, 1500);
               }
            })
        }
    });
    // end show and updating user
});
