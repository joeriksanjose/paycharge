<?php echo $header;?>

<?php
   require_once("forecast_helper.php");

   $th = "<th></th>";
   if ($print["normal"]) {
       $th .= '<th>Normal</th>';
   }
   if ($print["early"]) {
       $th .= '<th>Early</th>';
   }
   if ($print["afternoon"]) {
       $th .= '<th>Afternoon</th>';
   }
   if ($print["night"]) {
       $th .= '<th>Night</th>';
   }
   if ($print["50_shift"]) {
       $th .= '<th>50% Shift</th>';
   }
   if ($print["t_14"]) {
       $th .= '<th>T 1/4</th>';
   }
   if ($print["t_12"]) {
       $th .= '<th>T 1/2</th>';
   }
   if ($print["double"]) {
       $th .= '<th>Double</th>';
   }
   if ($print["dt_12"]) {
       $th .= '<th>DT 1/2</th>';
   }
   if ($print["triple"]) {
       $th .= '<th>Triple</th>';
   }
?>

<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Rate Confirmation <small>( <?php echo $charge_rate["transaction_name"]?> )</small></h2>
	   
		<hr>
	</div>
	
	
	<div class="tabbable" style="margin-top: 10px;">
		<ul class="nav nav-tabs">
			<?php if($print["grade1"]):?>
			<li class="<?php echo $grade1_active?>"><a href="#grade1" data-toggle="tab">Grade1</a></li>
			<?php endif;
			if($print["grade2"]):?>
			<li class="<?php echo $grade2_active?>"><a href="#grade2" data-toggle="tab">Grade2</a></li>
			<?php endif;
			if($print["grade3"]):?>
			<li class="<?php echo $grade3_active?>"><a href="#grade3" data-toggle="tab">Grade3</a></li>
			<?php endif;
			if($print["grade4"]):?>
			<li class="<?php echo $grade4_active?>"><a href="#grade4" data-toggle="tab">Grade4</a></li>
			<?php endif;
			if($print["grade5"]):?>
			<li class="<?php echo $grade5_active?>"><a href="#grade5" data-toggle="tab">Grade5</a></li>
			<?php endif;
			if($print["grade6"]):?>
			<li class="<?php echo $grade6_active?>"><a href="#grade6" data-toggle="tab">Grade6</a></li>
			<?php endif;
			if($print["grade7"]):?>
			<li class="<?php echo $grade7_active?>"><a href="#grade7" data-toggle="tab">Grade7</a></li>
			<?php endif;
			if($print["grade8"]):?>
			<li class="<?php echo $grade8_active?>"><a href="#grade8" data-toggle="tab">Grade8</a></li>
			<?php endif;
			if($print["grade9"]):?>
			<li class="<?php echo $grade9_active?>"><a href="#grade9" data-toggle="tab">Grade9</a></li>
			<?php endif;
			if($print["grade10"]):?>
			<li class="<?php echo $grade10_active?>"><a href="#grade10" data-toggle="tab">Grade10</a></li>
			<?php endif;?>
		</ul>
		
		<div class="tab-content">
			<?php if($print["grade1"]):?>
			<div class="tab-pane <?php echo $grade1_active?>" id="grade1">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 1</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_1["payrate"]?> / <?php echo $payrate_1["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
					    <?php echo $th ?>
					</thead>
					<tbody>
        				<?php 
        				$x=1;
        				foreach($ml1 as $value):
            				list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 1);
            			    echo $tr1;
        				endforeach;?>
        				<?php 
        				    echo $tr2; 
        				    echo $tr3;
        				    echo $tr4;
        				?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade2"]):?>
			<div class="tab-pane <?php echo $grade2_active?>" id="grade2">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 2</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_2["payrate"]?> / <?php echo $payrate_2["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
    				<?php 
    				    $x=1;
    				    foreach($ml2 as $value):
    				        list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 2);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade3"]):?>
			<div class="tab-pane <?php echo $grade3_active?>" id="grade3">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 3</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_3["payrate"]?> / <?php echo $payrate_3["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
				    <?php 
				        $x=1;
				        foreach($ml3 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 3);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade4"]):?>
			<div class="tab-pane <?php echo $grade4_active?>" id="grade4">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 4</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_4["payrate"]?> / <?php echo $payrate_4["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
				    <?php 
				        $x=1;
				        foreach($ml4 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 4);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade5"]):?>
			<div class="tab-pane <?php echo $grade5_active?>" id="grade5">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 5</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_5["payrate"]?> / <?php echo $payrate_5["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
    				<?php 
    				    $x=1;
    				    foreach($ml5 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 5);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade6"]):?>
			<div class="tab-pane <?php echo $grade6_active?>" id="grade6">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 6</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_6["payrate"]?> / <?php echo $payrate_6["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
				    <?php 
				        $x=1;
				        foreach($ml6 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 6);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade7"]):?>
			<div class="tab-pane <?php echo $grade7_active?>" id="grade7">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 7</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_7["payrate"]?> / <?php echo $payrate_7["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
    				<?php 
        				$x=1;
        				foreach($ml7 as $value):
    				        list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 7);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade8"]):?>
			<div class="tab-pane <?php echo $grade8_active?>" id="grade8">
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 8</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_8["payrate"]?> / <?php echo $payrate_8["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
				    <?php 
				        $x=1;
				        foreach($ml8 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 8);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade9"]):?>
			<div class="tab-pane <?php echo $grade9_active?>" id="grade9">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 9</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_9["payrate"]?> / <?php echo $payrate_9["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
				    <?php 
				        $x=1;
				        foreach($ml9 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 9);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;
			if($print["grade10"]):?>
			<div class="tab-pane <?php echo $grade10_active?>" id="grade10">
				
				<table cellpadding="5">
					<tr>
						<td width="200">Applicable</td>
						<td>:</td>
						<td width="200"><b><?php echo $charge_rate["transaction_name"]?></b></td>
						
						<td width="200">Classification</td>
						<td>:</td>
						<td width="200"><b>Grade 10</b></td>
					</tr>
					<tr>
						<td>Full Time Weekly Rate / Hourly</td>
						<td>:</td>
						<td><b><?php echo $payrate_10["payrate"]?> / <?php echo $payrate_10["base_rate"]?></b></td>
						
						<td>Shift loadings (Early)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_31"], 2, '.', '')?>%</b></td>
					</tr>
					<tr>
						<td>Weekly Normal Time Hours</td>
						<td>:</td>
						<td><b><?php echo $modern["B_26"]?></b></td>
						
						<td>Shift loadings (Afternoon)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_33"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Rate Type</td>
						<td>:</td>
						<td><b><?php echo $charge_rate["D_4"]?></b></td>
						
						<td>Shift loadings (Night)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_35"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td>Title</td>
						<td>:</td>
						<td><b><?php //echo $charge_rate["D_6"]?></b></td>
						
						<td>Shift loadings (50%)</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_37"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_27"], 2, '.', '')?>%</b></td>
					</tr>
					
					<tr>
						<td></td>
						<td></td>
						<td></td>
						
						<td>OT Casual Loading</td>
						<td>:</td>
						<td><b><?php echo number_format((double)$modern["B_28"], 2, '.', '')?>%</b></td>
					</tr>
				</table>
				
				<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
					<thead>
						<?php echo $th ?>
					</thead>
					<tbody>
				    <?php 
				        $x=1;
				        foreach($ml10 as $value):
				            list($tr1, $tr2, $tr3, $tr4, $x) = generate_tr($value, $print, $x, 10);
                            echo $tr1;
                        endforeach;
                    ?>
                    <?php 
                        echo $tr2; 
                        echo $tr3;
                        echo $tr4;
                    ?>
					</tbody>
				</table>
			</div>
			<?php endif;?>
			
		</div>
	</div>
	
</div>
<?php echo $footer;?>
<script src="<?php echo base_url("public/js/client/forecast.js")?>"></script>