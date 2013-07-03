<?php echo $header ?>
<script src="<?php echo base_url("public/js/client/client.js")?>"></script>

<!-- APPROVE MODAL -->
<div id="approveModal" class="modal hide fade" tabindex="-1" role="dialog">
    <form style="margin: 0px;" action="<?php echo base_url("client/pcs/approve_rate") ?>" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Approval Confirmation</h3>
        </div>
        <input type="hidden" name="approve_trans_no" id="hid-approve-id">
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

<div class="topmargin"></div>

<input type="hidden" id="hid-base-url" value="<?php echo base_url()?>"/>
<div class="row">
    <div class="span3">
    	<h4>Client/s</h4>
        <ul class="nav nav-tabs nav-stacked" style="overflow: auto; height: 500px;">
        <?php foreach ($get_company as $company) : ?>
            <li>
                <a href="<?php echo base_url("client/pcs/rates/".$company["client_no"]."")?>">
                    <?php echo $company["client_no"]." - ".$company["company_name"] ?>
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
    		
    		<div>
    			<div class="tab-pane fade in active" id="cur_rate">
    				<table class='table table-bordered table-condesed table-stripped' style="font-size: 12px">
    					<thead>
    				 		<tr>
    					 		<th>Trans. No.</th>
    					 		<th>Trans. Name</th>
    					 		<th>Status</th>
    					 		<th>Action</th>
    				 		</tr>
    			 		</thead>
    			 		<tbody>
    			 			<?php foreach ($get_award as $value) :?>
    							 <tr>
    							 	<td><?php echo $value["trans_no"]?></td>
    							 	<td><?php echo $value["transaction_name"]?></td>
    							 	<td><?php echo ($value["is_approved"]) ? "Approved" : "Pending for approval" ?></td>
    							 	<td>
    							 	    <div class="btn-group">
                                            <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                                                Action <span class="caret"></span>
                                            </a>
        							 	    <ul class="dropdown-menu pull-right">
        							 	        <li><a target="_blank" href="<?php echo base_url("client/pcs/termsAndCondition/".$value["trans_no"]."/".$value["modern_award_no"])?>">
                                                    <i class="icon-print"></i> Terms and Condition</a></li>
                                                <li>
                                                <?php if ($value["trans_type"] == "1") : ?>
            							 		<li>
            							 		    <a target="_blank" href="<?php echo base_url("client/pcs/getChargeRate/".$value["trans_no"]."/".$value["modern_award_no"])?>">
            							 			<i class="icon-print"></i> Pay and Charge Rate Schedule
            							 			</a>
            							 	    </li>
            							 	    <?php else : ?>
            							 	    <li>
                                                    <a target="_blank" href="<?php echo base_url("client/pcs/print_client/".$value["trans_no"])?>">
                                                    <i class="icon-print"></i> Pay and Charge Rate Schedule
                                                    </a>
                                                </li> 
            							 	    <?php endif ?>
            							 		<li><a target="_blank" href="<?php echo base_url("client/pcs/getUpcomingRates/".$value["trans_no"])?>">
            							 			<i class="icon-print"></i> Upcoming Rates</a></li>
            							 		<li><a target="_blank" href="<?php echo base_url("client/pcs/getRateHistory/".$value["trans_no"])?>">
            							 			<i class="icon-print"></i> Rate History</a></li>
            							 	    <?php if (!$value["is_approved"]) : ?>
                                                <li>    
                                                    <a href="#" class="approve-rate" a-id="<?php echo $value["trans_no"] ?>">
                                                        <i class="icon-ok"></i> Approve This Rate
                                                    </a>
                                                </li>
                                                <?php endif ?>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon-list-alt"></i> Forecast
                                                    </a>
                                                </li>
        							 		</ul>
    							 		</div>
    							 	</td>
    							 </tr
    						<?php endforeach; ?>
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
<script>
    $(".approve-rate").click(function(){
        $("#hid-approve-id").val($(this).attr("a-id"));
        $("#approveModal").modal("show");
        return false;
    });
    
    $("#approve-btn-modal").click(function(){
        $("#approveModal").modal("hide");
        $("#loadingModal").modal("show");
    })
</script>
