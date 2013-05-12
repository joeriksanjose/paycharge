<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/transaction/sales_modern_award.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url()?>" />
<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Modern Award</h2>
		<hr>
	</div>
	
	<div class="span12">
		<form class="form-horizontal">
			<div class="navbar navbar-fixed-bottom" id="nav-tabs" style="display: none;">
	            <div class="navbar-inner">
	                <div class="container">
	                <ul class="nav pull-right">
	                    <li class="active"><a href="#" id="show-tab-1">TAB 1</a></li>
	                    <li><a href="#" id="show-tab-2">TAB 2</a></li>
	                    <li><a href="#" id="show-tab-3">TAB 3</a></li>
	                    <li><a href="#" id="show-tab-4">TAB 4</a></li>
	                    <li class="divider-vertical"></li>
	                    <li class="pull-right">
	                        <button type="button" class="btn pull-right" style="margin-left: 3px;" id="close-modern-form">Cancel</button>
	                        <input type="submit" class="btn btn-inverse pull-right" value="SAVE">
	                    </li>
	                </ul>
	                </div>
	            </div>
	    	</div>
	    	
	    	<!-- TAB 1 -->
			<div class="span12" id="tab1" style="display:none;">
				<h3>Client Details</h4>
					<hr>
				<div style="height: 20px;"></div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Transaction No.</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium disabled" readonly="true" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Modern Award Name</label>
				    <div class="controls">
				      <select class="input-medium" id="cmb-modern">
				      	<option></option>
				      	<?php foreach ($modern_awards as $value) : ?>
							<option value="<?php echo $value["modern_award_no"]?>"><?php echo $value["modern_award_name"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Company</label>
				    <div class="controls">
				      <select class="input-medium disabled" id="cmb-company">
				      	<option></option>
				      	<?php foreach ($company as $value) : ?>
							<option value="<?php echo $value["client_no"]?>"><?php echo $value["company_name"]?></option>
						<?php endforeach;?>
				      </select>
				      <input type="hidden" id="state_no"/>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Department</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="department" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Address Line 1</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="add1" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Address Line 2</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="add2" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Contact First Name</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="c_first_name" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Contact Full Name</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="c_full_name" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Contact Title</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="c_title" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Date of Quotation</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  
				  <h3>On Cost</h4>
					<hr>
				<div style="height: 20px;"></div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Super %</label>
				    <div class="controls controls-row">
				      <select class="input-medium" id="cmb-super">
				      	<option></option>
				      	<?php foreach ($super as $value) : ?>
							<option value="<?php echo $value["super_no"]?>"><?php echo $value["super"]?></option>
						<?php endforeach;?>
				      </select>
				      <input type="text" id="effective_date" class="input-medium" />
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Workcover %</label>
				    <div class="controls">
				      <select class="input-medium" id="cmb-workcover">
				      	<option></option>
				      	<?php foreach ($workcover as $value) : ?>
							<option value="<?php echo $value["work_cover_no"]?>"><?php echo $value["work_cover"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Industry Rate</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">WIC Code and Description</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="wic_code" name="wic_code">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Labour Power WC</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Payroll Tax %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="tax" name="tax">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Public Liability %</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($public_liability as $value) : ?>
							<option value="<?php echo $value["public_no"]?>"><?php echo $value["public_value"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Insurance $</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($insurance as $value) : ?>
							<option value="<?php echo $value["insurance_no"]?>"><?php echo $value["insurance"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Long Service</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($long_service as $value) : ?>
							<option value="<?php echo $value["long_services_no"]?>"><?php echo $value["long_services"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Admin %</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($admin as $value) : ?>
							<option value="<?php echo $value["admin_no"]?>"><?php echo $value["admin"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  
				   <h3>Payroll Information</h3>
					<hr>
				<div style="height: 20px;"></div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Standard Labour Hire/Transition/Limited Tenure</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">Which level do you want set up in FT</label>
				    <div class="controls">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 1</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 2</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 3</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 4</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 5</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 6</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 7</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 8</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 9</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_name">What Position titles Level 10</label>
				    <div class="controls">
				      <select class="input-medium">
				      	<option></option>
				      	<?php foreach ($position as $value) : ?>
							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
						<?php endforeach;?>
				      </select>
				    </div>
				  </div>
				  
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Do you want shifts set up?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">How are you paying ordinary hours?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Are lunch breaks deducted, what are they?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Are there any exemptions to OT as above?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Are there any exemptions to Saturday?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Are there any exemptions to Sunday?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Are there any exemptions to Public Holidays?</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="modern_award_no">Other Information</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="modern_award_no" name="modern_award_no">
				    </div>
				  </div>
			</div>		<!-- END TAB 1 -->	
			
			<!-- TAB 2 -->
			<div class="span12" id="tab2" style="display:none;">
				<h2>Margin</h2><hr>
				<div class="control-group">
					<label class="control-label">Margin</label>
					<div class="controls">
						<label class="radio">
							%
							<input type="radio" name="margin"/>
						</label>
						<label class="radio">
							$
							<input type="radio" name="margin"/>
						</label>
					</div>
				</div>
				
				
				<h2>Variables</h2><hr>
			  <div class="span5">
				  <div class="control-group">
				    <label class="control-label" for="B_26">Weekly Hours</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_26" name="B_26">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_27">Normal Time Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_27" name="B_27">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_28">Overtime Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_28" name="B_28">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_29">Hol Loading $amount</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_29" name="B_29">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_30">Hol Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_30" name="B_30">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_31">Early Shift %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_31" name="B_31">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_32">Early Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_32" name="B_32">
				    </div>
				  </div>
			  </div>
			  <div class="span4">
				  <div class="control-group">
				    <label class="control-label" for="B_33">Aft Shift Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_33" name="B_33">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_34">Aft Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_34" name="B_34">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_35">Night Shift Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_35" name="B_35">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_36">Night Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_36" name="B_36">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_37">50% Shift Loading</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_37" name="B_37">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_38">50% Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="input-medium" id="B_38" name="B_38">
				    </div>
				  </div>
			  </div>
			  <div class="span11">
				  <h2>PERM and MIGRATION</h2><hr>
				  <div class="span4 pull-left" style="margin-left: 200px;">
				  	<h2><small>Migration Period of Service</small></h2><hr>
				  	<div class="control-group">
					            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
					  </div>
				  </div>
				  <div class="span4">
				  	<h2><small>Migration Fee as a%</small></h2><hr>
				  	<div class="control-group">
				  	      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					  </div>
				  </div>
			  </div>
			  
			  <div class="span11">
				  <div class="span4 pull-left" style="margin-left: 200px;">
				  	<h2><small>Perm Salary Band</small></h2><hr>
				  	<div class="control-group">
					            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium disabled" style="font-size: 9px;" disabled="true"  value="Permanent Guarantee Period in Days">
					  </div>
				  </div>
				  <div class="span4">
				  	<h2><small>Perm Fee as a%</small></h2><hr>
				  	<div class="control-group">
				  	      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					            <input type="text" class="input-medium txt">
	                     
					  </div>
				  </div>
			  </div>
			</div><!--END TAB2-->
			
			<!-- TAB 3 -->
			<div class="span12" id="tab3" style="display: none;">
			  <h3>Modern Award Rates</h3><hr>
			  <div class="span4">
				  <div class="control-group">
				    <label class="control-label" for="payrate_1">Grade 1</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
				            <span class="add-on">$</span>
    				      <input type="text" class="input-medium" id="payrate_1" name="payrate_1" placeholder="0.00">
    				    </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_2">Grade 2</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_2" name="payrate_2" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_3">Grade 3</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_3" name="payrate_3" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_4">Grade 4</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_4" name="payrate_4" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_5">Grade 5</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_5" name="payrate_5" placeholder="0.00">
				        </div>
				    </div>
				  </div>
			  </div>
			  <div class="span7">
			  	   <div class="control-group">
				    <label class="control-label" for="payrate_6">Grade 6</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_6" name="payrate_6" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_7">Grade 7</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_7" name="payrate_7" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_8">Grade 8</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_8" name="payrate_8" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_9">Grade 9</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_9" name="payrate_9" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_10">Grade 10</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium" id="payrate_10" name="payrate_10" placeholder="0.00">
				        </div>
				    </div>
				  </div>
			  </div>
			  <div class="span12">
			  <h3>Pay Rate Summary</h3>
			  </div>
			  <div class="span4 pull-left" style="margin-left: 200px;">
			  	<h2><small>Base Rates</small></h2><hr>
			  	<div class="control-group">
				      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" placeholder="0.00">
                      </div>
				  </div>
			  </div>
			  <div class="span4">
			  	<h2><small>Casual Rates</small></h2><hr>
			  	<div class="control-group">
			  	      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" placeholder="0.00">
				      </div>
				  </div>
			  </div>
			<div class="span11">
				<div class="span6">
					<h3>Allowances</h3>
					<hr>
					<div class="control-group">
				      <input type="text" class="input-medium disabled" style="font-size: 10px;" disabled="true" value="STANDARD RATE FOR CALS :">
					  <input type="text" class="input-mini" id="allowance_caption12" name="allowance_caption12">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_51" name="B_51" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
				      <input type="text" class="input-medium" id="allowance_caption1" name="allowance_caption1">
					  <input type="text" class="input-mini" id="allowance_rate1" name="allowance_rate1">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_52" name="B_52" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption2" name="allowance_caption2">
					  <input type="text" class="input-mini" id="allowance_rate2" name="allowance_rate2">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_53" name="B_53" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption3" name="allowance_caption3">
					  <input type="text" class="input-mini" id="allowance_rate3" name="allowance_rate3">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_54" name="B_54" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption4" name="allowance_caption4">
					  <input type="text" class="input-mini" id="allowance_rate4" name="allowance_rate4">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_55" name="B_55" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption5" name="allowance_caption5">
					  <input type="text" class="input-mini" id="allowance_rate5" name="allowance_rate5">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_56" name="B_56" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" disabled="true" style="font-size: 10px;" value="MARGIN FOR M ALLOWANCE">
                      <input type="text" class="input-mini" id="m_allow_margin" name="m_allow_margin">
				    </div>
				</div>
				<div class="span4">
					<h3>Allowances Rules</h3>
					<hr>
					<input type="text" class="input-block-level" id="C_52" name="C_52">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_53" name="C_53">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_54" name="C_54">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_55" name="C_55">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_56" name="C_56">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_57" name="C_57">
					<div style="height: 5px;"></div>
				</div>
				
			</div>
			<div class="span11">
                <hr>
            </div>
		</div>
		<!-- END TAB 3 -->
		
		<!-- TAB 4 -->
		<div class="span12" id="tab4" style="display: none;">
              <h3>Award Interpretation</h3><hr>
                  <div class="control-group">
                    <label class="control-label" for="B_59">Daily Normal Hours</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_59" name="B_59">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_60">Minimum Shift Engagement</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_60" name="B_60">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_61">Hours required between shifts</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_61" name="B_61">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_62">Meal Break Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_62" name="B_62">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_63">Overtime Meal Breaks</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_63" name="B_63">
                    </div>
                  </div>
                   <div class="control-group">
                    <label class="control-label" for="B_64">Overtime Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_64" name="B_64">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_65">Saturday Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_65" name="B_65">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_66">Sunday Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_66" name="B_66">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_67">Public Holidays</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_67" name="B_67">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_68">Casuals Must Transition to Perm</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_68" name="B_68">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_69">If Higher Duties Performed</label>
                    <div class="controls controls-row">
                      <input type="text" class="input-xxlarge" id="B_69" name="B_69">
                    </div>
                  </div>
                <div class="span11">
                    <hr>
                </div>
            </div>
		<!-- END TAB 4 -->
			<div class="span11">
				<hr>
			</div>
		</form>
	</div>
		
	</div>
	
	<div class="span12 div-award">
		<button type="button" id="add-new-modern" class="btn"><i class="icon-plus"></i> Add new modern award</button>
	    <form class="form-search pull-right">
	        <input type="text" class="input-xlarge search-query">
	        <button type="submit" class="btn"><i class="icon-search"></i></button>
	    </form>
	</div>
	<div class="span12 div-award" style="max-height: 400px; overflow: auto;">
		<table class="table table-bordered table-striped">
			<tr>
				<th>Modern Award No</th>
				<th>Modern Award Name</th>
				<th>Date Created</th>
			</tr>
			<?php if(count($modern_awards)) : ?>
			<?php foreach ($modern_awards as $modern_award) : ?>
			<tr>
				<td><?php echo $modern_award["modern_award_no"] ?></td>
				<td><?php echo $modern_award["modern_award_name"] ?></td>
				<td><?php echo $modern_award["created_at"] ?></td>
			</tr>
			<?php endforeach ; ?>
			<?php else : ?>
			<tr>
				<td colspan="3">Empty Record</td>
			</tr>	
			<?php endif ; ?>
		</table>
	</div>
</div>
<?php echo $footer ?>