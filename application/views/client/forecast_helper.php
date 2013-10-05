<?php
function ifDesc($val_desc, $grade, $type)
{
    $desc = "Labourpower Hourly Charge Rates";
    if ($val_desc == $desc) {
        return $grade.'-'.$type;
    }

    return "";
}

function generate_tr($value, $print, $x, $grade)
{
    $color = "";
    $desc = $value["description"];
    $tr1 = "<tr><td>".$desc."</td>";
    $tr2 = "<tr><td>Number of Hours</td>";
    $tr3 = "<tr><td>Number of Employees</td>";
    $tr4 = "<tr><td>Total</td>";
    if ($x<=4):
        $color = "#FCF8E3";
    elseif ($x==14):
        $color = "#F2DEDE";
    endif;
    $x++;
    if ($print["normal"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "normal").'" style="background-color: '.$color.'">'.$value["normal"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-normal" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-normal" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-normal" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["early"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "early").'" style="background-color: '.$color.'">'.$value["early"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-early" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-early" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-early" readonly="true" type="text" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["afternoon"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "afternoon").'" style="background-color: '.$color.'">'.$value["afternoon"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-afternoon" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-afternoon" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-afternoon" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["night"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "night").'" style="background-color: '.$color.'">'.$value["night"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-night" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-night" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-night" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["50_shift"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "50_shift").'" style="background-color: '.$color.'">'.$value["50%Shift"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-50_shift" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-50_shift" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-50_shift" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["t_14"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "t_14").'" style="background-color: '.$color.'">'.$value["T1/4"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-t_14" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-t_14" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-t_14" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["t_12"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "t_12").'" style="background-color: '.$color.'">'.$value["T1/2"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-t_12" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-t_12" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-t_12" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["double"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "double").'" style="background-color: '.$color.'">'.$value["double"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-double" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-double" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-double" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["dt_12"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "dt_12").'" style="background-color: '.$color.'">'.$value["DT1/2"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-dt_12" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-dt_12" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-dt_12" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    if ($print["triple"]) {
        $tr1 .= '<td id="'.ifDesc($desc, $grade, "triple").'" style="background-color: '.$color.'">'.$value["triple"].'</td>';
        $tr2 .= '<td><input name="hour-'.$grade.'[]" id="hour-'.$grade.'-triple" type="text" class="input-mini hour" style="width:50px; font-size: 12px;"/></td>';
        $tr3 .= '<td><input name="emp-'.$grade.'[]" id="emp-'.$grade.'-triple" type="text" class="input-mini emp" style="width:50px; font-size: 12px;"/></td>';
        $tr4 .= '<td><input id="total-'.$grade.'-triple" readonly="true" type="text" class="input-mini" style="width:50px; font-size: 12px;"/></td>';
    }

    $tr1 .= "</tr>";

    return array($tr1, $tr2, $tr3, $tr4, $x);
}