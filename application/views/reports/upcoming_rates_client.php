<?php echo $header;?>

<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Upcoming Rate Increase <small>( Client Agreement )</small></h2>
	</div>
</div>
<div class="topmargin"></div>
<div class="row">
	
	
		
	<div style="margin-top: 10px;">
		
		
		<?php foreach($charge_rate as $value):?>
			<table cellpadding="5">
				<tr>
					<td>Transaction Name</td>
					<td>:</td>
					<td><?php echo $value["transaction_name"]?></td>
				</tr>
				
				<tr>
					<td>Company</td>
					<td>:</td>
					<td><?php echo $value["company"]?></td>
				</tr>
				
				<tr>
					<td>Effective Date</td>
					<td>:</td>
					<td><?php echo $value["created_at"]?></td>
				</tr>
			</table>
			
			<hr>
			
			<table>
				<tr>
					<td width="200"><b>Rate 1</b></td>
					<td  width="50"><b>:</b></td>
					<td width="200"><?php echo $value["rate_1"] ?></td>
					
					<td width="200"><b>Rate 6</b></td>
					<td width="50"><b>:</b></td>
					<td width="200"><?php echo $value["rate_6"] ?></td>
				</tr>
				
				<tr>
					<td><b>Rate 2</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_2"] ?></td>
					
					<td><b>Rate 7</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_5"] ?></td>
				</tr>
				
				<tr>
					<td><b>Rate 3</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_3"] ?></td>
					
					<td><b>Rate 8</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_8"] ?></td>
				</tr>
				
				<tr>
					<td><b>Rate 4</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_4"] ?></td>
					
					<td><b>Rate 9</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_9"] ?></td>
				</tr>
				
				<tr>
					<td><b>Rate 5</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_5"] ?></td>
					
					<td><b>Rate 10</b></td>
					<td><b>:</b></td>
					<td><?php echo $value["rate_10"] ?></td>
				</tr>
				
			</table>
		<?php endforeach;?>
	</div>	
</div>
<?php echo $footer;?>