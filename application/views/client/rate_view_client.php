<?php echo $header ?>

<div class="topmargin" style="margin-top: 25px;"></div>
<?php if ($is_approved) : ?>
    <div class="alert alert-success">
        <i class="icon-ok"></i> Rate has been approved.
    </div>
<?php endif ?>
<div class="row">
    
    <p>Thank you for giving <?php echo $company?> the opportunity to provide you with this quotation for the supply of Labour Hire and Recruitment Services.</p>
    <p><b>Labour Hire Services</b></p>
    <p><?php echo $company?>’s Casual Staff are remunerated according to an appropriate industrial instrument. The following pay and charge rate schedules have been created using the:</p>
    
    
    <p><b><?php echo $charge["transaction_name"]?></b></p>
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
                <td><?php echo number_format((double)$charge["B_26"], 2, ".", "")?></td>
            </tr>
            <tr>
                <td>How We Will Calculate Normal Hours</td>
                <td><?php echo $charge["D_16"]?></td>
            </tr>
            <tr>
                <td>Over Time</td>
                <td><?php echo $charge["B_64"]?></td>
            </tr>
            <tr>
                <td>Saturdays</td>
                <td><?php echo $charge["B_65"]?></td>
            </tr>
            <tr>
                <td>Sundays</td>
                <td><?php echo $charge["B_66"]?></td>
            </tr>
            <tr>
                <td>Public Holidays</td>
                <td><?php echo $charge["B_67"]?></td>
            </tr>
            <tr>
                <td>Early Shift</td>
                <td><?php echo $charge["B_32"]?></td>
            </tr>
            <tr>
                <td>Afternoon Shift Allowance</td>
                <td><?php echo $charge["B_34"]?></td>
            </tr>
            <tr>
                <td>Night Shift Allowance</td>
                <td><?php echo $charge["B_36"]?></td>
            </tr>
            <tr>
                <td>50% Shift</td>
                <td><?php echo $charge["B_38"]?></td>
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
        Placement version 2004 document which has been provided to you. By engaging <?php echo $company?> Casual Staff you agree to the terms and conditions set out.</p>
    
    <p>The following are examples of potential allowances and charges as per the rules of the instrument:</p>
    
    <table class="table table-bordered table-condensed" style="margin-top: 20px;">
        <tr>
            <td><?php echo $charge["allowance_caption1"]?></td>
            <td>$<?php echo $allow_meal?></td>
            <td>$<?php echo $labour_meal?></td>
            <td><?php echo $charge["C_52"]?></td>
        </tr>
        <tr>
            <td><?php echo $charge["allowance_caption2"]?></td>
            <td>$<?php echo $allow_first_aid?></td>
            <td>$<?php echo $labour_first_aid?></td>
            <td><?php echo $charge["C_53"]?></td>
        </tr>
        <tr>
            <td><?php echo $charge["allowance_caption3"]?></td>
            <td>$<?php echo $allow_l_hand_3?></td>
            <td>$<?php echo $labour_l_hand_3?></td>
            <td><?php echo $charge["C_54"]?></td>
        </tr>
        <tr>
            <td><?php echo $charge["allowance_caption4"]?></td>
            <td>$<?php echo $allow_l_hand_10?></td>
            <td>$<?php echo $labour_l_hand_10?></td>
            <td><?php echo $charge["C_55"]?></td>
        </tr>
        <tr>
            <td><?php echo $charge["allowance_caption5"]?></td>
            <td>$<?php echo $allow_l_hand_20?></td>
            <td>$<?php echo $labour_l_hand_20?></td>
            <td><?php echo $charge["C_56"]?></td>
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
    
    <div class="topmargin"></div>
    <h2>Terms and Conditions</h2>
    <h4><?php echo $company?></h4>
    
    <?php if($company == "Labourpower Recruitment Services") :?>
    <p><b>1. Definitions</b></p> 
    <p>1.1 “Consultant” shall mean Labourpower Recruitment Services Pty Ltd and its successors and assigns.</p> 
    <p>1.2 “Client” shall mean the Client or any person acting on behalf of and with the authority of the Client.</p>
    <p>1.3 “Services” shall mean all services supplied by the Consultant to the Client and includes any advice or recommendations (and where the context so permits shall include any supply of Services as defined supra).</p> 
    <p>1.4 “Temporary Candidate” shall mean any Candidate placed for employment with a Client on a temporary, casual, or part time basis. </p>
    <p>1.5 “Fee” shall mean the cost of the Services as agreed between the Consultant and the Client subject to clause 4 of this contract. </p>
    
    <p><b>2. Acceptance</b></p> 
    <p>2.1 Any instructions received by the Consultant from the Client for the supply of Services and/or the Client’s acceptance of Services supplied by the Consultant and/or an arrangement to interview a Candidate introduced by the Consultant and/or Commencement of the Temporary Candidate shall constitute acceptance of the terms and conditions contained herein.</p>  
    <p>2.2 Upon acceptance of these terms and conditions by the Client the terms and conditions are irrevocable and can only be rescinded in accordance with these terms and conditions or with the written consent of the manager of the Consultant. </p>
    <p>2.3 None of the Consultant’s agents or representatives are authorised to make any representations, statements, conditions or agreements not expressed by the manager of the Consultant in writing nor is the Consultant bound by any such unauthorised statements.</p> 
    <p>2.4 Where more than one Client has entered into this agreement, the Clients shall be jointly and severally liable for all payments of the Fee. </p>
    <p>2.5 All information regarding Candidates, whether written or verbal, is supplied in confidence and is not to be disclosed to any other party without the express written consent of the Consultant.</p> 
    
    <p><b>3. Services  </b></p>
    <p>3.1 The Services are as described on the invoices, quotation, work authorisation or any other work commencement forms as provided by the Consultant to the Client.</p> 
    <p>3.2 The Consultant undertakes to: </p>
    <p style="padding-left: 10px">(a) use its best endeavours to provide Candidates as requested by the Client; and</p> 
    <p style="padding-left: 10px">(b) deduct the requisite amounts of income tax, union dues and all other applicable deductions as required by Australian law; and</p> 
    <p style="padding-left: 10px">(c) ensure payments of any other statutory taxes, superannuation contributions and/or levies as required by Australian law; and </p>
    <p style="padding-left: 10px">(d) maintain workers compensation insurance for all Candidates, except where state laws specify otherwise. </p>
    
    <p><b>4. Fee Structure </b></p>
    <p>4.1 At the Consultant’s sole discretion;</p> 
    <p style="padding-left: 10px">(a) the General Services Fee shall be as indicated on invoices provided by the Consultant to the Client in respect of Services supplied; or</p> 
    <p style="padding-left: 10px">(b) The Fee, subject to clause 4.2, shall be the Consultant’s quoted Fee which shall be binding upon the Client provided that the Client shall accept in writing the Consultant’s quotation within thirty (30) days.</p> 
    <p>4.2 Rates for Temporary Candidates vary from time to time as a result of changes to applicable award provisions, changes to applicable State or Federal legislation including but not limited to superannuation and the length of an assignment. All inquiries concerning rates must be directed to an authorised representative of the Consultant.</p> 
    <p>4.3 Where fringe benefits apply, such as car allowance, superannuation etc they are regarded, as a part of a Candidate’s remuneration, and this factor will be included when assessing the fee.  </p>
    <p>4.4 The Consultant will invoice the Client weekly for the total hours worked by each Temporary Candidate at the applicable hourly rate for that week. In addition to the standard hourly charge, further charges will apply in accordance with any relevant federal or state award.</p> 
    
    <p><b>5. Payment</b></p> 
    <p>5.1 Time for payment for the Services shall be of the essence and will be stated on the invoice, quotation or any other order forms.  If no time is stated then payment shall be on delivery of the Services.</p> 
    <p>5.2 Unless agreed to in writing by the Consultant, Temporary Candidates are supplied on the understanding that all accounts are payable seven (7) days from the date of invoice. </p>
    <p>5.3 Payment will be made by cash on delivery, or by cheque, or by bank cheque, or by direct credit, or by any other method as agreed to between the Client and the Consultant. </p>
    <p>5.4 The Fee shall be increased by the amount of any GST and other taxes and duties which may be applicable, except to the extent that such taxes are expressly included in any quotation given by the Consultant.</p> 
    
    <p><b>6. Delivery Of Services </b></p>
    <p>6.1 The failure of the Consultant to deliver the Services shall not entitle either party to treat this contract as repudiated.</p> 
    <p>6.2 The Consultant shall not be liable for any injury, loss or damage or expenses incurred by the Client in connection with the supply of or failure to supply Candidates pursuant to these terms and conditions regardless of any errors or mistakes, negligence, dishonesty, misrepresentation or otherwise if such acts are performed by any employment consultant engaged on behalf of The Consultant or Candidates supplied pursuant to these terms and conditions.</p> 
    
    <p><b>7. Clients Disclaimer/Indemnity </b></p>
    <p>7.1 The Client hereby disclaims any right to rescind, or cancel the contract or to sue for damages or to claim restitution arising out of any misrepresentation made to him by any servant or agent of the Consultant and the Client acknowledges that he buys the Services relying solely upon his own skill and judgement.</p> 
    <p>7.2 The Client undertakes to indemnify the Consultant against any loss or damages suffered and/or any costs incurred by the Consultant as a result of any direct or indirect consequence </p>
    <p>of the employment of Temporary Candidates including but not limited to circumstances involving contributory negligence. </p>
    <p>7.3 In no circumstances shall the Consultant be liable for any personal injury resulting in injury or death, loss and/or damage or expense arising out of or caused by any act or omission of a Temporary Candidate whether or not any such act or omission is negligent, and the Client acknowledges and agrees to indemnify Temporary Candidates against all such liability whether alleged or proved. The Client is to include all Temporary Candidates in the Clients own public liability insurance cover.</p> 
    
    <p><b>8. Client Obligations </b></p>
    <p>8.1 The Client acknowledges that the Consultant does not perform any services required of our employees or independent contractors; but instead supply our employees and independent contractors, at the Client’s request, to perform the work it has requested.  From the time that our employees or independent contractors report to the client for their duties they are under the care, control and supervision of the Client for the duration of the assignment.  The Client agrees that the Consultant will not be liable to the Client in respect of any damage, loss or injury of whatsoever nature or kind, however caused, whether by the Consultant’s negligence or the negligence of one of our workers, their servants or agents or otherwise, which may be suffered or incurred, whether directly or indirectly, in respect of the services provided under these conditions of placement.</p> 
    
    <p><b>9. Cancellation </b></p>
    <p>9.1 The Consultant may cancel these terms and conditions or cancel delivery of Services at any time before the Services are delivered by giving written notice.  The Consultant shall not be liable for any loss or damage whatsoever arising from such cancellation.</p> 
    <p>10. The Commonwealth Competition and Consumer Act 2010  and Fair Trading Acts </p>
    <p>10.1 Nothing in this agreement is intended to have the affect of contracting out of any applicable provisions of the Competition and Consumer Act 2010 or the Fair Trading Acts in each of the States and Territories of Australia, except to the extent permitted by those Acts where applicable.</p> 
    
    <p><b>11. Default & Consequences Of Default </b></p>
    <p>11.1 Interest on overdue invoices shall accrue from the date when payment becomes due daily until the date of payment at a rate of 2.5% per calendar month and shall accrue at such a rate after as well as before any judgement.</p> 
    <p>11.2 If the Client defaults in payment of any invoice when due, the Client shall indemnify the Consultant from and against all the Consultant’s costs and disbursements including on a solicitor and own Client basis and in addition all of the Consultant’s nominees costs of collection.</p> 
    <p>11.3 Without prejudice to any other remedies the Consultant may have, if at any time the Client is in breach of any obligation (including those relating to payment), the Consultant may suspend or terminate the supply of Services to the Client and any of its other obligations under the terms and conditions.  The Consultant will not be liable to the Client for any loss or damage the Client suffers because the Consultant exercised its rights under this clause.</p> 
    <p>11.4 If any account remains unpaid at the end of the second month after supply of the Services the following shall apply:  An immediate amount of the greater of $50.00 or 10.00% of the amount overdue shall be levied for administration fees which sum shall become immediately due and payable. </p>
    <p>11.5 In the event that: </p>
    <p style="padding-left: 10px">(a) any money payable to the Consultant becomes overdue, or in the Consultant’s opinion the Client will be unable to meet its payments as they fall due; or</p> 
    <p style="padding-left: 10px">(b) the Client becomes insolvent, convenes a meeting with its creditors or proposes or enters into an arrangement with creditors, or makes an assignment for the benefit of its creditors; or</p> 
    <p style="padding-left: 10px">(c) a receiver, manager, liquidator (provisional or otherwise) or similar person is appointed in respect of the Client or any asset of the Client;  </p>
    <p>then without prejudice to the Consultant’s other remedies at law </p>
    <p style="padding-left: 10px">(i) the Consultant shall be entitled to cancel all or any part of any order of the Client which remains unperformed in addition to and without prejudice to any other remedies; and</p> 
    <p style="padding-left: 10px">(ii) all amounts owing to the Consultant shall, whether or not due for payment, immediately become payable. </p>
    
    <p><b>12. Privacy Act 1988 </b></p>
    <p>12.1 The Client agrees for the Consultant to obtain from a credit-reporting Consultant a credit report containing personal credit information about the Client in relation to credit provided by the Consultant.</p> 
    <p style="padding-left: 10px">12.2 The Client agrees that the Consultant may exchange information about the Client with those credit providers named in the Application for Credit account or named in a consumer credit report issued by a reporting Consultant for the following purposes:</p> 
    <p style="padding-left: 10px">(a) To assess an application from the Client; </p>
    <p style="padding-left: 10px">(b) To notify other credit providers of a default by the Client;</p> 
    <p style="padding-left: 10px">(c) To exchange information with other credit providers as to the status of this credit account, where the Client is in default with other credit providers; and</p> 
    <p style="padding-left: 10px">(d) To assess the credit worthiness of the Client. </p>
    <p>12.3 The Client consents to the Consultant being given a consumer credit report to collect overdue payment on commercial credit (Section 18K(1)(h) Privacy Act 1988).</p> 
    <p>12.4 The Client agrees that Personal Data provided may be used and retained by the Consultant for the following purposes and for other purposes as shall be agreed between the Client and Consultant or required by law from time to time:</p> 
    <p style="padding-left: 10px">(a) provision of Services; </p>
    <p style="padding-left: 10px">(b) marketing of Services by the Consultant, its agents or distributors in relation to the Services;</p> 
    <p style="padding-left: 10px">(c) analysing, verifying and/or checking the Client’s credit, payment and/or status in relation to provision of Services;</p> 
    <p style="padding-left: 10px">(d) processing of any payment instructions, direct debit facilities and/or credit facilities requested by the Client;  and </p>
    <p style="padding-left: 10px">(e) enabling the daily operation of the Client’s account and/or the collection of amounts outstanding in the Client’s account in relation to the Services.</p> 
    <p style="padding-left: 10px">12.5 The Consultant may give information about the Client to a credit reporting Consultant for the following purposes: </p>
    <p style="padding-left: 10px">(a) to obtain a consumer credit report about the Client; and or</p> 
    <p style="padding-left: 10px">(b) allow the credit reporting Consultant to create or maintain a credit information file containing information about the Client.</p> 
    
    <p><b>13. Consultant Disclaimer </b></p>
    <p>13.1 The Consultant endeavours to provide accurate background on Candidates qualifications and experience. However these details are based on information made available by Candidates and referees. Therefore no responsibility can be accepted by the Consultant for errors, omissions, or incorrect conclusions.</p> 
    <p>13.2 Whilst the Consultant makes every effort to submit Candidates that are suitable for client needs, no liability will be accepted for any loss, or damage, or other costs irrespective of how they are caused which a Client may suffer, or for which a Client may become liable arising out of, or in connection with the introduction of a Candidate to a Client company.</p> 
    
    <p><b>14. Temporary Candidates </b></p>
    <p>14.1 The Consultant agrees to use its best endeavours to supply suitable, competent Temporary Candidates to its Clients based on the Client’s requirements. The Client agrees to clearly instruct the Consultant of its requirements for Temporary Candidates and to notify the Consultant immediately if there is any change in those requirements.</p> 
    <p>14.2 Minimum booking for Temporary Candidates is eight hours. Cancellation of booking must allow Temporary Candidates travelling time from home to place of assignment.  Otherwise, a fee of four hours is payable at quoted rates. </p>
    <p>14.3 In the event that the Consultant receives notice from the Client that the Client is dissatisfied with a Temporary Candidate provided by the Consultant, within four hours of that Candidate commencing, no charge will be made to the Client for the four hours worked by the Candidate.</p> 
    <p>14.4 Every effort is made by the Consultant to ensure the highest standards of integrity within their Temporary Candidates.  However, no responsibility can be accepted by the Consultant for any error, losses, expense, damage, delay or arising risk where a Temporary Candidate is required as part of any assignment to handle money’s, securities, valuables or confidential information.</p> 
    <p>14.5 The Consultant will pay Temporary Candidates and invoice the Client on the basis of working hours shown on the Consultant’s time sheet.  The Client undertakes to have each weekly time sheet of each Temporary Candidate approved and endorsed by an authorised person employed by the Client. </p>
    <p>14.6 Should you, the Client, require the services of a Consultant Temporary Candidate at any time within six months of termination of temporary employment, a booking must only be made through the Consultant.   </p>
    <p>14.7 It is the responsibility of the Client to  </p>
    <p style="padding-left: 10px">(a) provide supervision of Temporary Candidates to ensure that work is carried out to a satisfactory standard; and</p> 
    <p style="padding-left: 10px">(b) provide Temporary Candidates with appropriate information, supervision and training to enable them to work safely; and</p> 
    <p style="padding-left: 10px">(c) provide our Temporary Candidate with a workplace-specific and job-specific induction.  This induction is to be completed before the Temporary Candidate commences work with the Client; and</p> 
    <p style="padding-left: 10px">(d) familiarise the Temporary Candidate with the Clients operations, facilities, policies and procedures, and properly inform the Consultant of any specific requirements of the job for which the Temporary Candidate has been hired to perform.; and</p> 
    <p style="padding-left: 10px">(e) provide safe working conditions and to comply with all statutory and other obligations that are applicable pursuant to Australian law (including, but not limited to, legislation relating to workplace health and safety) to employers and otherwise to treat Temporary Candidate as if they were employed by the Client; and</p> 
    <p style="padding-left: 10px">(f) effect and maintain insurance cover in respect of any claims which may be made against the Client by a Temporary Candidate that arise as a result of the Clients occupation of premises, and otherwise in respect of any act or omission in respect of machinery, equipment or vehicle(s) used by Temporary Candidate, and to indemnify the Consultant against any such claims.</p> 
    <p style="padding-left: 10px">(g) provide payment for wet weather as per the relevant award, EBA, etc. </p>
    <p>14.8 The Client acknowledges that they remain responsible for controlling the manner, time and place in which the Temporary Candidate shall carry out their duties as assigned by the Client and that in doing so the Client shall be liable for all acts and omissions of Temporary Candidates as for employees that have been employed directly by the Client.</p> 
    <p>14.9 The Consultant may replace a Temporary Candidate at any time with another Temporary Candidate of comparable qualifications without notice to you, however the Consultant shall endeavour to notify the Client before doing so. </p>
    <p>14.10 In the event of any disputes or claims, you must notify the Consultant within thirty (30) days of any such occurrence. If the Client shall fail to comply with this provision the Services shall be conclusively presumed to be in accordance with the terms and conditions and free from any disputes or claims.</p> 

    
    <p><b>15. Candidate Fee</b></p>
    <p>15.1 Without limiting any other clause in this agreement, the Client must pay to pay the Candidate Fee set out in clause 15.2 to the Consultant on the date that it or any affiliated or related body corporate:</p>
    <p style="padding-left: 10px">(a) engages (whether directly or indirectly) a person who is, or was, a Temporary Candidate in any role; or</p>
    <p style="padding-left: 10px">(b) is involved in any way in placing a Temporary Candidate in any role with any other entity.</p>
    <p>15.2 For the purposes of clause 15.1, the Candidate Fee is the percentage of fee which corresponds in the table below with the Last Placement Period of temporary employment for the respective Temporary Candidate:</p>
    
    <table class="table table-bordered table-condensed">
        <tr>
            <td>Last Placement Period in months</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
        </tr>
        <tr>
            <td>Percentage of Fee</td>
            <td>100</td>
            <td>90</td>
            <td>80</td>
            <td>70</td>
            <td>60</td>
            <td>50</td>
            <td>40</td>
            <td>30</td>
            <td>20</td>
            <td>10</td>
            <td>0</td>
        </tr>
    </table>
    
    <p>15.3 For the purposes of this clause, where one or more Clients enter into this agreement they are jointly and severally liable for any Candidate Fee which becomes owing to the Consultant under clause 15.1. </p>
    <p>15.4 Nothing in this clause affects (including restricts) the Consultant's ability to seek any legal redress or relief that may become available to it as a result of a Temporary Candidate leaving its employment in the circumstances described in clause 15.1, including in respect of loss, damage or relief relating to any breach of a confidentiality obligation imposed upon the Client by law or equity. </p>
    <p>15.5 Interest on unpaid Candidate Fee will accrue at a rate of 2.5% per calendar month and shall accrue at such a rate after as well as before any judgement. </p>
    <p>15.6 Clause 11.2 applies to unpaid Candidate Fees as if the reference to a default on invoice was a reference to a default in paying the relevant Candidate Fee.</p> 
    <p>15.7 The Client must immediately notify the Consultant if any of the placements referred to in clause 15.1 are in prospect or have occurred.</p>
    
    
    <p><b>16. General</b></p>
    <p>16.1 If any provision of these terms and conditions shall be invalid, void, illegal or unenforceable the validity, existence, legality and enforceability of the remaining provisions shall not be affected, prejudiced or impaired.</p>
    <p>16.2 All Services supplied by the Consultant are subject to the laws of New South Wales and the Consultant takes no responsibility for changes in the law which affect the Services supplied.</p>
    <p>16.3 The Consultant shall be under no liability whatsoever to the client for any indirect loss and/or expense (including loss of profit) suffered by the Client arising out of a breach by the Consultant of these terms and conditions.</p>
    <p>16.4 In the event of any breach of this contract by the Consultant the remedies of the Client shall be limited to damages. Under no circumstances shall the liability of the Consultant exceed the Fee of the Services.</p>
    <p>16.5 The Client shall not set off against the Fee amounts due from the Consultant.</p>
    <p>16.6 The Consultant reserves the right to review these terms and conditions at any time and from time to time. If, following any such review, there is to be any change in such terms and conditions, that change will take effect from the date on which the Consultant notifies the Client of such change/</p>
    <p>16.7 Neither party shall be liable for any default due to any act of God, terrorism, war, strike, lock out, industrial action, fire, flood, drought, storm, or other events beyond the reasonable control of either party.</p>
    <p>16.8 Neither this agreement nor any rights or obligations hereunder may be assigned or otherwise transferred by either party without the prior written permission of the other.</p>

    <?php else : ?>

    <p><b>1. Definitions</b></p> 
    <p>1.1 “Consultant” shall mean LP Consulting Services Pty Ltd and its successors and assigns.</p> 
    <p>1.2 “Client” shall mean the Client or any person acting on behalf of and with the authority of the Client.</p> 
    <p>1.3 “Services” shall mean all services supplied by the Consultant to the Client and includes any advice or recommendations (and where the context so permits shall include any supply of Services as defined supra).</p> 
    <p>1.4 “Temporary Candidate” shall mean any Candidate placed for employment with a Client on a temporary, casual, or part time basis. </p>
    <p>1.5 “Fee” shall mean the cost of the Services as agreed between the Consultant and the Client subject to clause 4 of this contract. </p>
    
    <p><b>2. Acceptance </b></p>
    <p>2.1 Any instructions received by the Consultant from the Client for the supply of Services and/or the Client’s acceptance of Services supplied by the Consultant and/or an arrangement to interview a Candidate introduced by the Consultant and/or Commencement of the Temporary Candidate shall constitute acceptance of the terms and conditions contained herein.</p>  
    <p>2.2 Upon acceptance of these terms and conditions by the Client the terms and conditions are irrevocable and can only be rescinded in accordance with these terms and conditions or with the written consent of the manager of the Consultant. </p>
    <p>2.3 None of the Consultant’s agents or representatives are authorised to make any representations, statements, conditions or agreements not expressed by the manager of the Consultant in writing nor is the Consultant bound by any such unauthorised statements.</p> 
    <p>2.4 Where more than one Client has entered into this agreement, the Clients shall be jointly and severally liable for all payments of the Fee. </p>
    <p>2.5 All information regarding Candidates, whether written or verbal, is supplied in confidence and is not to be disclosed to any other party without the express written consent of the Consultant.</p> 
    
    <p><b>3. Services  </b></p>
    <p>3.1 The Services are as described on the invoices, quotation, work authorisation or any other work commencement forms as provided by the Consultant to the Client.</p> 
    <p>3.2 The Consultant undertakes to: </p>
    <p style="padding-left: 10px">(a) use its best endeavours to provide Candidates as requested by the Client; and</p> 
    <p style="padding-left: 10px">(b) deduct the requisite amounts of income tax, union dues and all other applicable deductions as required by Australian law; and</p> 
    <p style="padding-left: 10px">(c) ensure payments of any other statutory taxes, superannuation contributions and/or levies as required by Australian law; and </p>
    <p style="padding-left: 10px">(d) maintain workers compensation insurance for all Candidates, except where state laws specify otherwise. </p>
    
    <p><b>4. Fee Structure</b> </p>
    <p>4.1 At the Consultant’s sole discretion;</p> 
    <p style="padding-left: 10px">(a) the General Services Fee shall be as indicated on invoices provided by the Consultant to the Client in respect of Services supplied; or</p> 
    <p style="padding-left: 10px">(b) The Fee, subject to clause 4.2, shall be the Consultant’s quoted Fee which shall be binding upon the Client provided that the Client shall accept in writing the Consultant’s quotation within thirty (30) days.</p> 
    <p>4.2 Rates for Temporary Candidates vary from time to time as a result of changes to applicable award provisions, changes to applicable State or Federal legislation including but not limited to superannuation and the length of an assignment. All inquiries concerning rates must be directed to an authorised representative of the Consultant.</p> 
    <p>4.3 Where fringe benefits apply, such as car allowance, superannuation etc they are regarded, as a part of a Candidate’s remuneration, and this factor will be included when assessing the fee.  </p>
    <p>4.4 The Consultant will invoice the Client weekly for the total hours worked by each Temporary Candidate at the applicable hourly rate for that week. In addition to the standard hourly charge, further charges will apply in accordance with any relevant federal or state award.</p> 
    
    <p><b>5. Payment</b> </p>
    <p>5.1 Time for payment for the Services shall be of the essence and will be stated on the invoice, quotation or any other order forms.  If no time is stated then payment shall be on delivery of the Services.</p> 
    <p>5.2 Unless agreed to in writing by the Consultant, Temporary Candidates are supplied on the understanding that all accounts are payable seven (7) days from the date of invoice. </p>
    <p>5.3 Payment will be made by cash on delivery, or by cheque, or by bank cheque, or by direct credit, or by any other method as agreed to between the Client and the Consultant. </p>
    <p>5.4 The Fee shall be increased by the amount of any GST and other taxes and duties which may be applicable, except to the extent that such taxes are expressly included in any quotation given by the Consultant.</p> 
    
    <p><b>6. Delivery Of Services</b> </p>
    <p>6.1 The failure of the Consultant to deliver the Services shall not entitle either party to treat this contract as repudiated.</p> 
    <p>6.2 The Consultant shall not be liable for any injury, loss or damage or expenses incurred by the Client in connection with the supply of or failure to supply Candidates pursuant to these terms and conditions regardless of any errors or mistakes, negligence, dishonesty, misrepresentation or otherwise if such acts are performed by any employment consultant engaged on behalf of The Consultant or Candidates supplied pursuant to these terms and conditions.</p> 
    
    <p><b>7. Clients Disclaimer/Indemnity </b></p>
    <p>7.1 The Client hereby disclaims any right to rescind, or cancel the contract or to sue for damages or to claim restitution arising out of any misrepresentation made to him by any servant or agent of the Consultant and the Client acknowledges that he buys the Services relying solely upon his own skill and judgement.</p> 
    <p>7.2 The Client undertakes to indemnify the Consultant against any loss or damages suffered and/or any costs incurred by the Consultant as a result of any direct or indirect consequence of the employment of Temporary Candidates including but not limited to circumstances involving contributory negligence. </p>
    <p>7.3 In no circumstances shall the Consultant be liable for any personal injury resulting in injury or death, loss and/or damage or expense arising out of or caused by any act or omission of a Temporary Candidate whether or not any such act or omission is negligent, and the Client acknowledges and agrees to indemnify Temporary Candidates against all such liability whether alleged or proved. The Client is to include all Temporary Candidates in the Clients own public liability insurance cover.</p> 
    
    <p><b>8. Client Obligations </b></p>
    <p>8.1 The Client acknowledges that the Consultant does not perform any services required of our employees or independent contractors; but instead supply our employees and independent contractors, at the Client’s request, to perform the work it has requested.  From the time that our employees or independent contractors report to the client for their duties they are under the care, control and supervision of the Client for the duration of the assignment.  The Client agrees that the Consultant will not be liable to the Client in respect of any damage, loss or injury of whatsoever nature or kind, however caused, whether by the Consultant’s negligence or the negligence of one of our workers, their servants or agents or otherwise, which may be suffered or incurred, whether directly or indirectly, in respect of the services provided under these conditions of placement.</p> 
    <p>9. Cancellation </p>
    <p>9.1 The Consultant may cancel these terms and conditions or cancel delivery of Services at any time before the Services are delivered by giving written notice.  The Consultant shall not be liable for any loss or damage whatsoever arising from such cancellation.</p> 
   
    <p><b> 10. The Commonwealth Competition and Consumer Act 2010  and Fair Trading Acts </b></p>
    <p>10.1 Nothing in this agreement is intended to have the affect of contracting out of any applicable provisions of the Competition and Consumer Act 2010 or the Fair Trading Acts in each of the States and Territories of Australia, except to the extent permitted by those Acts where applicable.</p> 
    
    <p><b>11. Default & Consequences Of Default </b></p>
    <p>11.1 Interest on overdue invoices shall accrue from the date when payment becomes due daily until the date of payment at a rate of 2.5% per calendar month and shall accrue at such a rate after as well as before any judgement.</p> 
    <p>11.2 If the Client defaults in payment of any invoice when due, the Client shall indemnify the Consultant from and against all the Consultant’s costs and disbursements including on a solicitor and own Client basis and in addition all of the Consultant’s nominees costs of collection.</p> 
    <p>11.3 Without prejudice to any other remedies the Consultant may have, if at any time the Client is in breach of any obligation (including those relating to payment), the Consultant may suspend or terminate the supply of Services to the Client and any of its other obligations under the terms and conditions.  The Consultant will not be liable to the Client for any loss or damage the Client suffers because the Consultant exercised its rights under this clause.</p> 
    <p>11.4 If any account remains unpaid at the end of the second month after supply of the Services the following shall apply:  An immediate amount of the greater of $50.00 or 10.00% of the amount overdue shall be levied for administration fees which sum shall become immediately due and payable. </p>
    <p>11.5 In the event that: </p>
    <p style="padding-left: 10px">(a) any money payable to the Consultant becomes overdue, or in the Consultant’s opinion the Client will be unable to meet its payments as they fall due; or</p> 
    <p style="padding-left: 10px">(b) the Client becomes insolvent, convenes a meeting with its creditors or proposes or enters into an arrangement with creditors, or makes an assignment for the benefit of its creditors; or</p> 
    <p style="padding-left: 10px">(c) a receiver, manager, liquidator (provisional or otherwise) or similar person is appointed in respect of the Client or any asset of the Client;  </p>
    <p>then without prejudice to the Consultant’s other remedies at law </p>
    <p style="padding-left: 10px">(i) the Consultant shall be entitled to cancel all or any part of any order of the Client which remains unperformed in addition to and without prejudice to any other remedies; and</p> 
    <p style="padding-left: 10px">(ii) all amounts owing to the Consultant shall, whether or not due for payment, immediately become payable. </p>
    
    <p><b>12. Privacy Act 1988 </b></p>
    <p>12.1 The Client agrees for the Consultant to obtain from a credit-reporting Consultant a credit report containing personal credit information about the Client in relation to credit provided by the Consultant.</p> 
    <p>12.2 The Client agrees that the Consultant may exchange information about the Client with those credit providers named in the Application for Credit account or named in a consumer credit report issued by a reporting Consultant for the following purposes:</p> 
    <p style="padding-left: 10px">(a) To assess an application from the Client; </p>
    <p style="padding-left: 10px">(b) To notify other credit providers of a default by the Client;</p> 
    <p style="padding-left: 10px">(c) To exchange information with other credit providers as to the status of this credit account, where the Client is in default with other credit providers; and</p> 
    <p style="padding-left: 10px">(d) To assess the credit worthiness of the Client. </p>
    <p>12.3 The Client consents to the Consultant being given a consumer credit report to collect overdue payment on commercial credit (Section 18K(1)(h) Privacy Act 1988).</p> 
    <p>12.4 The Client agrees that Personal Data provided may be used and retained by the Consultant for the following purposes and for other purposes as shall be agreed between the Client and Consultant or required by law from time to time:</p> 
    <p style="padding-left: 10px">(a) provision of Services; </p>
    <p style="padding-left: 10px">(b) marketing of Services by the Consultant, its agents or distributors in relation to the Services;</p> 
    <p style="padding-left: 10px">(c) analysing, verifying and/or checking the Client’s credit, payment and/or status in relation to provision of Services;</p> 
    <p style="padding-left: 10px">(d) processing of any payment instructions, direct debit facilities and/or credit facilities requested by the Client;  and </p>
    <p style="padding-left: 10px">(e) enabling the daily operation of the Client’s account and/or the collection of amounts outstanding in the Client’s account in relation to the Services.</p> 
    <p>12.5 The Consultant may give information about the Client to a credit reporting Consultant for the following purposes: </p>
    <p style="padding-left: 10px">(a) to obtain a consumer credit report about the Client; and or </p>
    <p style="padding-left: 10px">(b) allow the credit reporting Consultant to create or maintain a credit information file containing information about the Client.</p> 
    
    <p><b>13. Consultant Disclaimer </b></p>
    <p>13.1 The Consultant endeavours to provide accurate background on Candidates qualifications and experience. However these details are based on information made available by Candidates and referees. Therefore no responsibility can be accepted by the Consultant for errors, omissions, or incorrect conclusions.</p> 
    <p>13.2 Whilst the Consultant makes every effort to submit Candidates that are suitable for client needs, no liability will be accepted for any loss, or damage, or other costs irrespective of how they are caused which a Client may suffer, or for which a Client may become liable arising out of, or in connection with the introduction of a Candidate to a Client company.</p> 
    <p>14. Temporary Candidates </p>
    <p>14.1 The Consultant agrees to use its best endeavours to supply suitable, competent Temporary Candidates to its Clients based on the Client’s requirements. The Client agrees to clearly instruct the Consultant of its requirements for Temporary Candidates and to notify the Consultant immediately if there is any change in those requirements.</p> 
    <p>14.2 Minimum booking for Temporary Candidates is eight hours. Cancellation of booking must allow Temporary Candidates travelling time from home to place of assignment.  Otherwise, a fee of four hours is payable at quoted rates. </p>
    <p>14.3 In the event that the Consultant receives notice from the Client that the Client is dissatisfied with a Temporary Candidate provided by the Consultant, within four hours of that Candidate commencing, no charge will be made to the Client for the four hours worked by the Candidate.</p> 
    <p>14.4 Every effort is made by the Consultant to ensure the highest standards of integrity within their Temporary Candidates.  However, no responsibility can be accepted by the Consultant for any error, losses, expense, damage, delay or arising risk where a Temporary Candidate is required as part of any assignment to handle money’s, securities, valuables or confidential information.</p> 
    <p>14.5 The Consultant will pay Temporary Candidates and invoice the Client on the basis of working hours shown on the Consultant’s time sheet.  The Client undertakes to have each weekly time sheet of each Temporary Candidate approved and endorsed by an authorised person employed by the Client. </p>
    <p>14.6 Should you, the Client, require the services of a Consultant Temporary Candidate at any time within six months of termination of temporary employment, a booking must only be made through the Consultant.   </p>
    <p>14.7 It is the responsibility of the Client to  </p>
    <p style="padding-left: 10px">(a) provide supervision of Temporary Candidates to ensure that work is carried out to a satisfactory standard; and</p> 
    <p style="padding-left: 10px">(b) provide Temporary Candidates with appropriate information, supervision and training to enable them to work safely; and</p> 
    <p style="padding-left: 10px">(c) provide our Temporary Candidate with a workplace-specific and job-specific induction.  This induction is to be completed before the Temporary Candidate commences work with the Client; and</p> 
    <p style="padding-left: 10px">(d) familiarise the Temporary Candidate with the Clients operations, facilities, policies and procedures, and properly inform the Consultant of any specific requirements of the job for which the Temporary Candidate has been hired to perform.; and</p> 
    <p style="padding-left: 10px">(e) provide safe working conditions and to comply with all statutory and other obligations that are applicable pursuant to Australian law (including, but not limited to, legislation relating to workplace health and safety) to employers and otherwise to treat Temporary Candidate as if they were employed by the Client; and</p> 
    <p style="padding-left: 10px">(f) effect and maintain insurance cover in respect of any claims which may be made against the Client by a Temporary Candidate that arise as a result of the Clients occupation of premises, and otherwise in respect of any act or omission in respect of machinery, equipment or vehicle(s) used by Temporary Candidate, and to indemnify the Consultant against any such claims.</p> 
    <p style="padding-left: 10px">(g) provide payment for wet weather as per the relevant award, EBA, etc. </p>
    <p>14.8 The Client acknowledges that they remain responsible for controlling the manner, time and place in which the Temporary Candidate shall carry out their duties as assigned by the Client and that in doing so the Client shall be liable for all acts and omissions of Temporary Candidates as for employees that have been employed directly by the Client.</p> 
    <p>14.9 The Consultant may replace a Temporary Candidate at any time with another Temporary Candidate of comparable qualifications without notice to you, however the Consultant shall endeavour to notify the Client before doing so. </p>
    <p>14.10 In the event of any disputes or claims, you must notify the Consultant within thirty (30) days of any such occurrence. If the Client shall fail to comply with this provision the Services shall be conclusively presumed to be in accordance with the terms and conditions and free from any disputes or claims.</p> 
    
    <p><b>15 Candidate Fee </b></p>
    <p>15.1 Without limiting any other clause in this agreement, the Client must pay to pay the Candidate Fee set out in clause 15.2 to the Consultant on the date that it or any affiliated or related body corporate:</p> 
    <p style="padding-left: 10px">(a) engages (whether directly or indirectly) a person who is, or was, a Temporary Candidate in any role; or </p>
    <p style="padding-left: 10px">(b) is involved in any way in placing a Temporary Candidate in any role with any other entity.</p> 
    <p>15.2 For the purposes of clause 15.1, the Candidate Fee is the percentage of fee which corresponds in the table below with the Last Placement Period of temporary employment for the respective Temporary Candidate:</p> 
    
    <table class="table table-bordered table-condensed">
        <tr>
            <td>Last Placement Period in months</td>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            <td>9</td>
            <td>10</td>
            <td>11</td>
        </tr>
        <tr>
            <td>Percentage of Fee</td>
            <td>100</td>
            <td>90</td>
            <td>80</td>
            <td>70</td>
            <td>60</td>
            <td>50</td>
            <td>40</td>
            <td>30</td>
            <td>20</td>
            <td>10</td>
            <td>0</td>
        </tr>
    </table>
    
    <p>15.3 For the purposes of this clause, where one or more Clients enter into this agreement they are jointly and severally liable for any Candidate Fee which becomes owing to the Consultant under clause 15.1.</p> 
    <p>15.4 Nothing in this clause affects (including restricts) the Consultant's ability to seek any legal redress or relief that may become available to it as a result of a Temporary Candidate leaving </p>
    <p>its employment in the circumstances described in clause 15.1, including in respect of loss, damage or relief relating to any breach of a confidentiality obligation imposed upon the Client by law or equity.</p> 
    <p>15.5 Interest on unpaid Candidate Fee will accrue at a rate of 2.5% per calendar month and shall accrue at such a rate after as well as before any judgement. </p>
    <p>15.6 Clause 11.2 applies to unpaid Candidate Fees as if the reference to a default on invoice was a reference to a default in paying the relevant Candidate Fee. </p>
    <p>15.7 The Client must immediately notify the Consultant if any of the placements referred to in clause 15.1 are in prospect or have occurred. </p>
    
    <p><b>16 General</b></p> 
    <p>16.1 If any provision of these terms and conditions shall be invalid, void, illegal or unenforceable the validity, existence, legality and enforceability of the remaining provisions shall not be affected, prejudiced or impaired.</p> 
    <p>16.2 All Services supplied by the Consultant are subject to the laws of New South Wales and the Consultant takes no responsibility for changes in the law which affect the Services supplied. </p>
    <p>16.3 The Consultant shall be under no liability whatsoever to the Client for any indirect loss and/or expense (including loss of profit) suffered by the Client arising out of a breach by the Consultant of these terms and conditions.</p> 
    <p>16.4 In the event of any breach of this contract by the Consultant the remedies of the Client shall be limited to damages. Under no circumstances shall the liability of the Consultant exceed the Fee of the Services. </p>
    <p>16.5 The Client shall not set off against the Fee amounts due from the Consultant. </p>
    <p>16.6 The Consultant reserves the right to review these terms and conditions at any time and from time to time.  If, following any such review, there is to be any change in such terms and conditions, that change will take effect from the date on which the Consultant notifies the Client of such change.</p> 
    <p>16.7 Neither party shall be liable for any default due to any act of God, terrorism, war, strike, lock out, industrial action, fire, flood, drought, storm or other event beyond the reasonable control of either party. </p>
    <p>16.8 Neither this agreement nor any rights or obligations hereunder may be assigned or otherwise transferred by either party without the prior written permission of the other. </p>

    <?php endif;?>
    
    <?php if (!$client_application) : ?>
    <button class="btn btn-block btn-warning approve-rate" disabled="disabled">Please fill in the client application form</button>
    <?php elseif ($charge["is_approved"]) : ?>
    <button class="btn btn-block btn-primary approve-rate" disabled="disabled"><i class="icon-ok icon-white"></i> Rate already approved</button>
    <?php elseif ($client["can_approve"]) : ?>
    <button type="submit" class="btn btn-block btn-primary approve-rate">Approve this rate</button>
    <?php endif ?>
</div>

<!-- APPROVE MODAL -->
<div id="approveModal" class="modal hide fade" tabindex="-1" role="dialog">
    <form style="margin: 0px;" action="<?php echo base_url("client/pcs/approve_rate") ?>" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Approval Confirmation</h3>
        </div>
        <input type="hidden" name="approve_trans_no" id="hid-approve-id" value="<?php echo $charge["trans_no"] ?>">
        <div class="modal-body">
            <p>Are you sure you want to approve this rate?</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="approve-btn-modal">Confirm</button>
            </form>
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        </div>
</div>
<!-- END APPROVE MODAL -->

<script>
    $(".approve-rate").click(function(){
        $("#approveModal").modal("show");
        return false;
    });
    
    $("#approve-btn-modal").click(function(){
        $("#approveModal").modal("hide");
        $("#loadingModal").modal("show");
    })
</script>

<?php echo $footer?>