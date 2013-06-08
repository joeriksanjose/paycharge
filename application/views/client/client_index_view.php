<?php echo $header ?>
<script src="<?php echo base_url("public/js/client/client.js")?>"></script>

<div class="topmargin"></div>

<input type="hidden" id="hid-base-url" value="<?php echo base_url()?>"/>
<div class="row">
<div class="span3">
	<h4>Client/s</h4>
    <ul class="nav nav-tabs nav-stacked" style="overflow: auto; height: 500px;">
    <?php foreach ($get_company as $company) : ?>
        <li>
            <a href="<?php echo base_url("client/pcs/award/".$company["client_no"]."")?>"><?php echo $company["company_name"] ?>
                
            </a>
        </li>
        <li class="divider"></li>
    <?php endforeach ?>
	</ul>
</div>

<div class="span9">
	
	<?php if($ok): ?>
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active">
				<a data-toggle="tab" href="#cur_rate">
					Current Rate
				</a> 
			</li>
			<li>
				<a data-toggle="tab" href="#terms">
					Terms and Conditions
				</a> 
			</li>
			<li>
				<a data-toggle="tab" href="#client">
					Client Application
				</a> 
			</li>
			<li>
				<a data-toggle="tab" href="#forecasting">
					Forecasting
				</a> 
			</li>
		</ul>
		
		<div class="tab-content">
			<div class="tab-pane fade in active" id="cur_rate">
				<table class='table table-bordered table-condesed table-stripped' style="font-size: 12px">
					<thead>
				 		<tr>
					 		<th>Trans. No.</th>
					 		<th>Trans. No.</th>
					 		<th>Action</th>
				 		</tr>
			 		</thead>
			 		<tbody>
			 			<?php foreach ($get_award as $value) :?>
							 <tr>
							 	<td><?php echo $value["trans_no"]?></td>
							 	<td><?php echo $value["transaction_name"]?></td>
							 	<td>
							 		<a class="btn btn-mini" href="<?php echo base_url("client/pcs/getChargeRate/".$value["trans_no"]."/".$value["modern_award_no"])?>">
							 			View</a>
							 		<a class="btn btn-mini" href="<?php echo base_url("client/pcs/getUpcomingRates/".$value["trans_no"])?>">
							 			Upcoming Rates</a>
							 		<a class="btn btn-mini" href="<?php echo base_url("client/pcs/getRateHistory/".$value["trans_no"])?>">
							 			Rate History</a>
							 	</td>
							 </tr>
						<?php endforeach; ?>
			 		</tbody>
			 	</table>
				
			</div>
			<div class="tab-pane" id="terms">
				cur
			</div>
			<div class="tab-pane" id="client">
				cur
			</div>
			<div class="tab-pane" id="forecasting">
				cur
			</div>
		</div>
	</div>
	
	
	
</div>
<?php endif; ?>

</div>
<?php echo $footer ?>
