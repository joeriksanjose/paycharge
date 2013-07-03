$(document).ready(function(){
   var base_url = $("#base_url").val();
   
   $("#btn-add").click(function(){
        if($("#error_div").css("display") == "block"){
            return false;
        }   
    });
    
    $("#trans_no").keyup(function(){
        $.post(base_url+"transactions/checkRateTransno", {trans_no:$(this).val()}, function(data){
            var json_data = $.parseJSON(data);
            
            if(json_data.status == 0){
                $("#error_div").css("display", "block");
                $("#success_div").css("display", "none");
                $("#error_div").html(json_data.status_msg);
            } else {
                $("#error_div").css("display", "none");
            }
        });
    });
   
   
   
   
   $('#datetimepicker').datetimepicker({
      pickTime: false,
      format: "dd/MM/yyyy"
   });
   
   // adding
   $("#add-new-rate").click(function(){
       $("#frm-new-rate").attr("action", base_url+"transactions/saveRate");
       $(this).hide("fast");
       $("#new-rate").show("fast");
       trans_no = $("#trans_no").val();
       $("input:text").val("");
       $("#trans_no").val(trans_no);
   });
   
   $("#close-add-form").click(function(){
      $("#error_div").fadeOut("fast");
      $("#new-rate").hide("fast"); 
      $("#add-new-rate").show("fast");
   });
   
   $("#btn-add").click(function(){
      if ($("#trans_no").val() == "" || $("#created_at").val() == "") {
          $("#error_div").html("<b>Error!</b> Please fill up mandatory fields");
          $("#error_div").fadeIn("fast");
          
          return false;
      }
   });
   // end adding
   
   // deleting
   var del_id;
   $(".btn-delete-rate").click(function(){
      del_id = $(this).attr("del-id");
      remove_row = $(this).parent().parent();
      $("#deleteModal").modal();
   });
   
   $("#delete-btn-modal").click(function(){
      $.post(base_url+"transactions/ajaxDeleteRate", {del_id:del_id}, function(data){
        res = $.parseJSON(data);
        if (res.status) {
            remove_row.fadeOut("slow", function(){
               $(this).remove(); 
            });
        } else {
            alert("Database Error");
        }
        
        $("#deleteModal").modal("hide");
      });
   });
   // end deleting
   
   // editing
   $(".btn-edit").click(function(){
       edit_id = $(this).attr("edit-id");
       $("#hid-edit-id").val(edit_id);
       $(document).scrollTop(0);
       $("#new-rate").show("fast");
       $("#add-new-rate").hide("fast");
       $.post(base_url+"transactions/ajaxGetRateInfo", {edit_id:edit_id}, function(data){
          res = $.parseJSON(data);
          if (res.status) {
              $("#frm-new-rate").attr("action", base_url+"transactions/updateRate");
              $("#btn-add").html("Update rate");
              $("#created_at").val(res.rate_info.created_at);
              $("#trans_no").val(res.rate_info.trans_no);
              $("#rate_1").val(res.rate_info.rate_1);
              $("#rate_2").val(res.rate_info.rate_2);
              $("#rate_3").val(res.rate_info.rate_3);
              $("#rate_4").val(res.rate_info.rate_4);
              $("#rate_5").val(res.rate_info.rate_5);
              $("#rate_6").val(res.rate_info.rate_6);
              $("#rate_7").val(res.rate_info.rate_7);
              $("#rate_8").val(res.rate_info.rate_8);
              $("#rate_9").val(res.rate_info.rate_9);
              $("#rate_10").val(res.rate_info.rate_10);
          }
       });
   });
   // end editing
});
