function computeTotalForecast(grade, type)
{
    var hourly_rate = parseFloat($("#"+grade+"-"+type).html()).toFixed(2);
    var no_of_hours = parseInt($("#hour-"+grade+"-"+type).val());
    var no_of_emp   = parseInt($("#emp-"+grade+"-"+type).val());

    if (no_of_hours <= 0 || isNaN(no_of_hours)) {
        no_of_hours = 1;
    }

    if (no_of_emp <= 0 || isNaN(no_of_emp)) {
        no_of_emp = 1;
    }

    // computation
    var total = hourly_rate * no_of_hours * no_of_emp;

    if (isNaN(total)) {
        total = 0;
    }

    $("#total-"+grade+"-"+type).val(parseFloat(total).toFixed(2));
}

$(".hour").keyup(function(){
    var id = $(this).attr("id");
    var tmp = id.split("-");

    computeTotalForecast(tmp[1], tmp[2]);
})

$(".emp").keyup(function(){
    var id = $(this).attr("id");
    var tmp = id.split("-");

    computeTotalForecast(tmp[1], tmp[2]);
})

