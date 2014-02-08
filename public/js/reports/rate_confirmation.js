$(document).ready(function(){

    var normal = 1;
    var early = 1;
    var afternoon = 1;
    var night = 1;
    var _50 = 1;
    var t_14 = 1;
    var t_12 = 1;
    var _double = 1;
    var dt_12 = 1;
    var triple = 1;

    var grade_entered = [];
    
    var type;
    var grade;
    var x = 0;
    var z = 0;
    var base_url = $("#hid-base-url").val();
    
    var trans_name;
    var trans_no;
    
    $("#btnSave").click(function(){
        var arr_grade = [];
        var arr_emp = [];
        var arr_hrs = []
        var arr_days = [];
        var arr_type = [];
        var arr_data = [];
        
        $.each($(".grade"), function(){
            type = $(this).attr("typex");
            grade = $(this).attr("grade");
            
            arr_grade.push(grade);  
            arr_type.push(type);
            arr_data.push($(this).val());
        });
        
            
        $.post(base_url+"client/pcs/saveForecast", {grade : arr_grade, type : arr_type, data : arr_data, trans_no : trans_no, trans_name : trans_name}, function(data){
            
            if($.parseJSON(data)){
                $("#div-success").css("display", "");
                $("#div-error").css("display", "none");
        
                $("#div").html("");
                $("#cmbRate").removeAttr("disabled");
                $("#cmbRate").val("");
                $("#btnSave").attr("disabled", "disabled");
                $("#txtGrade").val("");
            } else {
                $("#div-error").css("display", "");
                $("#div").css("margin-top", "10px")
                $("#div-error").html("Database error.");
                
            }
            
        });
    });
    
    
    $("#btnReset").click(function(){
        grade_entered = [];
        $("#div").html("");
        $("#div_all").html("");
        $("#cmbRate").removeAttr("disabled");
        $("#btnSave").attr("disabled", "disabled");
        $("#txtGrade").val("");
        x = 0;
        z = 0;
        $("#div-error").css("display", "none");
        $("#div-success").css("display", "none");
    });
    
    $("#btnGo").click(function(){
        
        
        var grade = $("#txtGrade").val();
        $("#txtGrade").val("");
        trans_no = $("#cmbRate").val();
        var grd = "grade" + grade;
        trans_name = $("#cmbRate").find(":selected").attr("trans_name");
        
        if($("#cmbRate").val() == ""){
            return false;
        }
        
        $("#loadingModal").modal("show");
        $("#div-error").css("display", "none");
        if ($.inArray(grade, grade_entered) == -1){
            grade_entered.push(grade);
            $("#div").css("margin-top", "150px")
        } else {
            $("#loadingModal").modal("hide");
            $("#div-error").css("display", "");
            $("#div").css("margin-top", "10px")
            $("#div-error").html("Grade "+grade+" is already displayed.");
            return false;
        }
        
        $("#div-success").css("display", "none");
            
            
        $("#cmbRate").attr("disabled", "disabled");
        $("#btnSave").removeAttr("disabled");
        
        $.post(base_url+"client/pcs/getRate", {grade : grade, trans_no : trans_no}, function(data){

            var json_data = $.parseJSON(data);

            if(json_data.print){
                var td = "";
                var str = "<table class='table table-bordered table-condensed'>";
                var td_emp = "";
                var td_days = "";
                var td_hrs = "";
                var td_total = "";
                var th = "";
                var thx = "";
                str += "<thead>";
                str += "<tr>";
                str += "<th>Grade "+grade+"</th>";

                if(json_data.print.normal){
                    str += "<th>Normal</th>";
                    thx += "<th>Normal</th>";
                    td += "<td>"+json_data.ml.normal+"</td>";
                    td_emp += "<td><input type='hidden' class='txtNormal"+x+"' value='"+json_data.ml.normal+"'/>";  
                    td_emp+= "<input type='text' class='grade input-mini txtNormal txtNormal"+x+"' typex='emp' grade='"+grd+"' normal='txtNormal"+x+"' x='txtNormal_days"+x+"' id='txtNormal_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' class='grade input-mini txtNormal txtNormal"+x+"' grade='"+grd+"' typex='hrs' normal='txtNormal"+x+"' id='txtNormal_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' class='grade input-mini txtNormal txtNormal"+x+"' grade='"+grd+"' typex='days' normal='txtNormal"+x+"' x='txtNormal_emp"+x+"' y='txtNormal_hrs"+x+"' id='txtNormal_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtNormalx txtTotal_y txtTotal_y"+x+"' total_x='txtNormal_total' total='txtTotal_y"+x+"' id='txtNormal"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtNormal_total'/></td>";
                }
                if(json_data.print.early){
                    str += "<th>Early</th>";
                    thx += "<th>Early</th>";
                    td += "<td>"+json_data.ml.early+"</td>";
                    td_emp += "<td><input type='hidden' class='txtEarly"+x+"' value='"+json_data.ml.early+"'/>";  
                    td_emp+= "<input type='text' class='grade input-mini txtEarly txtEarly"+x+"' grade='"+grd+"' typex='emp' early='txtEarly"+x+"' x='txtEarly_hrs"+x+"' id='txtEarly_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' class='grade input-mini txtEarly txtEarly"+x+"' grade='"+grd+"' typex='hrs' early='txtEarly"+x+"' x='txtEarly_emp"+x+"' id='txtEarly_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' class='grade input-mini txtEarly txtEarly"+x+"' grade='"+grd+"' typex='days' early='txtEarly"+x+"' x='txtEarly_emp"+x+"' y='txtEarly_hrs"+x+"' id='txtEarly_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtEarlyx txtTotal_y txtTotal_y"+x+"' total_x='txtEarly_total' total='txtTotal_y"+x+"' early='txtEarly"+x+"' id='txtEarly"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtEarly_total'/></td>";
                }
                if(json_data.print.afternoon){
                    str += "<th>Afternoon</th>";
                    thx += "<th>Afternoon</th>";
                    td += "<td>"+json_data.ml.afternoon+"</td>";

                    td_emp += "<td><input type='hidden' class='txtAfternoon"+x+"' value='"+json_data.ml.afternoon+"'/>";  
                    td_emp+= "<input type='text' class='grade input-mini txtAfternoon txtAfternoon"+x+"' grade='"+grd+"' typex='emp' afternoon='txtAfternoon"+x+"' x='txtAfternoon_hrs"+x+"' id='txtAfternoon_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txtAfternoon txtAfternoon"+x+"' afternoon='txtAfternoon"+x+"' x='txtAfternoon_emp"+x+"' id='txtAfternoon_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txtAfternoon txtAfternoon"+x+"' afternoon='txtAfternoon"+x+"' x='txtAfternoon_emp"+x+"' y='txtAfternoon_hrs"+x+"' id='txtAfternoon_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtAfternoonx txtTotal_y txtTotal_y"+x+"' total_x='txtAfternoon_total' total='txtTotal_y"+x+"' id='txtAfternoon"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtAfternoon_total'/></td>";

                }
                if(json_data.print.night){
                    str += "<th>Night</th>";
                    thx += "<th>Night</th>";
                    td += "<td>"+json_data.ml.night+"</td>";

                    td_emp += "<td><input type='hidden' class='txtNight"+x+"' value='"+json_data.ml.night+"'/>";  
                    td_emp+= "<input type='text' grade='"+grd+"' typex='emp' class='grade input-mini txtNight txtNight"+x+"' night='txtNight"+x+"' x='txtNight_hrs"+x+"' id='txtNight_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txtNight txtNight"+x+"' night='txtNight"+x+"' x='txtNight_emp"+x+"' id='txtNight_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txtNight txtNight"+x+"' night='txtNight"+x+"' x='txtNight_emp"+x+"' y='txtNight_hrs"+x+"' id='txtNight_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtNightx txtTotal_y txtTotal_y"+x+"' total_x='txtNight_total' total='txtTotal_y"+x+"' id='txtNight"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtNight_total'/></td>";

                }
                if(json_data.print._50_shift){
                    str += "<th>50% Shift</th>";
                    thx += "<th>50% Shift</th>";
                    td += "<td>"+json_data.ml._50_shift+"</td>";

                    td_emp += "<td><input type='hidden' class='txt50"+x+"' value='"+json_data.ml._50_shift+"'/>";  
                    td_emp+= "<input type='text' grade='"+grd+"' typex='emp' class='grade input-mini txt50 txt50"+x+"' 50='txt50"+x+"' x='txt50_shift_hrs"+x+"' id='txt50_shift_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txt50 txt50"+x+"' 50='txt50"+x+"' x='txt50_shift_emp"+x+"' id='txt50_shift_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txt50 txt50"+x+"' 50='txt50"+x+"' x='txt50_shift_emp"+x+"' y='txt50_shift_hrs"+x+"' id='txt50_shift_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txt50x txtTotal_y txtTotal_y"+x+"' total_x='txt50_total' total='txtTotal_y"+x+"' id='txt50"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txt50_total'/></td>";
                    
                }
                if(json_data.print.t_14){
                    str += "<th>T 1/4</th>";
                    thx += "<th>T 1/4</th>";
                    td += "<td>"+json_data.ml.T_14+"</td>";

                    td_emp += "<td><input type='hidden' class='txtT_14"+x+"' value='"+json_data.ml.T_14+"'/>";  
                    td_emp+= "<input type='text' grade='"+grd+"' typex='emp' class='grade input-mini txtT_14 txtT_14"+x+"' T_14='txtT_14"+x+"' x='txtT_14_hrs"+x+"' id='txtT_14_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txtT_14 txtT_14"+x+"' T_14='txtT_14"+x+"' x='txtT_14_emp"+x+"' id='txtT_14_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txtT_14 txtT_14"+x+"' T_14='txtT_14"+x+"' x='txtT_14_emp"+x+"' y='txtT_14_hrs"+x+"' id='txtT_14_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtT_14x txtTotal_y txtTotal_y"+x+"' total_x='txtT_14_total' total='txtTotal_y"+x+"' id='txtT_14"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtT_14_total'/></td>";
                }
                if(json_data.print.t_12){
                    str += "<th>T 1/2</th>";
                    thx += "<th>T 1/2</th>";
                    td += "<td>"+json_data.ml.T_12+"</td>";

                    td_emp += "<td><input type='hidden' class='txtT_12"+x+"' value='"+json_data.ml.T_12+"'/>";  
                    td_emp+= "<input type='text' grade='"+grd+"' typex='emp' class='grade input-mini txtT_12 txtT_12"+x+"' T_12='txtT_12"+x+"' x='txtT_12_hrs"+x+"' id='txtT_12_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txtT_12 txtT_12"+x+"' T_12='txtT_12"+x+"' x='txtT_12_emp"+x+"' id='txtT_12_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txtT_12 txtT_12"+x+"'T_12='txtT_12"+x+"' x='txtT_12_emp"+x+"' y='txtT_12_hrs"+x+"' id='txtT_12_days"+x+"'/></td>";
                    td_total += "<td><input type='text'  class='input-mini txtT_12x txtTotal_y txtTotal_y"+x+"' total_x='txtT_12_total' total='txtTotal_y"+x+"' txtT_12_total"+x+"' id='txtT_12"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtT_12_total'/></td>";
                }
                if(json_data.print.double){
                    str += "<th>Double</th>";
                    thx += "<th>Double</th>";
                    td += "<td>"+json_data.ml.double+"</td>";

                    td_emp += "<td><input type='hidden' class='txtDouble"+x+"' value='"+json_data.ml.double+"'/>";  
                    td_emp+= "<input type='text' grade='"+grd+"' typex='emp' class='grade input-mini txtDouble txtDouble"+x+"' double='txtDouble"+x+"' x='txtDouble_days"+x+"' id='txtDouble_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txtDouble txtDouble"+x+"' double='txtDouble"+x+"' x='txtDouble_emp"+x+"' id='txtDouble_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txtDouble txtDouble"+x+"' double='txtDouble"+x+"' x='txtDouble_emp"+x+"'  y='txtDouble_hrs"+x+"' id='txtDouble_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtDoublex txtTotal_y txtTotal_y"+x+"' total_x='txtDouble_total' total='txtTotal_y"+x+"' id='txtDouble"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtDouble_total'/></td>";
                }
                if(json_data.print.dt_12){
                    str += "<th>DT 1/2</th>";
                    thx += "<th>DT 1/2</th>";
                    td += "<td>"+json_data.ml.DT_12+"</td>";

                    td_emp += "<td><input type='hidden' class='txtDT_12"+x+"' value='"+json_data.ml.DT_12+"'/>";  
                    td_emp+= "<input type='text' grade='"+grd+"' typex='emp' class='grade input-mini txtDT_12 txtDT_12"+x+"' DT_12='txtDT_12"+x+"' x='txtDT_12_hrs"+x+"' id='txtDT_12_emp"+x+"'/></td>";
                    td_hrs += "<td><input type='text' grade='"+grd+"' typex='hrs' class='grade input-mini txtDT_12 txtDT_12"+x+"' DT_12='txtDT_12"+x+"' x='txtDT_12_emp"+x+"' id='txtDT_12_hrs"+x+"'/></td>";
                    td_days += "<td><input type='text' grade='"+grd+"' typex='days' class='grade input-mini txtDT_12 txtDT_12"+x+"' DT_12='txtDT_12"+x+"' x='txtDT_12_emp"+x+"' y='txtDT_12_hrs"+x+"' id='txtDT_12_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtDT_12x txtTotal_y txtTotal_y"+x+"' total_x='txtDT_12_total' total='txtTotal_y"+x+"' id='txtDT_12"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtDT_12_total'/></td>";
                }
                if(json_data.print.triple){
                    str += "<th>Triple</th>";
                    thx += "<th>Triple</th>";
                    td += "<td>"+json_data.ml.triple+"</td>";

                    td_emp += "<td><input type='hidden' class='txtTriple"+x+"' value='"+json_data.ml.triple+"'/>";  
                    td_emp+= "<input grade='"+grd+"' typex='emp' class='grade input-mini txtTriple txtTriple"+x+"' triple='txtTriple"+x+"' type='text' x='txtTriple_hrs"+x+"' id='txtTriple_emp"+x+"'/></td>";
                    td_hrs += "<td><input grade='"+grd+"' typex='hrs' class='grade input-mini txtTriple txtTriple"+x+"' triple='txtTriple"+x+"' type='text' x='txtTriple_emp"+x+"' id='txtTriple_hrs"+x+"'/></td>";
                    td_days += "<td><input grade='"+grd+"' typex='days' class='grade input-mini txtTriple txtTriple"+x+"' triple='txtTriple"+x+"' type='text' x='txtTriple_emp"+x+"' y='txtTriple_hrs"+x+"' id='txtTriple_days"+x+"'/></td>";
                    td_total += "<td><input type='text' class='input-mini txtTriplex txtTotal_y txtTotal_y"+x+"' total_x='txtTriple_total' total='txtTotal_y"+x+"' txtTriple_total"+x+"' id='txtTriple"+x+"'/></td>";
                    th += "<td><input type='text' class='input-mini' id='txtTriple_total'/></td>";
                }

                str += "<th></th>";
                str += "</tr>";
                str += "</thead>"

                str += "<tbody>";

                // str += "<tr>";
                // str += "<td>Labourpower Hourly Charge Rates</td>";
                // str += td;
                // str += "<td></td>";
                // str += "</tr>"

                str += "<tr>";
                str += "<td>Number of Employees</td>";
                str += td_emp;
                str += "<td></td>";
                str += "</tr>"

                str += "<tr>";
                str += "<td>Number of Hours</td>";
                str += td_hrs;
                str += "<td></td>";
                str += "</tr>"

                str += "<tr>";
                str += "<td>Number of Days</td>";
                str += td_days;
                str += "<td></td>";
                str += "</tr>"

                str += "<tr>";
                str += "<td>Total</td>";
                str += td_total;
                str += "<td><input type='text' id='txtTotal_y"+x+"0' class='input-mini txtTotal_xy'/></td>";
                str += "</tr>"

                str += "</tbody>"


                str += "</table>";

                // str += "<input type='button' class='btn btn-primary' id='btnSaveForecast' value='Save'/>";
                
                if(x==1){
                    var str1 = "";
                    str1 += "<table  class='table table-bordered table-condensed'>";
                    str1 += "<thead>";
                    str1 += "<tr>";
                    str1 += "<th>All Grades</th>";
                    str1 += thx;
                    str1 += "<th>Total</th>";
                    str1 += "</tr>";
                    str1 += "</thead>"
                    str1 += "<tbody>";
                    str1 += "<tr>";
                    str1 += "<td>Total</td>";
                    str1 += th;
                    str1 += "<td><input type='text' id='txtTotal_xy' class='input-mini'/></td>";
                    str1 += "</tr>";
                    str1 += "</tbody>";
                    str1 += "</table>";
                    $("#div_all").append(str1);
                }

               
            } else {
                var str = "No records.";
            }
            
            $("#div").append(str);
            $("#loadingModal").modal("hide");
            x++;
        });
        
    });

    $(".txtNormalx").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtNormalx", attr);                 
    });
    
    $(".txtEarlyx").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtEarlyx", attr);                  
    });
    
    $(".txtAfternoonx").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtAfternoonx", attr);                  
    });
    
    $(".txtNightx").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtNightx", attr);                  
    });
    
    $(".txt50x").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txt50x", attr);                 
    });
    
    $(".txtT_14x").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtT_14x", attr);                   
    });
    
    $(".txtT_12x").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtT_12x", attr);                   
    });
    
    $(".txtDT_12x").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtDT_12x", attr);                  
    });
    
    $(".txtDoublex").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtDoublex", attr);                 
    });
    
    $(".txtTriplex").live("change", function(){
        var attr = $(this).attr("total_x");
        computeTotal_x("txtTriplex", attr);                 
    });
    
    $(".txtTotal_y").live("change", function(){
        var attr = $(this).attr("total");
        computeTotal_y(attr);                   
    });
    
    $(".txtTotal_xy").live("change", function(){
        var attr = $(this).attr("total");
        computeTotal_xy();                   
    });
    
    $(".txtNormal").live("keyup", function(){

        var attr = $(this).attr("normal");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();  
        $(".txtNormal").change();
        $(".txtTotal_xy").change();
        
                        
    });

    $(".txtEarly").live("keyup", function(){

        var attr = $(this).attr("early");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtEarlyx").change();
         $(".txtTotal_xy").change();
    });

    $(".txtAfternoon").live("keyup", function(){

        var attr = $(this).attr("afternoon");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtAfternoonx").change();
         $(".txtTotal_xy").change();
    });

    $(".txtNight").live("keyup", function(){

        var attr = $(this).attr("night");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtNightx").change();
    });

    $(".txt50").live("keyup", function(){

        var attr = $(this).attr("50");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txt50x").change();
    });

    $(".txtT_14").live("keyup", function(){

        var attr = $(this).attr("T_14");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtT_14x").change();
        $(".txtTotal_xy").change();
    });

    $(".txtT_12").live("keyup", function(){

        var attr = $(this).attr("T_12");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtT_12x").change();
        $(".txtTotal_xy").change();
    });

    $(".txtDT_12").live("keyup", function(){

        var attr = $(this).attr("DT_12");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtDT_12x").change();
        $(".txtTotal_xy").change();
    });

    $(".txtDouble").live("keyup", function(){

        var attr = $(this).attr("double");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtDoublex").change();
        $(".txtTotal_xy").change();
    });


    $(".txtTriple").live("keyup", function(){

        var attr = $(this).attr("triple");
        var id = $(this).attr("id");
        var xy = $(this).attr("x");
        var y = $(this).attr("y");
        compute(attr, id, xy, y);
        $(".txtTotal_y").change();
        $(".txtTriplex").change();
        $(".txtTotal_xy").change();
    });

    

    $("#btn-search").click(function(){
        
        var search = $("#search").val();
        
        $.post(base_url+"reports/rate_confirmation/search_award",{search:search}, function(data){
            
            var json_data = $.parseJSON(data);
            
            var str;
            str = '<table class="table table-bordered table-striped" id="award-table" style="margin-top: 15px;">';
            str = str + '<thead>';
            str = str + '<tr>';
            str = str + '<th>Modern Award No</th>';
            str = str + '<th>Modern Award Name</th>';
            str = str + '<th>Date Created</th>';
            str = str + '<th>Action</th>';
            str = str + '</tr>';
            str = str + '</thead>';
            str = str + '<tbody>';
            if(json_data.length>0){
                $.each(json_data, function(i, item){
                    str = str + '<tr>';
                    str = str + '<td>'+item.modern_award_no+'</td>';
                    str = str + '<td>'+item.transaction_name+'</td>';
                    str = str + '<td>'+item.created_at+'</td>';
                    str = str + '<td>';
                    str = str + '<a target="_blank" class="btn edit-award-btn" href="'+base_url+'reports/rate_confirmation/print_modern/'+item.trans_no+'/'+item.modern_award_no+'">';
                    str = str + '<i class="icon-print"></i></a>';
                    str = str + '</td>';
                    str = str + '</tr>';
                
                });
            } else {
                str = str + '<tr>';
                str = str + '<td colspan="4">Empty Record</td>';
                str = str + '</tr>';
            }
            str = str + '</tbody>';
            str = str + '</table>';
        
            $("#div").html(str);
        });
    });
    
    $("#btn-search-client").click(function(){
        
        var search = $("#search").val();
        
        $.post(base_url+"reports/rate_confirmation/search_client",{search:search}, function(data){
            
            var json_data = $.parseJSON(data);
            
            var str;
            str = '<table class="table table-bordered table-striped" id="award-table" style="margin-top: 15px;">';
            str = str + '<thead>';
            str = str + '<tr>';
            str = str + '<th>Trans No</th>';
            str = str + '<th>Modern Award Name</th>';
            str = str + '<th>Date Created</th>';
            str = str + '<th>Action</th>';
            str = str + '</tr>';
            str = str + '</thead>';
            str = str + '<tbody>';
            if(json_data.length>0){
                $.each(json_data, function(i, item){
                    str = str + '<tr>';
                    str = str + '<td>'+item.trans_no+'</td>';
                    str = str + '<td>'+item.transaction_name+'</td>';
                    str = str + '<td>'+item.created_at+'</td>';
                    str = str + '<td>';
                    str = str + '<a target="_blank" class="btn edit-award-btn" href="'+base_url+'reports/rate_confirmation/print_client/'+item.trans_no+'">';
                    str = str + '<i class="icon-print"></i></a>';
                    str = str + '</td>';
                    str = str + '</tr>';
                
                });
            } else {
                str = str + '<tr>';
                str = str + '<td colspan="4">Empty Record</td>';
                str = str + '</tr>';
            }
            str = str + '</tbody>';
            str = str + '</table>';
        
            $("#div").html(str);
        });
    });
    
});

function computeTotal_y(attr){
    
    var total = 0;
    $.each($("."+attr), function(i, k){
        val = $(this).val();
        if($(this).val() == ""){
           val = 0;
        }
        total = parseFloat(val) + total;
    });
    
    $("#"+attr+"0").val(total.toFixed(2));
    
}

function computeTotal_x(_class, attr){
    
    var total = 0;
    $.each($("."+_class), function(i, k){
        val = $(this).val();
        if($(this).val() == ""){
           val = 0;
        }
        total = parseFloat(val) + total;
    });
    $("#"+attr).val(total.toFixed(2));
    
}

function computeTotal_xy(){
    
    var total = 0;
    $.each($(".txtTotal_xy"), function(i, k){
        val = $(this).val();
        if($(this).val() == ""){
           val = 0;
        }
        total = parseFloat(val) + total;
    });
    $("#txtTotal_xy").val(total.toFixed(2));
    
}

function compute(x, id, xy, y){
    
    var total = 1;
    $.each($("."+x), function(i, k){
        val = $(this).val();
        if($(this).val() == ""){
           val = 1;
        }
        total = val * total;
    });
    if(y==undefined){
        if ($("#"+xy).val() != "" && $("#"+id).val() != ""){
            $("#"+x).val(total.toFixed(2));
        } else {
            $("#"+x).val("");
        }
    } else {
        if ($("#"+xy).val() != "" && $("#"+y).val() != ""){
            $("#"+x).val(total.toFixed(2));
        } else {
            $("#"+x).val("");
        }       
    }
}

