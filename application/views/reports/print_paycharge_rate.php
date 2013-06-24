<?php echo $header;?>

<div class="topmargin" style="margin-top: 50px;"></div>
<div class="row">
    
    <p>Thank you for giving <?php echo $company?> the opportunity to provide you with this quotation for the supply of Labour Hire and Recruitment Services.</p>
    <p><b>Labour Hire Services</b></p>
    <p><?php echo $company?>’s Casual Staff are remunerated according to an appropriate industrial instrument. The following pay and charge rate schedules have been created using the:</p>
    
    
    <p><b><?php echo $modern["modern_award_name"]?></b></p>
    <p>All terms and conditions that apply to this industrial instrument are required to be paid to <?php echo $company?> Casual Staff, therefore any related entitlements or allowances are
    to be charged to your organisation. The following conditions are applied to payments using the above mentioned instrument:</p>
    
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Rule for Application</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td>Normal / Ordinary Time Hours</td>
                <td><?php echo number_format($modern["B_26"], 2, ".", "")?></td>
            </tr>
            <tr>
                <td>How We Will Calculate Normal Hours</td>
                <td><?php echo $charge["D_16"]?></td>
            </tr>
            <tr>
                <td>Over Time</td>
                <td><?php echo $modern["B_64"]?></td>
            </tr>
            <tr>
                <td>Saturdays</td>
                <td><?php echo $modern["B_65"]?></td>
            </tr>
            <tr>
                <td>Sundays</td>
                <td><?php echo $modern["B_66"]?></td>
            </tr>
            <tr>
                <td>Public Holidays</td>
                <td><?php echo $modern["B_67"]?></td>
            </tr>
            <tr>
                <td>Early Shift</td>
                <td><?php echo $modern["B_32"]?></td>
            </tr>
            <tr>
                <td>Afternoon Shift Allowance</td>
                <td><?php echo $modern["B_34"]?></td>
            </tr>
            <tr>
                <td>Night Shift Allowance</td>
                <td><?php echo $modern["B_36"]?></td>
            </tr>
        </tbody>
    </table>
    
    <p>The charge rates below are inclusive of all statutory requirements including:</p>
    
    <table cellpadding="5">
        <tr>
            <td>* Casual employee’s hourly pay rate</td>
            <td>* Annual and Sick Leave Entitlements</td>
            <td>* PAYE Deductions</td>
            <td>* Administration Expenses</td>
        </tr>
        <tr>
            <td>* Superannuation entitlements</td>
            <td>* Public Holiday Entitlements</td>
            <td>* Hiring and Termination Costs</td>
        </tr>
        <tr>
            <td>* Workers Compensation</td>
            <td>* Public Liability Insurance</td>
            <td>* Payroll Tax</td>
        </tr>
    </table>
    <hr>
    <h4>Pay and Charge Rate</h4>
    <?php if($calcu["grade1"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 1</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml1?></td>
                    <td><?php echo $normal_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml1?></td>
                    <td><?php echo $t14_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml1?></td>
                    <td><?php echo $t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml1?></td>
                    <td><?php echo $double_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml1?></td>
                    <td><?php echo $double_t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml1?></td>
                    <td><?php echo $triple_labour_ml1?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml1?></td>
                    <td><?php echo $early_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml1?></td>
                    <td><?php echo $t14_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml1?></td>
                    <td><?php echo $t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml1?></td>
                    <td><?php echo $double_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml1?></td>
                    <td><?php echo $double_t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml1?></td>
                    <td><?php echo $triple_labour_ml1?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml1?></td>
                    <td><?php echo $aft_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml1?></td>
                    <td><?php echo $t14_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml1?></td>
                    <td><?php echo $t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml1?></td>
                    <td><?php echo $double_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml1?></td>
                    <td><?php echo $double_t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml1?></td>
                    <td><?php echo $triple_labour_ml1?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml1?></td>
                    <td><?php echo $night_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml1?></td>
                    <td><?php echo $t14_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml1?></td>
                    <td><?php echo $t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml1?></td>
                    <td><?php echo $double_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml1?></td>
                    <td><?php echo $double_t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml1?></td>
                    <td><?php echo $triple_labour_ml1?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml1?></td>
                    <td><?php echo $_50_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml1?></td>
                    <td><?php echo $t14_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml1?></td>
                    <td><?php echo $t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml1?></td>
                    <td><?php echo $double_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml1?></td>
                    <td><?php echo $double_t12_labour_ml1?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml1?></td>
                    <td><?php echo $triple_labour_ml1?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade2"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 2</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml2?></td>
                    <td><?php echo $normal_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml2?></td>
                    <td><?php echo $t14_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml2?></td>
                    <td><?php echo $t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml2?></td>
                    <td><?php echo $double_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml2?></td>
                    <td><?php echo $double_t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml2?></td>
                    <td><?php echo $triple_labour_ml2?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml2?></td>
                    <td><?php echo $early_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml2?></td>
                    <td><?php echo $t14_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml2?></td>
                    <td><?php echo $t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml2?></td>
                    <td><?php echo $double_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml2?></td>
                    <td><?php echo $double_t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml2?></td>
                    <td><?php echo $triple_labour_ml2?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml2?></td>
                    <td><?php echo $aft_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml2?></td>
                    <td><?php echo $t14_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml2?></td>
                    <td><?php echo $t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml2?></td>
                    <td><?php echo $double_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml2?></td>
                    <td><?php echo $double_t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml2?></td>
                    <td><?php echo $triple_labour_ml2?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml2?></td>
                    <td><?php echo $night_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml2?></td>
                    <td><?php echo $t14_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml2?></td>
                    <td><?php echo $t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml2?></td>
                    <td><?php echo $double_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml2?></td>
                    <td><?php echo $double_t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml2?></td>
                    <td><?php echo $triple_labour_ml2?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml2?></td>
                    <td><?php echo $_50_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml2?></td>
                    <td><?php echo $t14_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml2?></td>
                    <td><?php echo $t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml2?></td>
                    <td><?php echo $double_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml2?></td>
                    <td><?php echo $double_t12_labour_ml2?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml2?></td>
                    <td><?php echo $triple_labour_ml2?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
    <?php endif;?>
    
    <?php if($calcu["grade3"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 3</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml3?></td>
                    <td><?php echo $normal_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml3?></td>
                    <td><?php echo $t14_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml3?></td>
                    <td><?php echo $t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml3?></td>
                    <td><?php echo $double_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml3?></td>
                    <td><?php echo $double_t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml3?></td>
                    <td><?php echo $triple_labour_ml3?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml3?></td>
                    <td><?php echo $early_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml3?></td>
                    <td><?php echo $t14_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml3?></td>
                    <td><?php echo $t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml3?></td>
                    <td><?php echo $double_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml3?></td>
                    <td><?php echo $double_t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml3?></td>
                    <td><?php echo $triple_labour_ml3?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml3?></td>
                    <td><?php echo $aft_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml3?></td>
                    <td><?php echo $t14_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml3?></td>
                    <td><?php echo $t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml3?></td>
                    <td><?php echo $double_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml3?></td>
                    <td><?php echo $double_t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml3?></td>
                    <td><?php echo $triple_labour_ml3?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml3?></td>
                    <td><?php echo $night_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml3?></td>
                    <td><?php echo $t14_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml3?></td>
                    <td><?php echo $t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml3?></td>
                    <td><?php echo $double_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml3?></td>
                    <td><?php echo $double_t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml3?></td>
                    <td><?php echo $triple_labour_ml3?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml3?></td>
                    <td><?php echo $_50_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml3?></td>
                    <td><?php echo $t14_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml3?></td>
                    <td><?php echo $t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml3?></td>
                    <td><?php echo $double_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml3?></td>
                    <td><?php echo $double_t12_labour_ml3?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml3?></td>
                    <td><?php echo $triple_labour_ml3?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade4"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 4</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml4?></td>
                    <td><?php echo $normal_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml4?></td>
                    <td><?php echo $t14_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml4?></td>
                    <td><?php echo $t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml4?></td>
                    <td><?php echo $double_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml4?></td>
                    <td><?php echo $double_t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml4?></td>
                    <td><?php echo $triple_labour_ml4?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml4?></td>
                    <td><?php echo $early_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml4?></td>
                    <td><?php echo $t14_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml4?></td>
                    <td><?php echo $t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml4?></td>
                    <td><?php echo $double_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml4?></td>
                    <td><?php echo $double_t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml4?></td>
                    <td><?php echo $triple_labour_ml4?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml4?></td>
                    <td><?php echo $aft_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml4?></td>
                    <td><?php echo $t14_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml4?></td>
                    <td><?php echo $t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml4?></td>
                    <td><?php echo $double_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml4?></td>
                    <td><?php echo $double_t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml4?></td>
                    <td><?php echo $triple_labour_ml4?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml4?></td>
                    <td><?php echo $night_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml4?></td>
                    <td><?php echo $t14_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml4?></td>
                    <td><?php echo $t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml4?></td>
                    <td><?php echo $double_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml4?></td>
                    <td><?php echo $double_t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml4?></td>
                    <td><?php echo $triple_labour_ml4?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml4?></td>
                    <td><?php echo $_50_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml4?></td>
                    <td><?php echo $t14_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml4?></td>
                    <td><?php echo $t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml4?></td>
                    <td><?php echo $double_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml4?></td>
                    <td><?php echo $double_t12_labour_ml4?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml4?></td>
                    <td><?php echo $triple_labour_ml4?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade5"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 5</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml5?></td>
                    <td><?php echo $normal_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml5?></td>
                    <td><?php echo $t14_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml5?></td>
                    <td><?php echo $t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml5?></td>
                    <td><?php echo $double_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml5?></td>
                    <td><?php echo $double_t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml5?></td>
                    <td><?php echo $triple_labour_ml5?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml5?></td>
                    <td><?php echo $early_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml5?></td>
                    <td><?php echo $t14_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml5?></td>
                    <td><?php echo $t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml5?></td>
                    <td><?php echo $double_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml5?></td>
                    <td><?php echo $double_t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml5?></td>
                    <td><?php echo $triple_labour_ml5?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml5?></td>
                    <td><?php echo $aft_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml5?></td>
                    <td><?php echo $t14_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml5?></td>
                    <td><?php echo $t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml5?></td>
                    <td><?php echo $double_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml5?></td>
                    <td><?php echo $double_t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml5?></td>
                    <td><?php echo $triple_labour_ml5?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml5?></td>
                    <td><?php echo $night_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml5?></td>
                    <td><?php echo $t14_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml5?></td>
                    <td><?php echo $t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml5?></td>
                    <td><?php echo $double_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml5?></td>
                    <td><?php echo $double_t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml5?></td>
                    <td><?php echo $triple_labour_ml5?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml5?></td>
                    <td><?php echo $_50_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml5?></td>
                    <td><?php echo $t14_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml5?></td>
                    <td><?php echo $t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml5?></td>
                    <td><?php echo $double_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml5?></td>
                    <td><?php echo $double_t12_labour_ml5?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml5?></td>
                    <td><?php echo $triple_labour_ml5?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade6"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 6</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml6?></td>
                    <td><?php echo $normal_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml6?></td>
                    <td><?php echo $t14_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml6?></td>
                    <td><?php echo $t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml6?></td>
                    <td><?php echo $double_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml6?></td>
                    <td><?php echo $double_t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml6?></td>
                    <td><?php echo $triple_labour_ml6?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml6?></td>
                    <td><?php echo $early_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml6?></td>
                    <td><?php echo $t14_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml6?></td>
                    <td><?php echo $t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml6?></td>
                    <td><?php echo $double_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml6?></td>
                    <td><?php echo $double_t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml6?></td>
                    <td><?php echo $triple_labour_ml6?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml6?></td>
                    <td><?php echo $aft_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml6?></td>
                    <td><?php echo $t14_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml6?></td>
                    <td><?php echo $t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml6?></td>
                    <td><?php echo $double_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml6?></td>
                    <td><?php echo $double_t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml6?></td>
                    <td><?php echo $triple_labour_ml6?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml6?></td>
                    <td><?php echo $night_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml6?></td>
                    <td><?php echo $t14_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml6?></td>
                    <td><?php echo $t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml6?></td>
                    <td><?php echo $double_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml6?></td>
                    <td><?php echo $double_t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml6?></td>
                    <td><?php echo $triple_labour_ml6?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml6?></td>
                    <td><?php echo $_50_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml6?></td>
                    <td><?php echo $t14_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml6?></td>
                    <td><?php echo $t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml6?></td>
                    <td><?php echo $double_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml6?></td>
                    <td><?php echo $double_t12_labour_ml6?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml6?></td>
                    <td><?php echo $triple_labour_ml6?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade7"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 7</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml7?></td>
                    <td><?php echo $normal_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml7?></td>
                    <td><?php echo $t14_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml7?></td>
                    <td><?php echo $t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml7?></td>
                    <td><?php echo $double_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml7?></td>
                    <td><?php echo $double_t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml7?></td>
                    <td><?php echo $triple_labour_ml7?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml7?></td>
                    <td><?php echo $early_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml7?></td>
                    <td><?php echo $t14_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml7?></td>
                    <td><?php echo $t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml7?></td>
                    <td><?php echo $double_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml7?></td>
                    <td><?php echo $double_t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml7?></td>
                    <td><?php echo $triple_labour_ml7?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml7?></td>
                    <td><?php echo $aft_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml7?></td>
                    <td><?php echo $t14_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml7?></td>
                    <td><?php echo $t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml7?></td>
                    <td><?php echo $double_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml7?></td>
                    <td><?php echo $double_t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml7?></td>
                    <td><?php echo $triple_labour_ml7?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml7?></td>
                    <td><?php echo $night_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml7?></td>
                    <td><?php echo $t14_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml7?></td>
                    <td><?php echo $t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml7?></td>
                    <td><?php echo $double_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml7?></td>
                    <td><?php echo $double_t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml7?></td>
                    <td><?php echo $triple_labour_ml7?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml7?></td>
                    <td><?php echo $_50_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml7?></td>
                    <td><?php echo $t14_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml7?></td>
                    <td><?php echo $t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml7?></td>
                    <td><?php echo $double_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml7?></td>
                    <td><?php echo $double_t12_labour_ml7?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml7?></td>
                    <td><?php echo $triple_labour_ml7?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade8"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 8</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml8?></td>
                    <td><?php echo $normal_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml8?></td>
                    <td><?php echo $t14_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml8?></td>
                    <td><?php echo $t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml8?></td>
                    <td><?php echo $double_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml8?></td>
                    <td><?php echo $double_t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml8?></td>
                    <td><?php echo $triple_labour_ml8?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml8?></td>
                    <td><?php echo $early_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml8?></td>
                    <td><?php echo $t14_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml8?></td>
                    <td><?php echo $t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml8?></td>
                    <td><?php echo $double_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml8?></td>
                    <td><?php echo $double_t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml8?></td>
                    <td><?php echo $triple_labour_ml8?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml8?></td>
                    <td><?php echo $aft_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml8?></td>
                    <td><?php echo $t14_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml8?></td>
                    <td><?php echo $t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml8?></td>
                    <td><?php echo $double_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml8?></td>
                    <td><?php echo $double_t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml8?></td>
                    <td><?php echo $triple_labour_ml8?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml8?></td>
                    <td><?php echo $night_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml8?></td>
                    <td><?php echo $t14_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml8?></td>
                    <td><?php echo $t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml8?></td>
                    <td><?php echo $double_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml8?></td>
                    <td><?php echo $double_t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml8?></td>
                    <td><?php echo $triple_labour_ml8?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml8?></td>
                    <td><?php echo $_50_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml8?></td>
                    <td><?php echo $t14_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml8?></td>
                    <td><?php echo $t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml8?></td>
                    <td><?php echo $double_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml8?></td>
                    <td><?php echo $double_t12_labour_ml8?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml8?></td>
                    <td><?php echo $triple_labour_ml8?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade9"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 9</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml9?></td>
                    <td><?php echo $normal_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml9?></td>
                    <td><?php echo $t14_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml9?></td>
                    <td><?php echo $t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml9?></td>
                    <td><?php echo $double_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml9?></td>
                    <td><?php echo $double_t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml9?></td>
                    <td><?php echo $triple_labour_ml9?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml9?></td>
                    <td><?php echo $early_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml9?></td>
                    <td><?php echo $t14_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml9?></td>
                    <td><?php echo $t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml9?></td>
                    <td><?php echo $double_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml9?></td>
                    <td><?php echo $double_t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml9?></td>
                    <td><?php echo $triple_labour_ml9?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml9?></td>
                    <td><?php echo $aft_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml9?></td>
                    <td><?php echo $t14_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml9?></td>
                    <td><?php echo $t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml9?></td>
                    <td><?php echo $double_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml9?></td>
                    <td><?php echo $double_t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml9?></td>
                    <td><?php echo $triple_labour_ml9?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml9?></td>
                    <td><?php echo $night_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml9?></td>
                    <td><?php echo $t14_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml9?></td>
                    <td><?php echo $t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml9?></td>
                    <td><?php echo $double_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml9?></td>
                    <td><?php echo $double_t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml9?></td>
                    <td><?php echo $triple_labour_ml9?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml9?></td>
                    <td><?php echo $_50_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml9?></td>
                    <td><?php echo $t14_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml9?></td>
                    <td><?php echo $t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml9?></td>
                    <td><?php echo $double_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml9?></td>
                    <td><?php echo $double_t12_labour_ml9?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml9?></td>
                    <td><?php echo $triple_labour_ml9?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <?php if($calcu["grade10"]):?>
        <table class="table table-condensed table-bordered" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Grade 10</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>Classification</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td colspan="2">Normal Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td colspan="2">T1/4</td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td colspan="2">Time and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td colspan="2">Double Time</td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td colspan="2">Double and a Half</td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td colspan="2">Triple Time</td>
                    <?php endif;?>
                </tr>
                <?php if($calcu["p_day"]):?>
                <tr>
                    <td>Day Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $normal_total_ml10?></td>
                    <td><?php echo $normal_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml10?></td>
                    <td><?php echo $t14_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml10?></td>
                    <td><?php echo $t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml10?></td>
                    <td><?php echo $double_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml10?></td>
                    <td><?php echo $double_t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml10?></td>
                    <td><?php echo $triple_labour_ml10?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_early"]):?>
                <tr>
                    <td>Early Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $early_total_ml10?></td>
                    <td><?php echo $early_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml10?></td>
                    <td><?php echo $t14_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml10?></td>
                    <td><?php echo $t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml10?></td>
                    <td><?php echo $double_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml10?></td>
                    <td><?php echo $double_t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml10?></td>
                    <td><?php echo $triple_labour_ml10?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
                <?php if($calcu["p_afternoon"]):?>
                <tr>
                    <td>Afternoon Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $aft_total_ml10?></td>
                    <td><?php echo $aft_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml10?></td>
                    <td><?php echo $t14_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml10?></td>
                    <td><?php echo $t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml10?></td>
                    <td><?php echo $double_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml10?></td>
                    <td><?php echo $double_t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml10?></td>
                    <td><?php echo $triple_labour_ml10?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_night"]):?>
                    
                <tr>
                    <td>Night Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $night_total_ml10?></td>
                    <td><?php echo $night_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml10?></td>
                    <td><?php echo $t14_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml10?></td>
                    <td><?php echo $t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml10?></td>
                    <td><?php echo $double_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml10?></td>
                    <td><?php echo $double_t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml10?></td>
                    <td><?php echo $triple_labour_ml10?></td>
                    <?php endif;?>
                </tr>
                
                <?php endif;?>
                <?php if($calcu["p_half"]):?>
                    
                <tr>
                    <td>50% Shift</td>
                    <?php if($calcu["p_normal_time"]):?>
                    <td><?php echo $_50_total_ml10?></td>
                    <td><?php echo $_50_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_t_14"]):?>
                    <td><?php echo $t14_total_ml10?></td>
                    <td><?php echo $t14_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_time_and_half"]):?>
                    <td><?php echo $t12_total_ml10?></td>
                    <td><?php echo $t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_time"]):?>
                    <td><?php echo $double_total_ml10?></td>
                    <td><?php echo $double_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_double_and_half"]):?>
                    <td><?php echo $double_t12_total_ml10?></td>
                    <td><?php echo $double_t12_labour_ml10?></td>
                    <?php endif;?>
                    <?php if($calcu["p_triple"]):?>
                    <td><?php echo $triple_total_ml10?></td>
                    <td><?php echo $triple_labour_ml10?></td>
                    <?php endif;?>
                </tr>
                <?php endif;?>
            </tbody>
        </table>
        
        
    <?php endif;?>

    <p><i>* Please note that all hourly charge rates and entitlements are subject to 10% GST</i></p>
    <p>The engagement of <?php echo $company?> Casual Staff are subject to the terms and conditions as outlined in the Terms and Conditions of Temporary 
        Placement version 2004 document which has been provided to you. By engaging  <?php echo $company?> Casual Staff you agree to the terms and conditions set out.</p>
    
    <p>The following are examples of potential allowances and charges as per the rules of the instrument:</p>
    
    <table class="table table-bordered table-condensed" style="margin-top: 20px;">
        <tr>
            <td><?php echo $modern["allowance_caption1"]?></td>
            <td>$<?php echo $allow_meal?></td>
            <td>$<?php echo $labour_meal?></td>
            <td><?php echo $modern["C_52"]?></td>
        </tr>
        <tr>
            <td><?php echo $modern["allowance_caption2"]?></td>
            <td>$<?php echo $allow_first_aid?></td>
            <td>$<?php echo $labour_first_aid?></td>
            <td><?php echo $modern["C_53"]?></td>
        </tr>
        <tr>
            <td><?php echo $modern["allowance_caption3"]?></td>
            <td>$<?php echo $allow_l_hand_3?></td>
            <td>$<?php echo $labour_l_hand_3?></td>
            <td><?php echo $modern["C_54"]?></td>
        </tr>
        <tr>
            <td><?php echo $modern["allowance_caption4"]?></td>
            <td>$<?php echo $allow_l_hand_10?></td>
            <td>$<?php echo $labour_l_hand_10?></td>
            <td><?php echo $modern["C_55"]?></td>
        </tr>
        <tr>
            <td><?php echo $modern["allowance_caption5"]?></td>
            <td>$<?php echo $allow_l_hand_20?></td>
            <td>$<?php echo $labour_l_hand_20?></td>
            <td><?php echo $modern["C_56"]?></td>
        </tr>
    </table>
    
    <p><b>Permanent Placement Fees</b></p>
    <p><?php echo $company?>'s recruitment fees are for the engagement of <?php echo $company?> to effectively source suitable applicants and conduct the recruitment process required for your
    organisation to appoint an appropriate employee as per the position requirements established during briefing.</p>
    
    <p>The recruitment fee is a percentage of the salary package. The salary package includes base salary, superannuation, commission, performance related bonuses,
    company vehicle and all other benefits as agreed by you and the candidate.</p>
    
    <?php if($charge["C_30"] != "" || $charge["C_31"] != "" || $charge["C_32"] != "" || $charge["C_33"] != "" || $charge["C_34"] != ""
     || $charge["C_35"] != "" || $charge["C_35"] != "" || $charge["C_36"] != "" || $charge["C_36"] != ""):?>
    <table class="table table-bordered table-condensed">
        <?php if($charge["C_30"] != ""):?>
        <tr>
            <td><?php echo $charge["C_30"]?></td>
            <td><?php echo $charge["D_30"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_31"] != ""):?>
        <tr>
            <td><?php echo $charge["C_31"]?></td>
            <td><?php echo $charge["D_31"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_32"] != ""):?>
        <tr>
            <td><?php echo $charge["C_32"]?></td>
            <td><?php echo $charge["D_32"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_33"] != ""):?>
        <tr>
            <td><?php echo $charge["C_33"]?></td>
            <td><?php echo $charge["D_33"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_34"] != ""):?>
        <tr>
            <td><?php echo $charge["C_34"]?></td>
            <td><?php echo $charge["D_34"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_35"] != ""):?>
        <tr>
            <td><?php echo $charge["C_35"]?></td>
            <td><?php echo $charge["D_35"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_36"] != ""):?>
        <tr>
            <td><?php echo $charge["C_36"]?></td>
            <td><?php echo $charge["D_36"]?>%</td>
        </tr>
        <?php endif;?>
        <?php if($charge["C_37"] != ""):?>
        <tr>
            <td><?php echo $charge["C_37"]?></td>
            <td><?php echo $charge["D_37"]?>%</td>
        </tr>
        <?php endif;?>
    </table>
    <?php endif;?>
    
    
    
    
    
    <p>Confidentiality and Onward Referral - All resumes and introductions are for the sole use of you and your company. You can not disclose any information regarding the
        candidate to any other party without our consent. Placement of any candidate presented by <?php echo $company?> either verbally or in writing or by resume within six (6) months
        of the date of introduction with either your client or through referring the candidate details to a third party will result in the full recruitment fee being charged.</p>
        
    <p>Recruitment Guarantee - <?php echo $company?> guarantees the employment of the successful candidate for a period as noted below. This is provided in the event of an employee
       resigning or being terminated for any reason (with the exception of redundancy, retrenchment and/or a change of position specification). Under guarantee, <?php echo $company?>
       will recruit for the same position specification at no charge. Should no suitable replacement be identified within the period as stated below, a full credit will be
       applied to your account for use on a future placement (must be used within 6 months).</p>
    
    <p>Guarantee Period <?php echo $charge["D_38"] ?> Days</p>
    <p>Terms and Conditions</p>
    <p>* All introductions are confidential and for the sole use of you and your company.</p>
    <p>* Advertising will be lodged free of charge, however some print media may be charged to you upon agreement.</p>
    <p>* Invoices are payable 7 days from the date of invoice.</p>
    <p>* The guarantee is void if payment of the permanent placement fee is not received within 14 days of the invoice date.</p>
    
    <p>Please acknowledge your acceptance of the pay and charge rate schedule by signing and returning this document.</p>
    
    <table class="table table-bordered table-condensed">
        <tr>
            <td>Signature:</td>
            <td>Print Name:</td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>Position:</td>
        </tr>
        <tr>
            <td>ABN:</td>
            <td>Company:</td>
        </tr>
        <tr>
            <td>Initial:</td>
            <td><?php echo date("m/d/Y")?></td>
        </tr>
    </table>
</div>

<?php echo $footer?>