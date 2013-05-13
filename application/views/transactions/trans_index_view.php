<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/paycharge.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/transaction/modern_award.js") ?>"></script>
<div class="topmargin"></div>
<div class="row">
	<div class="span12">
	    <h2 class="titles">Modern Award</h2>
		<hr>
	</div>
	<div class="span12">	
		<form class="form-horizontal" action="<?php echo base_url("transactions/save") ?>" method="post">
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
			<div style="height: 20px;"></div>
			  <div class="control-group">
			    <label class="control-label" for="modern_award_no">Modern Award No.</label>
			    <div class="controls controls-row">
			      <input type="text" class="input-medium disabled" readonly="true" id="modern_award_no" name="modern_award_no" value="<?php echo $next_award_no ?>">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="modern_award_name">Modern Award Name</label>
			    <div class="controls">
			      <input type="text" class="input-medium" id="modern_award_name" name="modern_award_name">
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
				<hr>
			</div>
		</div>
		<!-- END TAB 1 -->
		
		<!-- TAB 2 -->
		<div class="span12" id="tab2" style="display: none;">
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
		<!-- END TAB 2 -->
		
		<!-- TAB 3 -->
		<div class="span12" id="tab3" style="display: none;">
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
		<!-- END TAB 3 -->
		
		<!-- TAB 4 -->
        <div class="span12" id="tab4" style="display: none;">
              <div class="span11">
                  <div class="control-group">
                    <label class="control-label" for="print_company_no">Company</label>
                    <div class="controls controls-row">
                      <select id="print_company_no" name="print_company_no">
                          <option value="1">Labour Power</option>
                          <option value="2">LP Consulting Services</option>
                      </select>
                    </div>
                  </div>
                 <div class="control-group">
                    <label class="control-label" for="calculator">Calculator</label>
                    <div class="controls controls-row">
                      <select id="calculator" name="calculator">
                          <option>Calculator 1</option>
                          <option>Calculator 2</option>
                          <option>Calculator 3</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="span11">
                  <h4>Grade</h4>
                  <div class="form-inline breadcrumb">
                      <label class="checkbox">
                          <input type="checkbox" checked="true" name="grade1"> Grade 1                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade2"> Grade 2                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade3"> Grade 3                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade4"> Grade 4                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade5"> Grade 5                 
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade6"> Grade 6                 
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade7"> Grade 7                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade8"> Grade 8                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade9"> Grade 9                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" name="grade10"> Grade 10                  
                      </label>
                  </div>
              </div>
              <div class="span11">
                  <h4>Charge Rate</h4>
                  <table class="table table-bordered">
                      <tr>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="normal"> Normal</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="early"> Early</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="afternoon"> Afternoon</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="night"> Night</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="50_shift"> 50% Shift</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="t_14"> T1/4</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="t_12"> T1/2</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="double"> Double</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="dt_12"> DT1/2</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" name="triple"> Triple</th>
                      </tr>
                      <tr class="warning">
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                          <td>$ 13.16</td>
                      </tr>
                      <tr class="warning">
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                      </tr>
                      <tr class="warning">
                          <td>$ 0.00</td>
                          <td>$ 2.06</td>
                          <td>$ 2.88</td>
                          <td>$ 4.94</td>
                          <td>$ 8.23</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                      </tr>
                      <tr class="warning">
                          <td>$ 16.45</td>
                          <td>$ 18.51</td>
                          <td>$ 19.33</td>
                          <td>$ 21.39</td>
                          <td>$ 24.68</td>
                          <td>$ 18.10</td>
                          <td>$ 21.72</td>
                          <td>$ 28.96</td>
                          <td>$ 36.20</td>
                          <td>$ 43.44</td>
                      </tr>
                      <tr>
                          <td>$ 1.48</td>
                          <td>$ 1.67</td>
                          <td>$ 1.74</td>
                          <td>$ 1.93</td>
                          <td>$ 2.22</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                      </tr>
                      <tr>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                          <td>$ 0.00</td>
                      </tr>
                      <tr>
                          <td>$ 0.18</td>
                          <td>$ 0.20</td>
                          <td>$ 0.21</td>
                          <td>$ 0.23</td>
                          <td>$ 0.27</td>
                          <td>$ 0.18</td>
                          <td>$ 0.22</td>
                          <td>$ 0.29</td>
                          <td>$ 0.36</td>
                          <td>$ 0.43</td>
                      </tr>
                      <tr>
                          <td>$ 0.90</td>
                          <td>$ 1.01</td>
                          <td>$ 1.05</td>
                          <td>$ 1.17</td>
                          <td>$ 1.35</td>
                          <td>$ 0.91</td>
                          <td>$ 1.09</td>
                          <td>$ 1.45</td>
                          <td>$ 1.81</td>
                          <td>$ 2.17</td>
                      </tr>
                      <tr>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                          <td>$ 0.04</td>
                      </tr>
                      <tr>
                          <td>$ 1.26</td>
                          <td>$ 1.41</td>
                          <td>$ 1.47</td>
                          <td>$ 1.63</td>
                          <td>$ 1.88</td>
                          <td>$ 1.27</td>
                          <td>$ 1.52</td>
                          <td>$ 2.03</td>
                          <td>$ 2.53</td>
                          <td>$ 3.04</td>
                      </tr>
                      <tr>
                          <td>$ 20.31</td>
                          <td>$ 22.84</td>
                          <td>$ 23.84</td>
                          <td>$ 28.39</td>
                          <td>$ 30.44</td>
                          <td>$ 20.50</td>
                          <td>$ 24.59</td>
                          <td>$ 32.77</td>
                          <td>$ 40.94</td>
                          <td>$ 49.12</td>
                      </tr>
                      <tr>
                          <td>$ 1.07</td>
                          <td>$ 1.20</td>
                          <td>$ 1.25</td>
                          <td>$ 1.39</td>
                          <td>$ 1.60</td>
                          <td>$ 1.08</td>
                          <td>$ 1.29</td>
                          <td>$ 1.72</td>
                          <td>$ 2.15</td>
                          <td>$ 2.59</td>
                      </tr>
                      <tr>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                          <td>5.00 %</td>
                      </tr>
                      <tr class="error">
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 3.29</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                          <td>$ 1.32</td>
                      </tr>
                  </table>
              </div>
              <div class="span11">
                  <h4>Pay and Charge Rate Schedule</h4>
                  <table class="table table-bordered" style="font-size: 12px;">
                      <tr>
                          <th>Classification</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" name="p_normal_time"> Normal Time</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" name="p_t_14"> T1/4</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" name="p_time_and_half"> Time and Half</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" name="p_double_time"> Double Time</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" name="p_double_and_half"> Double and a Half</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" name="p_triple"> Triple Time</th>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" name="p_day"> Day Shift</td>
                          <td>$ 0.04</td><td>$ 7.14</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" name="p_early"> Early Shift</td>
                          <td>$ 0.05</td><td>$ 7.16</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" name="p_afternoon"> Afternoon Shift</td>
                          <td>$ 0.08</td><td>$ 7.19</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" name="p_night"> Night Shift</td>
                          <td>$ 0.04</td><td>$ 7.14</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" name="p_half"> 50% Shift</td>
                          <td>$ 0.04</td><td>$ 7.146</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                  </table>
              </div>
              <div class="span11">
                <hr>
            </div>
            </div>
        <!-- END TAB 4 -->
		</form>

	<div class="span12">
		<button type="button" id="add-new-modern" class="btn"><i class="icon-plus"></i> Add new modern award</button>
	    <form class="form-search pull-right">
	        <input type="text" class="input-xlarge search-query">
	        <button type="submit" class="btn"><i class="icon-search"></i></button>
	    </form>
	</div>
	<div class="span12" style="max-height: 400px; overflow: auto;">
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
	</div>
<?php echo $footer ?>
