$(document).ready(function(){
   var base_url = $("#base_url").val();
   
   $('#datetimepicker').datetimepicker({
      pickTime: false,
      format: "dd/MM/yyyy"
   });
   
   // adding
   $("#add-new-rate").click(function(){
       $("#new-rate").show("fast");
   });
   
   $("#close-add-form").click(function(){
      $("#error_div").fadeOut("fast");
      $("#new-rate").hide("fast"); 
   });
   
   $("#btn-add").click(function(){
      if ($("#trans_no").val() == "" || $("#created_at").val() == "") {
          $("#error_div").html("<b>Error!</b> Please fill up mandatory fields");
          $("#error_div").fadeIn("fast");
          
          return false;
      }
   });
   // end adding
});
