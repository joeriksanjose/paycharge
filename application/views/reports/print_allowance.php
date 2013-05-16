<?php echo $header;?>

<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Allowance <small>( <?php echo $charge_rate["transaction_name"]?> )</small></h2>
	   
		<hr>
	</div>
	
	
	<div style="margin-top: 10px;">
		<label>Applicable Agreement:</label><label><b><?php echo $charge_rate["transaction_name"]?></b></label>
		<table class="table table-bordered table-condensed table-striped" style="margin-top: 20px;">
			<thead>
				<th></th>
				<th>Meal</th>
				<th>First Aid</th>
				<th>L/Hand 3-10 Emps</th>
				<th>L/Hand 10-20 Emps</th>
				<th>L/Hand 20+ Emps</th>
			</thead>
			<tbody>
		<?php 
		$x=1;
		foreach($allow as $value):
		$color="";
		if($x==1 || $x==10):
			$color = "#F2DEDE";
		endif;
		$x++;
		?>
				<tr>
					<td><?php echo $value["description"]?></td>
					<td style="text-align: right;  background-color: <?php echo $color?>"><?php echo $value["meal"]?></td>
					<td style="text-align: right; background-color: <?php echo $color?>"><?php echo $value["first_aid"]?></td>
					<td style="text-align: right; background-color: <?php echo $color?>"><?php echo $value["L_hand_3"]?></td>
					<td style="text-align: right; background-color: <?php echo $color?>"><?php echo $value["L_hand_10"]?></td>
					<td style="text-align: right; background-color: <?php echo $color?>"><?php echo $value["L_hand_20"]?></td>
				</tr>
		<?php endforeach;?>
			</tbody>
		</table>
		
		<table>
			<thead>
				<th>Allowance Rule</th>
				
				
			</thead>
			
			<tbody>
				<tr><td><?php echo $modern["C_52"]?></td></tr>
				<tr><td><?php echo $modern["C_53"]?></td></tr>
				<tr><td><?php echo $modern["C_54"]?></td></tr>
				<tr><td><?php echo $modern["C_55"]?></td></tr>
				<tr><td><?php echo $modern["C_56"]?></td></tr>
				<tr><td><?php echo $modern["C_57"]?></td></tr>
			</tbody>
		</table>
	</div>		
</div>
<?php echo $footer;?>