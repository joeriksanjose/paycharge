$(document).ready(function(){
    var base_url = $("#base_url").val();
    
    $('#datetimepicker').datetimepicker({
        pickTime: false,
        format: "dd/MM/yyyy"
    });
    
    // show clients list
    $(".state-link").click(function(){
        var state_name = $(this).attr("state-name");
        if ($(this).children("i").attr("class") == "icon-chevron-right pull-right") {
            $("a.state-link").each(function(){
                if ($(this).children("i").attr("class") == "icon-chevron-down pull-right") {
                    $(this).children("i").attr("class", "icon-chevron-right pull-right")
                    $("#"+$(this).attr("state-name")).slideUp("fast");
                }
            });
            $(this).children("i").attr("class", "icon-chevron-down pull-right")
            $("#"+state_name).slideDown("fast");
        } else {
            $(this).children("i").attr("class", "icon-chevron-right pull-right")
            $("#"+state_name).slideUp("fast");
        }
        return false;
    });
    
    // search client
    $("#search-input").keydown(function(event){
        if (event.keyCode == 13) {
           $("#search-btn").click();
        } 
    });
    
    $("#search-btn").live("click", function(){
       var key = $("#search-input").val();
       loading = "<div style='height: 10px' class='progress progress-info progress-striped active'>";
       loading = loading + "<div class='bar' style='width: 100%'></div>";
       loading = loading + "</div>";
       $("#search-result").html(loading);
       $.post(base_url+"sales/home/ajaxSearchClient", {key:key}, function(data){
           result = '<ul class="nav nav-tabs nav-stacked">';
           json = $.parseJSON(data);
           if (json.is_found) { 
               $.each(json.result, function(i, item){
                   result = result + '<li><a href="'+base_url+'sales/home/view/'+item.client_no+'">';
                   result = result + item.company_name;
                   result = result + '</br>';
                   result = result + item.client_no;
                   result = result + '</li></a>';
               });
           } else {
               result = result + '<li>No results found.</li>';
           }
           
           result = result + '</ul>';
           $("#search-result").html(result);
       });
   });
   // end search client
});