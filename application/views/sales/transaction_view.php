<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/transaction/sales_modern_award.js") ?>"></script>
<input type="hidden" id="base-url" value="<?php echo base_url()?>" />
<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Modern Award</h2>
		<hr>
	</div>
	
	<div class="span12" id="modern_form" style="display: none;">
		<form class="form-horizontal" action="<?php echo base_url("sales_transaction/save")?>" method="post">
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
				<h4>Client Details</h4>
					<hr>
				<div style="height: 20px;"></div>
				<div class="span5">
				  <div class="control-group">
                    <label class="control-label" for="trans_no">Transaction No.</label>
                    <div class="controls controls-row">
                      <input type="text" class="disabled" readonly="true" id="trans_no" name="trans_no">
                      <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="cmb-modern">Modern Award Name</label>
                    <div class="controls">
                      <select id="cmb-modern" name="modern_award_no">
                        <option></option>
                        <?php foreach ($modern_awards as $value) : ?>
                            <option value="<?php echo $value["modern_award_no"]?>"><?php echo $value["modern_award_name"]?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="cmb-company">Company</label>
                    <div class="controls">
                      <select id="cmb-company" name="company_no">
                        <option></option>
                        <?php foreach ($company as $value) : ?>
                            <option value="<?php echo $value["client_no"]?>"><?php echo $value["company_name"]?></option>
                        <?php endforeach;?>
                      </select>
                      <input type="hidden" id="state_no"/>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="department">Department</label>
                    <div class="controls controls-row">
                      <input type="text" id="department">
                    </div>
                  </div>
				</div>
				<div class="span4">
				  <div class="control-group">
				    <label class="control-label" for="add1">Address Line 1</label>
				    <div class="controls controls-row">
				      <input type="text" id="add1">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="add2">Address Line 2</label>
				    <div class="controls controls-row">
				      <input type="text" id="add2">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="c_first_name">Contact First Name</label>
				    <div class="controls controls-row">
				      <input type="text" id="c_first_name">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="c_full_name">Contact Full Name</label>
				    <div class="controls controls-row">
				      <input type="text" id="c_full_name">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="c_title">Contact Title</label>
				    <div class="controls controls-row">
				      <input type="text" id="c_title">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="date_of_quotation">Date of Quotation</label>
				    <div class="controls controls-row">
				      <input type="text" id="date_of_quotation" name="date_of_quotation">
				    </div>
				  </div>
				 </div>
				 <div class="span12"> 
    				  <h4>On Cost</h4>
    					<hr>
    				<div style="height: 20px;"></div>
    				<div class="span6">
    				  <div class="control-group">
    				    <label class="control-label" for="cmb-super">Super %</label>
    				    <div class="controls controls-row">
    				      <select id="cmb-super" name="B_14">
    				      	<option></option>
    				      	<?php foreach ($super as $value) : ?>
    							<option value="<?php echo $value["super_no"]?>"><?php echo $value["super"]?></option>
    						<?php endforeach;?>
    				      </select>
    				      <input type="text" id="effective_date"/>
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="cmb-super">Workcover %</label>
    				    <div class="controls">
    				      <select id="cmb-workcover" name="B_15">
    				      	<option></option>
    				      	<?php foreach ($workcover as $value) : ?>
    							<option value="<?php echo $value["work_cover_no"]?>"><?php echo $value["work_cover"]?></option>
    						<?php endforeach;?>
    				      </select>
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="industry_rate">Industry Rate</label>
    				    <div class="controls controls-row">
    				      <input type="text" class="" id="industry_rate" name="B_16">
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="wic_code">WIC Code and Description</label>
    				    <div class="controls controls-row">
    				      <input type="text" class="" id="wic_code" name="B_17">
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="lp_wc">Labour Power WC</label>
    				    <div class="controls controls-row">
    				      <input type="text" class="" id="lp_wc" name="B_18">
    				    </div>
    				  </div>
    				 </div>
    				 
    				 <div class="span5">
    				  <div class="control-group">
    				    <label class="control-label" for="tax">Payroll Tax %</label>
    				    <div class="controls controls-row">
    				      <input type="text" class="" id="tax" name="B_19">
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="p_liability">Public Liability %</label>
    				    <div class="controls">
    				      <select class="" id="p_liability" name="B_20">
    				      	<option></option>
    				      	<?php foreach ($public_liability as $value) : ?>
    							<option value="<?php echo $value["public_no"]?>"><?php echo $value["public_value"]?></option>
    						<?php endforeach;?>
    				      </select>
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="insurance">Insurance $</label>
    				    <div class="controls">
    				      <select class="" id="insurance" name="B_21">
    				      	<option></option>
    				      	<?php foreach ($insurance as $value) : ?>
    							<option value="<?php echo $value["insurance_no"]?>"><?php echo $value["insurance"]?></option>
    						<?php endforeach;?>
    				      </select>
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="long_service">Long Service</label>
    				    <div class="controls">
    				      <select class="" id="long_service" name="long_service">
    				      	<option></option>
    				      	<?php foreach ($long_service as $value) : ?>
    							<option value="<?php echo $value["long_services_no"]?>"><?php echo $value["long_services"]?></option>
    						<?php endforeach;?>
    				      </select>
    				    </div>
    				  </div>
    				  <div class="control-group">
    				    <label class="control-label" for="admin_txt">Admin %</label>
    				    <div class="controls">
    				      <select class="" id="admin_txt" name="B_22">
    				      	<option></option>
    				      	<?php foreach ($admin as $value) : ?>
    							<option value="<?php echo $value["admin_no"]?>"><?php echo $value["admin"]?></option>
    						<?php endforeach;?>
    				      </select>
    				    </div>
    				  </div>
    				 </div>
    			</div>
				 <div class="span12">
				   <h4>Payroll Information</h4>
					<hr>
				    <div style="height: 20px;"></div>
    				<div class="span6">
        				  <div class="control-group" style="width:200px;">
        				    <label class="control-label" for="modern_award_no">Standard Labour Hire/Transition/Limited Tenure</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_4">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Which level do you want set up in FT</label>
        				    <div class="controls">
        				      <input type="text" class="" id="modern_award_no" name="D_5">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 1</label>
        				    <div class="controls">
        				      <select class="" name="position_no1">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 2</label>
        				    <div class="controls">
        				      <select class="" name="position_no2">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 3</label>
        				    <div class="controls">
        				      <select class="" name="position_no3">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 4</label>
        				    <div class="controls">
        				      <select class="" name="position_no4">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 5</label>
        				    <div class="controls">
        				      <select class="" name="position_no5">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 6</label>
        				    <div class="controls">
        				      <select class="" name="position_no6">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 7</label>
        				    <div class="controls">
        				      <select class="" name="position_no7">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 8</label>
        				    <div class="controls">
        				      <select class="" name="position_no8">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 9</label>
        				    <div class="controls">
        				      <select class="" name="position_no9">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_name">Position titles Level 10</label>
        				    <div class="controls">
        				      <select class="" name="position_no10">
        				      	<option></option>
        				      	<?php foreach ($position as $value) : ?>
        							<option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
        						<?php endforeach;?>
        				      </select>
        				    </div>
    				      </div>
    				  </div>
    				  <div class="span5">
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Do you want shifts set up?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_15">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">How are you paying ordinary hours?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_16">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Are lunch breaks deducted, what are they?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_17">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Are there any exemptions to OT as above?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_18">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Are there any exemptions to Saturday?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_19">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Are there any exemptions to Sunday?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_20">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Are there any exemptions to Public Holidays?</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_21">
        				    </div>
        				  </div>
        				  <div class="control-group">
        				    <label class="control-label" for="modern_award_no">Other Information</label>
        				    <div class="controls controls-row">
        				      <input type="text" class="" id="modern_award_no" name="D_22">
        				    </div>
        				  </div>
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
							%<input type="radio" id="swi_peror_cur" name="swi_peror_cur" value="1"/>
						</label>
						<label class="radio">
							$<input type="radio" id="swi_peror_cur" name="swi_peror_cur" value="2"/>
						</label>
						<label class="radio">
						    <input type="text" name="B_24">
						</label>
					</div>
				</div>
				
				
				<h2>Variables</h2><hr>
			  <div class="span5">
				  <div class="control-group">
				    <label class="control-label" for="B_26">Weekly Hours</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_26" name="B_26">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_27">Normal Time Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_27" name="B_27">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_28">Overtime Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_28" name="B_28">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_29">Hol Loading $amount</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_29" name="B_29">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_30">Hol Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_30" name="B_30">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_31">Early Shift %</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_31" name="B_31">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_32">Early Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_32" name="B_32">
				    </div>
				  </div>
			  </div>
			  <div class="span4">
				  <div class="control-group">
				    <label class="control-label" for="B_33">Aft Shift Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_33" name="B_33">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_34">Aft Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_34" name="B_34">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_35">Night Shift Loading %</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_35" name="B_35">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_36">Night Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_36" name="B_36">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_37">50% Shift Loading</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_37" name="B_37">
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="B_38">50% Shift Rule</label>
				    <div class="controls controls-row">
				      <input type="text" class="" readonly="true" id="B_38" name="B_38">
				    </div>
				  </div>
			  </div>
			  <div class="span11">
				  <h2>PERM and MIGRATION</h2><hr>
				  <div class="span4 pull-left" style="margin-left: 200px;">
				  	<h2><small>Migration Period of Service</small></h2><hr>
				  	<div class="control-group">
					            <input type="text" class="input-medium txt" name="C_25">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_26">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_27">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_28">
					  </div>
				  </div>
				  <div class="span4">
				  	<h2><small>Migration Fee as a%</small></h2><hr>
				  	<div class="control-group">
				  	      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_25">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_26">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_27">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_28">
	                            <span class="add-on">%</span>
					      </div>
					  </div>
				  </div>
			  </div>
			  
			  <div class="span11">
				  <div class="span4 pull-left" style="margin-left: 200px;">
				  	<h2><small>Perm Salary Band</small></h2><hr>
				  	<div class="control-group">
					            <input type="text" class="input-medium txt" name="C_30">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_31">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_32">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_33">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_34">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_35">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_36">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium txt" name="C_37">
	                      <div style="height: 3px;"></div>
	                            <input type="text" class="input-medium disabled" style="font-size: 9px;" disabled="true"  value="Permanent Guarantee Period in Days">
					  </div>
				  </div>
				  <div class="span4">
				  	<h2><small>Perm Fee as a%</small></h2><hr>
				  	<div class="control-group">
				  	      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_30">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_31">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_32">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_33">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_34">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_35">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_36">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					      <div class="input-append">
	                            <input type="text" class="input-medium txt" placeholder="0.00" name="D_37">
	                            <span class="add-on">%</span>
					      </div>
					      <div style="height: 3px;"></div>
					            <input type="text" class="input-medium txt" name="D_38">
	                     
					  </div>
				  </div>
			  </div>
			</div>
			<!--END TAB2-->
			
			<!-- TAB 3 -->
			<div class="span12" id="tab3" style="display: none;">
			  <h3>Modern Award Rates</h3><hr>
			  <div class="span4">
				  <div class="control-group">
				    <label class="control-label" for="payrate_1">Grade 1</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
				            <span class="add-on">$</span>
    				      <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_1" name="payrate_1" placeholder="0.00">
    				    </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_2">Grade 2</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_2" name="payrate_2" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_3">Grade 3</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_3" name="payrate_3" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_4">Grade 4</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_4" name="payrate_4" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_5">Grade 5</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_5" name="payrate_5" placeholder="0.00">
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
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_6" name="payrate_6" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_7">Grade 7</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_7" name="payrate_7" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_8">Grade 8</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_8" name="payrate_8" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_9">Grade 9</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_9" name="payrate_9" placeholder="0.00">
				        </div>
				    </div>
				  </div>
				  <div class="control-group">
				    <label class="control-label" for="payrate_10">Grade 10</label>
				    <div class="controls controls-row">
				        <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt-grade" readonly="true" id="payrate_10" name="payrate_10" placeholder="0.00">
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
                            <input type="text" class="input-medium txt" name="base_rate1" readonly="true" id="txt-base-rate-1" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate2" readonly="true" id="txt-base-rate-2" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate3" readonly="true" id="txt-base-rate-3" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate4" readonly="true" id="txt-base-rate-4" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate5" readonly="true" id="txt-base-rate-5" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate6" readonly="true" id="txt-base-rate-6" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate7" readonly="true" id="txt-base-rate-7" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate8" readonly="true" id="txt-base-rate-8" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate9" readonly="true" id="txt-base-rate-9" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt" name="base_rate10" readonly="true" id="txt-base-rate-10" placeholder="0.00">
                      </div>
				  </div>
			  </div>
			  <div class="span4">
			  	<h2><small>Casual Rates</small></h2><hr>
			  	<div class="control-group">
			  	      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate1" id="txt-casual-rate-1" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate2" id="txt-casual-rate-2" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate3" id="txt-casual-rate-3" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate4" id="txt-casual-rate-4" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate5" id="txt-casual-rate-5" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate6" id="txt-casual-rate-6" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate7" id="txt-casual-rate-7" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate8" id="txt-casual-rate-8" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate9" id="txt-casual-rate-9" readonly="true" placeholder="0.00">
				      </div>
				      <div style="height: 3px;"></div>
				      <div class="input-prepend">
                            <span class="add-on">$</span>
				            <input type="text" class="input-medium txt" name="casual_rate10" id="txt-casual-rate-10" readonly="true" placeholder="0.00">
				      </div>
				  </div>
			  </div>
			<div class="span11">
				<div class="span6">
					<h3>Allowances</h3>
					<hr>
					<div class="control-group">
				      <input type="text" class="input-medium disabled" style="font-size: 10px;" disabled="true" value="STANDARD RATE FOR CALS :">
					  <input type="text" class="input-mini" id="allowance_caption12" readonly="true" name="allowance_caption12">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_51" readonly="true" name="B_51" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
				      <input type="text" class="input-medium" id="allowance_caption1" readonly="true" name="allowance_caption1">
					  <input type="text" class="input-mini" id="allowance_rate1" readonly="true" name="allowance_rate1">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_52" readonly="true" name="B_52" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption2" readonly="true" name="allowance_caption2">
					  <input type="text" class="input-mini" id="allowance_rate2" readonly="true" name="allowance_rate2">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_53" readonly="true" name="B_53" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption3" readonly="true" name="allowance_caption3">
					  <input type="text" class="input-mini" id="allowance_rate3" readonly="true" name="allowance_rate3">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_54" readonly="true" name="B_54" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption4" readonly="true" name="allowance_caption4">
					  <input type="text" class="input-mini" id="allowance_rate4" readonly="true" name="allowance_rate4">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_55" readonly="true" name="B_55" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" id="allowance_caption5" readonly="true" name="allowance_caption5">
					  <input type="text" class="input-mini" id="allowance_rate5" readonly="true" name="allowance_rate5">
					  <div class="input-prepend">
                            <span class="add-on">$</span>
					        <input type="text" class="input-medium txt"  id="B_56" readonly="true" name="B_56" placeholder="0.00">
					  </div>
					  <div style="height: 5px;"></div>
					  <input type="text" class="input-medium" disabled="true" readonly="true" style="font-size: 10px;" value="MARGIN FOR M ALLOWANCE">
                      <input type="text" class="input-mini" id="m_allow_margin" readonly="true" >
				    </div>
				</div>
				<div class="span4">
					<h3>Allowances Rules</h3>
					<hr>
					<input type="text" class="input-block-level" id="C_52" readonly="true" name="C_52">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_53" readonly="true" name="C_53">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_54" readonly="true" name="C_54">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_55" readonly="true" name="C_55">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_56" readonly="true" name="C_56">
					<div style="height: 5px;"></div>
					<input type="text" class="input-block-level" id="C_57" readonly="true" name="C_57">
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
		</form>
	</div>
		
	<div class="span12 div-award">
		<button type="button" id="add-new-modern" class="btn"><i class="icon-plus"></i> Add new modern award</button>
	    <form class="form-search pull-right">
	        <input type="text" class="input-xlarge search-query">
	        <button type="submit" class="btn"><i class="icon-search"></i></button>
	    </form>
	</div>
	<div class="span12 div-award" style="max-height: 400px; overflow: auto;">
		<table class="table table-bordered table-striped" id="sales-modern-table">
		    <thead>
			<tr>
				<th>Modern Award No</th>
				<th>Modern Award Name</th>
				<th>Date Created</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php if(count($modern_awards)) : ?>
			<?php foreach ($modern_awards as $modern_award) : ?>
			<tr>
				<td><?php echo $modern_award["modern_award_no"] ?></td>
				<td><?php echo $modern_award["modern_award_name"] ?></td>
				<td><?php echo date("d/m/Y", strtotime($modern_award["created_at"])) ?></td>
				<td>
				    <button type="button" class="btn"><i class="icon-edit"></i></button>
				    <button type="button" class="btn btn-danger"><i class="icon-trash icon-white"></i></button>
				</td>
			</tr>
			<?php endforeach ; ?>
			<?php else : ?>
			<tr>
				<td colspan="3">Empty Record</td>
			</tr>	
			<?php endif ; ?>
			</tbody>
		</table>
	</div>
</div>
<script>
    $("#sales-modern-table").tablesorter();
</script>
<?php echo $footer ?>