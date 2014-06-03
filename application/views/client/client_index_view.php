<?php
function formatDate($date)
{
    return date("d/m/Y", strtotime($date));
}

?>
<?php echo $header ?>
<script src="<?php echo base_url("public/js/client/client.js")?>"></script>

<div class="topmargin"></div>

<input type="hidden" id="hid-base-url" value="<?php echo base_url()?>"/>
<div class="row">
    <div class="span3">
    	<h4>Client/s</h4>
        
        <?php foreach ($get_company as $company) : ?>
            <ul class="nav nav-tabs nav-stacked" style="margin-bottom: 10px;">
                <li>
                    <!-- <a href="<?php echo base_url("client/pcs/rates/".$company["client_no"]."")?>">
                        <?php echo $company["client_no"]." - ".$company["company_name"] ?>
                    </a> -->
                    <a href="#" class="company-link" client-no="<?php echo $company["client_no"] ?>">
                        <?php echo $company["client_no"]." - ".$company["company_name"] ?>
                    </a>
                </li>
                <li id="<?php echo $company["client_no"] ?>" style="display:none;">
                    <ul class="nav nav-tabs nav-stacked" style="margin-bottom: 0px;">
                        <li><a href="<?php echo base_url("client/pcs/current_rate/".$company["client_no"]."")?>">Current Rate</a></li>
                        <li><a href="<?php echo base_url("client/pcs/pending_rates/".$company["client_no"]."")?>">Pending Approval</a></li>
                        <li><a href="<?php echo base_url("client/pcs/history_rates/".$company["client_no"]."")?>">History Rate</a></li>
                        <li><a href="<?php echo base_url("client/pcs/client_application/".$company["client_no"]."")?>">Client Application</a></li>
                        <li><a href="<?php echo base_url("client/pcs/forecasting/".$company["client_no"]."")?>">Forecasting</a></li>
                    </ul>
                </li>
            </ul>
        <?php endforeach ?>

    </div>
    
    <div class="span9">
    	
    	<?php if($ok): ?>
    	<div class="tabbable">
    		<!-- <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#cur_rate">
                        Current Rate
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#cur_rate">
                        Pending Approval
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#cur_rate">
                        History Rate
                    </a>
                </li>
    			<li>
    				<a href="<?php echo base_url("client/pcs/client_application/".$company_no)?>">
    					Client Application
    				</a> 
    			</li>
    			<li>
    				<a data-toggle="tab" href="#forecasting">
    					Forecasting
    				</a> 
    			</li>
    		</ul> -->
    		
    		<div>
                <h3><?php echo $company_info["client_no"]." - ".$company_info["company_name"]." (".$header_title.") " ?></h3>
    			<div class="tab-pane fade in active" id="cur_rate">
    				<table class='table table-bordered table-condesed table-stripped' style="font-size: 12px">
    					<thead>
    				 		<tr>
    					 		<th>Trans. No.</th>
    					 		<th>Trans. Name</th>
    					 		<th>Date of Quotation</th>
    					 		<th>Status</th>
    					 		<!-- <th>Action</th> -->
    				 		</tr>
    			 		</thead>
    			 		<tbody>
    			 		    <?php if (!$get_award) : ?>
    			 		        <tr>
    			 		            <td colspan="4">Empty record.</td>
    			 		        </tr>
    			 		    <?php else : ?>
    			 			<?php foreach ($get_award as $value) :?>
    							 <tr>
    							 	<td><?php echo $value["trans_no"]?></td>
    							 	<?php if ($value["trans_type"] == "1") : ?>
    							 	<td><a href="<?php echo base_url("client/pcs/charge_rate/".$value["trans_no"]."/".$value["modern_award_no"])?>"><?php echo $value["transaction_name"]?></a></td>
    							 	<?php else : ?>
    							 	<td><a href="<?php echo base_url("client/pcs/charge_rate_client/".$value["trans_no"])?>"><?php echo $value["transaction_name"]?></a></td>
    							 	<?php endif ?>
    							 	<td><?php echo formatDate($value["date_of_quotation"]) ?></td>  
    							 	<td><?php echo ($value["is_approved"]) ? "Approved" : "Pending for approval" ?></td>
    							 	<!-- <td>
    							 	    <div class="btn-group">
                                            <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                                                Action <span class="caret"></span>
                                            </a>
        							 	    <ul class="dropdown-menu pull-right">
        							 	        <li><a target="_blank" href="<?php echo base_url("client/pcs/terms_conditions/".$value["trans_no"])?>">
                                                    <i class="icon-print"></i> Terms and Condition</a></li>
                                                <li>
                                                <?php if ($value["trans_type"] == "1") : ?>
            							 		<li>
            							 		    <a target="_blank" href="<?php echo base_url("client/pcs/charge_rate/".$value["trans_no"]."/".$value["modern_award_no"])?>">
            							 			<i class="icon-print"></i> Pay and Charge Rate Schedule
            							 			</a>
            							 	    </li>
            							 	    <?php else : ?>
            							 	    <li>
                                                    <a target="_blank" href="<?php echo base_url("client/pcs/charge_rate_client/".$value["trans_no"])?>">
                                                    <i class="icon-print"></i> Pay and Charge Rate Schedule
                                                    </a>
                                                </li> 
            							 	    <?php endif ?>
            							 		<li><a target="_blank" href="<?php echo base_url("client/pcs/upcoming_rates/".$value["trans_no"])?>">
            							 			<i class="icon-print"></i> Upcoming Rates</a></li>
            							 		<li><a target="_blank" href="<?php echo base_url("client/pcs/rates_history/".$value["trans_no"])?>">
            							 			<i class="icon-print"></i> Rate History</a></li>
            							 	    <?php if (!$value["is_approved"]) : ?>
                                                <li>    
                                                    <a href="#" class="approve-rate" a-id="<?php echo $value["trans_no"] ?>">
                                                        <i class="icon-ok"></i> Approve This Rate
                                                    </a>
                                                </li>
                                                <?php endif ?>
                                                <?php if ($value["trans_type"] == "1") : ?>
                                                <li>
                                                    
                                                    <a target="_blank"  href="<?php echo base_url("client/pcs/forecast_award/".$value["trans_no"]."/".$value["modern_award_no"])?>">
                                                        <i class="icon-list-alt"></i> Forecast
                                                    </a>
                                                </li>
                                                <?php else : ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo base_url("client/pcs/forecast_agreement/".$value["trans_no"])?>">
                                                        <i class="icon-list-alt"></i> Forecast
                                                    </a>
                                                </li>
                                                <?php endif;?>
        							 		</ul>
    							 		</div>
    							 	</td> -->
    							 </tr>
    						<?php endforeach; ?>
    						<?php endif ?>
    			 		</tbody>
    			 	</table>
    				
    			</div>
    			<div class="tab-pane" id="client">
    
    			</div>
    			<div class="tab-pane" id="forecasting">
    
    			</div>
    		</div>
    	</div>	
    </div>
    <?php endif; ?>

</div>
<?php echo $footer ?>
