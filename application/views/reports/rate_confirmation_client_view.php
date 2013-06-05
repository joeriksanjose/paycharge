<?php echo $header;?>
<script src="<?php echo base_url("public/js/reports/rate_confirmation.js")?>"></script>
<input type="hidden" id="hid-base-url" value="<?php echo base_url()?>"/>

<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Rate Confirmation <small>( <?php echo $type?> )</small></h2>
		<hr>
	</div>
	
<div class="span12" id="search-modern">
		<div class="form-search pull-right">
	        <input type="text" class="input-xlarge search-query" id="search">
	        <button type="button" class="btn" id="btn-search-client"><i class="icon-search"></i></button>
	    </div>
	</div>
	<div class="span12" id="modern-body" style="max-height: 400px; overflow: auto;">
	    <?php if ($status === 1) : ?>
	        <div class="alert alert-success">
	            <button type="button" class="close" data-dismiss="alert">&times;</button>
	            <b>Done!</b> <?php echo $status_msg ?>
	        </div>
	    <?php elseif ($status === 0) : ?>
	       <div class="alert alert-error">
	           <button type="button" class="close" data-dismiss="alert">&times;</button>
               <b>Error!</b> <?php echo $status_msg ?>
           </div>
	    <?php endif ; ?>
	    <div id="div">
		<table class="table table-bordered table-striped" id="award-table" style="margin-top: 15px;">
		    <thead>
			<tr>
				<th>Trans No</th>
				<th>Modern Award Name</th>
				<th>Date Created</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php if(count($modern_awards)) : ?>
			<?php foreach ($modern_awards as $modern_award) : ?>
			<tr>
				<td><?php echo $modern_award["trans_no"] ?></td>
				<td><?php echo $modern_award["transaction_name"] ?></td>
				<td><?php echo $modern_award["created_at"] ?></td>
				<td>
				    <a target="_blank" class="btn edit-award-btn" href="<?php echo base_url("reports/rate_confirmation/print_client/".$modern_award["trans_no"]); ?>"><i class="icon-print"></i></a>
				</td>
			</tr>
			<?php endforeach ; ?>
			<?php else : ?>
			<tr>
				<td colspan="4">Empty Record</td>
			</tr>	
			<?php endif ; ?>
			</tbody>
		</table>
		</div>
	</div>
</div>	
<?php echo $footer;?>