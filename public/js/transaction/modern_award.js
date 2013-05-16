$(document).ready(function(){
    var base_url = $("#base_url").val();
    
    function inputNumbers(event)
    {
        if (
            event.keyCode == 190 || 
            event.keyCode == 8 || 
            event.keyCode == 9 || 
            event.keyCode == 27 || 
            event.keyCode == 13 || 
            (event.keyCode >=48 && event.keyCode <= 57)
            ) {
            return;
        } else {
            event.preventDefault(); 
        }
    }
    
    $(".txt, #payrate_1, #payrate_2, #payrate_3, #payrate_4, #payrate_5, #payrate_6, #payrate_7, #payrate_8, #payrate_9, #payrate_10").keydown(function(evt){
        inputNumbers(evt);
    });
    
    // search    
    $("#search-award").keypress(function(evt){
        if(evt.which==13){
            $("#btn-search-award").click();
        }
    });
    
    $("#btn-search-award").live("click" ,function(){
        $("#div-success").css("display", "none");
        $.post(base_url+"transactions/ajaxSearchAward", 
            {key:$("#search-award").val()}, function(data){
             var result = $.parseJSON(data);
             var str = "";
             
             if (!result.is_error) {
                 str = str + "<table class='table table-striped table-bordered' id='award-table' style='margin-top: 15px;'>";
                 str = str + "<thead>"
                 str = str + "<tr>";
                 str = str + "<th>Modern Award No</th>";
                 str = str + "<th>Modern Award Name</th>";
                 str = str + "<th>Date Created</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "</thead>";
                 str = str + "<tbody>";
                 $.each(result, function(i, item){
                     str = str + "<tr>";
                     str = str + "<td>"+item.modern_award_no+"</td>";
                     str = str + "<td>"+item.modern_award_name+"</td>";
                     str = str + "<td>"+item.created_at+"</td>";
                     str = str + "<td><button type='button' class='btn edit-award-btn' edit-id='"+item.modern_award_no+"'>";
                     str = str + "<i class='icon-edit'></i></button> ";
                     str = str + "<button type='button' class='btn btn-danger delete-award-btn' del-id='"+item.modern_award_no+"'>";
                     str = str + "<i class='icon-trash icon-white'></i>";
                     str = str + "</button></td>";
                     str = str + "</tr>";
                 });
                 str = str + "<tbody>";
                 str = str + "</table>";
             } else {
                 str = str + "<table class='table table-striped table-bordered' style='margin-top: 15px;'>";
                 str = str + "<tr>";
                 str = str + "<th>Modern Award No</th>";
                 str = str + "<th>Modern Award Name</th>";
                 str = str + "<th>Date Created</th>";
                 str = str + "<th>Action</th>";
                 str = str + "</tr>";
                 str = str + "<tr>";
                 str = str + "<td colspan='4'>";
                 str = str + "No results found.";
                 str = str + "</td>";
                 str = str + "</tr>";
                 str = str + "</table>";
             }
             
             $("#modern-body").html(str);
             $("#award-table").tablesorter();

        });
    });
    
    // end searh
    
    // show add modern award form, tabs
    $("#add-new-modern").click(function(){
        $(this).hide("fast");
        $("input:text").val("");
        $("#m_allow_text").val("MARGIN FOR M ALLOWANCE");
        $("#allowance_txt").val("STANDARD RATE FOR CALS :");
        $("#allowcap").val("%");
        $.post(base_url+"transactions/ajaxGetNextAwardNo", {}, function(data){
            res = $.parseJSON(data);
            $("#modern_award_no").val(res.next_id);
        })
        $("#modern-body").hide("fast");
        $("#search-modern").hide("fast");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
    });
    
    $("#show-tab-1").click(function(){
        $(this).parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#tab1").show("fast");
        $("#tab2, #tab3, #tab4").hide("fast");
        $(document).scrollTop(0);
        return false;
    });
    
    $("#show-tab-2").click(function(){
        $(this).parent().addClass("active");
        $("#show-tab-1, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#tab2").show("fast");
        $("#tab1, #tab3, #tab4").hide("fast");
        $(document).scrollTop(0);
        return false;
    });
    
    $("#show-tab-3").click(function(){
        $(this).parent().addClass("active");
        $("#show-tab-1, #show-tab-2, #show-tab-4").parent().removeClass("active");
        $("#tab3").show("fast");
        $("#tab1, #tab2, #tab4").hide("fast");
        $(document).scrollTop(0);
        return false;
    });
    
    $("#show-tab-4").click(function(){
        $(this).parent().addClass("active");
        $("#show-tab-1, #show-tab-2, #show-tab-3").parent().removeClass("active");
        $("#tab4").show("fast");
        $("#tab1, #tab2, #tab3").hide("fast");
        $(document).scrollTop(0);
        return false;
    });
    
    $("#close-modern-form").click(function(){
        $("#nav-tabs, #tab4, #tab1, #tab2, #tab3").hide("fast");
        $("#add-new-modern").show("fast");
        $("#modern-body").show("fast");
        $("#search-modern").show("fast");
    });
    // end show add modern award form, tabs
    
    // edit
    $(".edit-award-btn").click(function(){
        $(document).scrollTop(0);
        var edit_id = $(this).attr("edit-id");
        $("#modern-body").hide("fast");
        $("#search-modern").hide("fast");
        $("#show-tab-1").parent().addClass("active");
        $("#show-tab-2, #show-tab-3, #show-tab-4").parent().removeClass("active");
        $("#nav-tabs").show("fast");
        $("#tab1").show("fast");
        $("#frm-modern").attr("action", base_url+"transactions/update");
        $("#modern_award_no").val(edit_id);
        $("#btn-save-update").attr("value", "UPDATE");
        $.post(base_url+"transactions/getAwardInfo", {award_no:edit_id}, function(data){
           res = $.parseJSON(data);
           if (res.status) {
               // modern award
               $("#modern_award_name").val(res.award_info.modern_award_name);
               $("#B_26").val(res.award_info.B_26);
               $("#B_27").val(res.award_info.B_27);
               $("#B_28").val(res.award_info.B_28);
               $("#B_29").val(res.award_info.B_29);
               $("#B_30").val(res.award_info.B_30);
               $("#B_31").val(res.award_info.B_31);
               $("#B_32").val(res.award_info.B_32);
               $("#B_33").val(res.award_info.B_33);
               $("#B_34").val(res.award_info.B_34);
               $("#B_35").val(res.award_info.B_35);
               $("#B_36").val(res.award_info.B_36);
               $("#B_37").val(res.award_info.B_37);
               $("#B_38").val(res.award_info.B_38);
               $("#B_51").val(res.award_info.B_51);
               $("#B_52").val(res.award_info.B_52);
               $("#B_53").val(res.award_info.B_53);
               $("#B_54").val(res.award_info.B_54);
               $("#B_55").val(res.award_info.B_55);
               $("#B_56").val(res.award_info.B_56);
               $("#B_59").val(res.award_info.B_59);
               $("#B_60").val(res.award_info.B_60);
               $("#B_61").val(res.award_info.B_61);
               $("#B_62").val(res.award_info.B_62);
               $("#B_63").val(res.award_info.B_63);
               $("#B_64").val(res.award_info.B_64);
               $("#B_65").val(res.award_info.B_65);
               $("#B_66").val(res.award_info.B_66);
               $("#B_67").val(res.award_info.B_67);
               $("#B_68").val(res.award_info.B_68);
               $("#B_69").val(res.award_info.B_69);
               $("#C_52").val(res.award_info.C_52);
               $("#C_53").val(res.award_info.C_53);
               $("#C_54").val(res.award_info.C_54);
               $("#C_55").val(res.award_info.C_55);
               $("#C_56").val(res.award_info.C_56);
               $("#C_57").val(res.award_info.C_57);
               $("#payrate_1").val(res.award_info.payrate_1);
               $("#payrate_2").val(res.award_info.payrate_2);
               $("#payrate_3").val(res.award_info.payrate_3);
               $("#payrate_4").val(res.award_info.payrate_4);
               $("#payrate_5").val(res.award_info.payrate_5);
               $("#payrate_6").val(res.award_info.payrate_6);
               $("#payrate_7").val(res.award_info.payrate_7);
               $("#payrate_8").val(res.award_info.payrate_8);
               $("#payrate_9").val(res.award_info.payrate_9);
               $("#payrate_10").val(res.award_info.payrate_10);
               $("#allowance_caption1").val(res.award_info.allowance_caption1);
               $("#allowance_caption2").val(res.award_info.allowance_caption2);
               $("#allowance_caption3").val(res.award_info.allowance_caption3);
               $("#allowance_caption4").val(res.award_info.allowance_caption4);
               $("#allowance_caption5").val(res.award_info.allowance_caption5);
               $("#allowance_rate1").val(res.award_info.allowance_rate1);
               $("#allowance_rate2").val(res.award_info.allowance_rate2);
               $("#allowance_rate3").val(res.award_info.allowance_rate3);
               $("#allowance_rate4").val(res.award_info.allowance_rate4);
               $("#allowance_rate5").val(res.award_info.allowance_rate5);
               $("#m_allow_margin").val(res.award_info.m_allow_margin);
               // end modern award
               
               // print defaults
               $("#grade1").prop("checked", parseInt(res.prints.grade1));   
               $("#grade2").prop("checked", parseInt(res.prints.grade2));   
               $("#grade3").prop("checked", parseInt(res.prints.grade3));   
               $("#grade4").prop("checked", parseInt(res.prints.grade4));   
               $("#grade5").prop("checked", parseInt(res.prints.grade5));   
               $("#grade6").prop("checked", parseInt(res.prints.grade6));   
               $("#grade7").prop("checked", parseInt(res.prints.grade7));   
               $("#grade8").prop("checked", parseInt(res.prints.grade8));   
               $("#grade9").prop("checked", parseInt(res.prints.grade9));   
               $("#grade10").prop("checked", parseInt(res.prints.grade10));
               $("#normal").prop("checked", parseInt(res.prints.normal));
               $("#early").prop("checked", parseInt(res.prints.early));
               $("#afternoon").prop("checked", parseInt(res.prints.afternoon));
               $("#night").prop("checked", parseInt(res.prints.night));
               $("#50_shift").prop("checked", parseInt(res.prints.fifty_shift));
               $("#t_14").prop("checked", parseInt(res.prints.t_14));
               $("#t_12").prop("checked", parseInt(res.prints.t_12));
               $("#double").prop("checked", parseInt(res.prints.doubles));
               $("#dt_12").prop("checked", parseInt(res.prints.dt_12)); 
               $("#triple").prop("checked", parseInt(res.prints.triple));
               $("#p_normal_time").prop("checked", parseInt(res.prints.p_normal_time));
               $("#p_time_and_half").prop("checked", parseInt(res.prints.p_time_and_half));
               $("#p_double_time").prop("checked", parseInt(res.prints.p_double_time));
               $("#p_double_and_half").prop("checked", parseInt(res.prints.p_double_and_half));
               $("#p_triple").prop("checked", parseInt(res.prints.p_triple));
               $("#p_day").prop("checked", parseInt(res.prints.p_day));
               $("#p_early").prop("checked", parseInt(res.prints.p_early));
               $("#p_afternoon").prop("checked", parseInt(res.prints.p_afternoon));
               $("#p_night").prop("checked", parseInt(res.prints.p_night));
               $("#p_half").prop("checked", parseInt(res.prints.p_half));
               $("#p_t_14").prop("checked", parseInt(res.prints.p_t_14));
               $("#calculator").val(res.prints.p_t_14);
               $("#print_company_no").val(res.prints.print_company_no).attr("selected", "selected");
               $("#calculator").val(res.prints.calculator);
               // end print defaults
           } else {
               alert("Database Error.")
           }
        });
    });
    // end edit
    
    // delete modern award
    var award_no_del;
    $(".delete-award-btn").click(function(){
       award_no_del = $(this).attr("del-id");
       remove_row = $(this).parent().parent();
       $("#deleteModal").modal("show"); 
    });
    
    $("#delete-award-btn-modal").click(function(){
        $.post(base_url+"transactions/delete", {del_id:award_no_del}, function(data){
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
    // end delete modern award
    
    // allowance computation
    
    $("#B_51, #allowance_rate1").change(function(){
        compute_allow("#allowance_rate1", "#B_52");
    });
    
    $("#B_51, #allowance_rate2").change(function(){
        compute_allow("#allowance_rate2", "#B_53");
    });
    
    $("#B_51, #allowance_rate3").change(function(){
        compute_allow("#allowance_rate3", "#B_54");
    });
    
    $("#B_51, #allowance_rate4").change(function(){
        compute_allow("#allowance_rate4", "#B_55");
    });
    
    $("#B_51, #allowance_rate5").change(function(){
        compute_allow("#allowance_rate5", "#B_56");
    });
    
    function compute_allow(allow_rate, b){
        
        var rate = parseFloat($("#B_51").val()).toFixed(2);
        var first_aid = parseFloat($(allow_rate).val()).toFixed(2);
        
        var allow = (first_aid / 100) * rate;
        if($("#B_51").val() != "" && $(allow_rate).val() != ""){
            $(b).val(allow.toFixed(2));
        }
    }
    
    // end allowance
    
    // table sorter
    $("#award-table").tablesorter();
    
});
