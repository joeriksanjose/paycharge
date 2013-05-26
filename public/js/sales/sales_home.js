$(document).ready(function(){
   var base_url = $("#base_url").val();
   
   $()
   
   // search client
   $("#search-input").keydown(function(event){
      if (event.keyCode == 13) {
           $("#search-btn").click();
      } 
   });
   
   $("#search-btn").live("click", function(){
       var key = $("#search-input").val();
       loading = "<tr><td colspan='5'>";
       loading = loading + "<div style='height: 10px' class='progress progress-success progress-striped active'>";
       loading = loading + "<div class='bar' style='width: 100%'></div>";
       loading = loading + "</div>";
       loading = loading + "</td></tr>";
       $("#clients-tbody").html(loading);
       $.post(base_url+"sales/home/ajaxSearchClient", {key:key}, function(data){
           result = "";
           json = $.parseJSON(data);
           if (json.is_found) {
               $.each(json.result, function(i, item){
                   result = result + "<tr>";
                   result = result + "<td>" + item.company_name + "</td>";
                   result = result + "<td>" + item.department + "</td>";
                   result = result + "<td>" + item.state_name + "</td>";
                   result = result + "<td>";
                   result = result + "<button type='button' class='btn btn-mini show-info' show-id='"+ item.client_no +"'>Info</button>";
                   result = result + "<button type='button' class='btn btn-mini'>Contacts</button>";
                   result = result + "</td>";
                   result = result + "</tr>"; 
               });
           } else {
               result = result + "<tr>";
               result = result + "<td colspan='5'>No results found</td>"; 
               result = result + "</tr>";
           }
           
           $("#clients-tbody").html(result);
       });
   });
   // end search client
   
   // show client info
   $(".show-info").click(function(){
       var show_id = $(this).attr("show-id");
       $.post(base_url+"sales/home/ajaxShowClientInformation", {client_no:show_id}, function(data){
           json = $.parseJSON(data);
           if (json.is_found) {
               $("#s_company_no").html(json.result.client_no);
               $("#s_company_name").html(json.result.company_name);
               $("#s_add1").html(json.result.address_line1);
               $("#s_add2").html(json.result.address_line2);
               $("#s_c_firstname").html(json.result.contact_first_name);
               $("#s_c_fullname").html(json.result.contact_full_name);
               $("#s_c_title").html(json.result.contact_title);
               $("#s_state_name").html(json.result.state_name);
           } else {
               alert("Database Error!");
           }
       });
       $("#showClientModal").modal("show");  
   });
   // end show client info
    
});
