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


	var base_url = $("#hid-base-url").val();
	$("#btnGo").click(function(){

        var grade = $("#txtGrade").val();
        var trans_no = $("#hidTransNo").val();
        var grd = "grade" + grade;
        $.post(base_url+"client/pcs/getRate", {grade : grade, trans_no : trans_no}, function(data){

            var json_data = $.parseJSON(data);

            if(json_data.print){
                var td = "";
                var str = "<table class='table table-bordered table-condensed'>";
                var td_emp = "";
                var td_days = "";
                var td_hrs = "";
                var td_total = "";

                str += "<thead>";
                str += "<tr>";
                str += "<th></th>";

                if(json_data.print.normal){
                    str += "<th>Normal</th>";
                    td += "<td>"+json_data.ml.normal+"</td>";
                    td_emp += "<td><input type='text' class='input-mini txtNormal' id='txtNormal_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtNormal' id='txtNormal_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtNormal' id='txtNormal_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtNormal_total'/></td>";
                    normal = json_data.ml.normal;
                }
                if(json_data.print.early){
                    str += "<th>Early</th>";
                    td += "<td>"+json_data.ml.early+"</td>";
                    td_emp += "<td><input type='text' class='input-mini txtEarly' id='txtEarly_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtEarly' id='txtEarly_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtEarly' id='txtEarly_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtEarly_total'/></td>";
                    early = json_data.ml.early;
                }
                if(json_data.print.afternoon){
                    str += "<th>Afternoon</th>";
                    td += "<td>"+json_data.ml.afternoon+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txtAfternoon' id='txtAfternoon_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtAfternoon' id='txtAfternoon_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtAfternoon' id='txtAfternoon_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtAfternoon_total'/></td>";
                    afternoon = json_data.ml.afternoon;

                }
                if(json_data.print.night){
                    str += "<th>Night</th>";
                    td += "<td>"+json_data.ml.night+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txtNight' id='txtNight_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtNight' id='txtNight_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtNight' id='txtNight_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtNight_total'/></td>";
                    night = json_data.ml.night;
                }
                if(json_data.print._50_shift){
                    str += "<th>50% Shift</th>";
                    td += "<td>"+json_data.ml._50_shift+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txt50' id='txt50_shift_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txt50' id='txt50_shift_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txt50' id='txt50_shift_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txt50_shift_total'/></td>";
                    _50 = json_data.ml._50_shift;
                }
                if(json_data.print.t_14){
                    str += "<th>T 1/4</th>";
                    td += "<td>"+json_data.ml.T_14+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txtT_14' id='txtT_14_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtT_14' id='txtT_14_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtT_14' id='txtT_14_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtT_14_total'/></td>";
                    t_14 = json_data.ml.T_14;
                }
                if(json_data.print.t_12){
                    str += "<th>T 1/2</th>";
                    td += "<td>"+json_data.ml.T_12+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txtT_12' id='txtT_12_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtT_12' id='txtT_12_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtT_12' id='txtT_12_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtT_12_total'/></td>";
                    t_12 = json_data.ml.T_12;
                }
                if(json_data.print.double){
                    str += "<th>Double</th>";
                    td += "<td>"+json_data.ml.double+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txtDouble' id='txtDouble_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtDouble' id='txtDouble_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtDouble' id='txtDouble_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtDouble_total'/></td>";
                    _double = json_data.ml.double;
                }
                if(json_data.print.dt_12){
                    str += "<th>DT 1/2</th>";
                    td += "<td>"+json_data.ml.DT_12+"</td>";

                    td_emp += "<td><input type='text' class='input-mini txtDT_12' id='txtDT_12_emp'/></td>";
                    td_days += "<td><input type='text' class='input-mini txtDT_12' id='txtDT_12_days'/></td>";
                    td_hrs += "<td><input type='text' class='input-mini txtDT_12' id='txtDT_12_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtDT_12_total'/></td>";
                    dt_12 = json_data.ml.DT_12;
                }
                if(json_data.print.triple){
                    str += "<th>Triple</th>";
                    td += "<td>"+json_data.ml.triple+"</td>";

                    td_emp += "<td><input class='input-mini txtTriple' type='text' id='txtTriple_emp'/></td>";
                    td_days += "<td><input class='input-mini txtTriple' type='text' id='txtTriple_days'/></td>";
                    td_hrs += "<td><input class='input-mini txtTriple' type='text' id='txtTriple_hrs'/></td>";
                    td_total += "<td><input type='text' class='input-mini' id='txtTriple_total'/></td>";
                    triple = json_data.ml.triple;
                }

                str += "</tr>";
                str += "</thead>"

                str += "<tbody>";

                str += "<tr>";
                str += "<td>Labourpower Hourly Charge Rates</td>";
                str += td;
                str += "</tr>"

                str += "<tr>";
                str += "<td>Number of Employees</td>";
                str += td_emp;
                str += "</tr>"

                str += "<tr>";
                str += "<td>Number of Hours</td>";
                str += td_hrs;
                str += "</tr>"

                str += "<tr>";
                str += "<td>Number of Days</td>";
                str += td_days;
                str += "</tr>"

                str += "<tr>";
                str += "<td>Total</td>";
                str += td_total;
                str += "</tr>"

                str += "</tbody>"


                str += "</table>";

                str += "<input type='button' class='btn btn-primary' id='btnSaveForecast' value='Save'/>";
            } else {
                var str = "No records.";
            }
            $("#div").html(str);
        });

    });

    $(".txtNormal").live("keyup", function(){

        var total_normal = normal;
        var val;
        $.each($(".txtNormal"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
               val = 1;
            }
            total_normal = val * total_normal;
        });

        $("#txtNormal_total").val(total_normal.toFixed(2));
    });

    $(".txtEarly").live("keyup", function(){

        var total = early;
        var val;
        $.each($(".txtEarly"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtEarly_total").val(total.toFixed(2));
    });

    $(".txtAfternoon").live("keyup", function(){

        var total = afternoon;
        var val;
        $.each($(".txtAfternoon"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtAfternoon_total").val(total.toFixed(2));
    });

    $(".txtNight").live("keyup", function(){

        var total = night;
        var val;
        $.each($(".txtNight"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtNight_total").val(total.toFixed(2));
    });

    $(".txt50").live("keyup", function(){

        var total = _50;
        var val;
        $.each($(".txt50"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txt50_shift_total").val(total.toFixed(2));
    });

    $(".txtT_14").live("keyup", function(){

        var total = t_14;
        var val;
        $.each($(".txtT_14"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtT_14_total").val(total.toFixed(2));
    });

    $(".txtT_12").live("keyup", function(){

        var total = t_12;
        var val;
        $.each($(".txtT_12"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtT_12_total").val(total.toFixed(2));
    });

    $(".txtDouble").live("keyup", function(){

        var total = _double;
        var val;
        $.each($(".txtDouble"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtDouble_total").val(total.toFixed(2));
    });

    $(".txtDT_12").live("keyup", function(){

        var total = dt_12;
        var val;
        $.each($(".txtDT_12"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtDT_12_total").val(total.toFixed(2));
    });

    $(".txtTriple").live("keyup", function(){

        var total = triple;
        var val;
        $.each($(".txtTriple"), function(i, k){
            val = $(this).val();
            if($(this).val() == ""){
                val = 1;
            }
            total = val * total;
        });

        $("#txtTriple_total").val(total.toFixed(2));
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
