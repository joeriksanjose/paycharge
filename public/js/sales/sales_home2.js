$(document).ready(function(){
    
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
      
});