<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_home2.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/transaction/client_agreement.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_agreement.js") ?>"></script>
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">
<input type="hidden" id="hid_client_no" value="<?php echo $client_info["client_no"] ?>" />

<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this client agreement?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="delete-btn-modal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE MODAL -->

<div class="topmargin"></div>

<div class="row">
    <!-- CLIENT AGREEMENT FORM -->
    <div class="span12">
        <form class="form-horizontal" action="<?php echo base_url("client_agreement/save")?>" method="post" id="frm" style="display: none;">
            <div class="navbar navbar-fixed-bottom" id="nav-tabs" style="display: none;">
                <div class="navbar-inner">
                    <div class="container">
                    <ul class="nav pull-right">
                        <li class="active"><a href="#" id="show-tab-1">TAB 1</a></li>
                        <li><a href="#" id="show-tab-2">TAB 2</a></li>
                        <li><a href="#" id="show-tab-3">TAB 3</a></li>
                        <li><a href="#" id="show-tab-4">TAB 4</a></li>
                        <li><a href="#" id="show-tab-5">TAB 5</a></li>
                        <li class="divider-vertical"></li>
                        <li class="pull-right">
                            <button type="button" class="btn pull-right" style="margin-left: 3px;" id="close-modern-form">Cancel</button>
                            <input type="submit" class="btn btn-inverse pull-right" id="btn-save" value="SAVE">
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
            
            <!-- TAB 1 -->
            <div class="span12" id="tab1" style="display:none;">
                <h4>Client Details</h4>
                    <hr>
                <div class="span5">
                    <div style="height: 20px;"></div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Transaction No.</label>
                        <div class="controls controls-row">
                          <input type="text" id="trans_no" readonly="true" name="trans_no">
                          <input type="button" id="btn_gen" class="btn btn-inverse btn-medium" value="Generate No"/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Client Agreement Name</label>
                        <div class="controls">
                          <input type="text" id="transaction_name" name="transaction_name">
                            
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Company</label>
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
                  </div>
                  <div class="span5">
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Department</label>
                        <div class="controls controls-row">
                          <input type="text" id="department" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Address Line 1</label>
                        <div class="controls controls-row">
                          <input type="text" id="add1" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Address Line 2</label>
                        <div class="controls controls-row">
                          <input type="text" id="add2" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Contact First Name</label>
                        <div class="controls controls-row">
                          <input type="text" id="c_first_name" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Contact Full Name</label>
                        <div class="controls controls-row">
                          <input type="text" id="c_full_name" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Contact Title</label>
                        <div class="controls controls-row">
                          <input type="text" id="c_title" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Date of Quotation</label>
                        <div class="controls controls-row">
                          <input type="text" id="date_of_quotation" name="date_of_quotation" readonly="true" value="<?php echo $date_slash?>">
                        </div>
                      </div>
                  </div>
                <div class="span12">
                      <h4>On Cost</h4>
                        <hr>
                    <div style="height: 20px;"></div>
                    <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Super %</label>
                        <div class="controls controls-row">
                          <select class="" id="cmb-super" name="B_14">
                            <option></option>
                            <?php foreach ($super as $value) : ?>
                                <option super-no="<?php echo $value["super_no"] ?>" value="<?php echo $value["super"]?>"><?php echo $value["super"]?></option>
                            <?php endforeach;?>
                          </select>
                          <input type="text" id="effective_date" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Workcover %</label>
                        <div class="controls">
                          <select id="cmb-workcover" name="B_15">
                            <option></option>
                            <?php foreach ($workcover as $value) : ?>
                                <option work-cover-no="<?php echo $value["work_cover_no"] ?>" value="<?php echo $value["work_cover"]?>"><?php echo $value["work_cover"]?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Industry Rate</label>
                        <div class="controls controls-row">
                          <input type="text" id="B_16" class="txt" name="B_16">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">WIC Code and Description</label>
                        <div class="controls controls-row">
                          <input type="text" id="B_17" readonly="true" name="B_17">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Labour Power WC</label>
                        <div class="controls controls-row">
                          <input type="text" id="B_18" name="B_18">
                        </div>
                      </div>
                     </div>
                     
                     <div class="span5">
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Payroll Tax %</label>
                        <div class="controls controls-row">
                          <input type="text" id="B_19" name="B_19" readonly="true">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Public Liability %</label>
                        <div class="controls">
                          <select name="B_20" id="B_20">
                            <option></option>
                            <?php foreach ($public_liability as $value) : ?>
                                <option value="<?php echo $value["public_value"]?>"><?php echo $value["public_value"]?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Insurance $</label>
                        <div class="controls">
                          <select name="B_21" id="B_21">
                            <option></option>
                            <?php foreach ($insurance as $value) : ?>
                                <option value="<?php echo $value["insurance"]?>"><?php echo $value["insurance"]?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Long Service</label>
                        <div class="controls">
                          <select name="long_service" id="long_service">
                            <option></option>
                            <?php foreach ($long_service as $value) : ?>
                                <option value="<?php echo $value["long_services"]?>"><?php echo $value["long_services"]?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_name">Admin %</label>
                        <div class="controls">
                          <select name="B_22" id="B_22">
                            <option></option>
                            <?php foreach ($admin as $value) : ?>
                                <option value="<?php echo $value["admin"]?>"><?php echo $value["admin"]?></option>
                            <?php endforeach;?>
                          </select>
                        </div>
                      </div>
                    </div>
                 </div>
                 <div class="span12">
                   <h4>Payroll Information</h4>
                    <hr>
                    <div class="span6">
                <div style="height: 20px;"></div>
                  <div class="control-group">
                    <label class="control-label" for="modern_award_no">Standard Labour Hire/Transition/Limited Tenure</label>
                    <div class="controls controls-row">
                      <input type="text" id="D_4" name="D_4">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="modern_award_name">Which level do you want set up in FT</label>
                    <div class="controls">
                      <input type="text" id="D_5" name="D_5">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="modern_award_name">What Position titles Level 1</label>
                    <div class="controls">
                      <select name="position_no1" id="position_no1">
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
                      <select name="position_no2" id="position_no2">
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
                      <select name="position_no3" id="position_no3">
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
                      <select name="position_no4" id="position_no4">
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
                      <select name="position_no5" id="position_no5">
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
                      <select name="position_no6" id="position_no6">
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
                      <select class="" name="position_no7" id="position_no7">
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
                      <select class="" name="position_no8" id="position_no8">
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
                      <select class="" name="position_no9" id="position_no9">
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
                      <select class="" name="position_no10" id="position_no10">
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
                          <input type="text" class="" id="D_15" name="D_15">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">How are you paying ordinary hours?</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_16" name="D_16">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Are lunch breaks deducted, what are they?</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_17" name="D_17">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Are there any exemptions to OT as above?</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_18" name="D_18">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Are there any exemptions to Saturday?</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_19" name="D_19">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Are there any exemptions to Sunday?</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_20" name="D_20">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Are there any exemptions to Public Holidays?</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_21" name="D_21">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="modern_award_no">Other Information</label>
                        <div class="controls controls-row">
                          <input type="text" class="" id="D_22" name="D_22">
                        </div>
                      </div>
                  </div>
                  </div>
            </div>      
            <!-- END TAB 1 -->  
            
            <!-- TAB 2 -->
            <div class="span12" id="tab2" style="display:none;">
                <h2>Margin</h2><hr>
                <div class="control-group">
                    <label class="control-label">Margin</label>
                    <div class="controls controls-row">
                        <label class="radio">
                            %
                            <input type="radio" name="swi_peror_cur" id="_percent" value="1"/>
                        </label>
                        <label class="radio">
                            $
                            <input type="radio" checked="true" name="swi_peror_cur" id="_dollar" value="0"/>
                        </label><input type="text" class="txt" name="B_24" id="B_24"/>
                    </div>
                </div>
                
                
                <h2>Variables</h2><hr>
              <div class="span5">
                  <div class="control-group">
                    <label class="control-label" for="B_26">Weekly Hours</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_26" name="B_26">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_27">Normal Time Loading %</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_27" name="B_27">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_28">Overtime Loading %</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_28" name="B_28">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_29">Hol Loading $amount</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_29" name="B_29">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_30">Hol Loading %</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_30" name="B_30">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_31">Early Shift %</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_31" name="B_31">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_32">Early Shift Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class=""  id="B_32" name="B_32">
                    </div>
                  </div>
              </div>
              <div class="span4">
                  <div class="control-group">
                    <label class="control-label" for="B_33">Aft Shift Loading %</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_33" name="B_33">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_34">Aft Shift Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class=""  id="B_34" name="B_34">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_35">Night Shift Loading %</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_35" name="B_35">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_36">Night Shift Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class=""  id="B_36" name="B_36">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_37">50% Shift Loading</label>
                    <div class="controls controls-row">
                      <input type="text" class="txt"  id="B_37" name="B_37">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="B_38">50% Shift Rule</label>
                    <div class="controls controls-row">
                      <input type="text" class=""  id="B_38" name="B_38">
                    </div>
                  </div>
              </div>
              <div class="span11">
                  <h2>PERM and MIGRATION</h2><hr>
                  <div class="span4 pull-left" style="margin-left: 200px;">
                    <h2><small>Migration Period of Service</small></h2><hr>
                    <div class="control-group">
                                <input type="text" class="" name="C_25" id="C_25">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_26" id="C_26">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_27" id="C_27">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_28" id="C_28">
                      </div>
                  </div>
                  <div class="span4">
                    <h2><small>Migration Fee as a%</small></h2><hr>
                    <div class="control-group">
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_25" id="D_25">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_26" id="D_26">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_27" id="D_27">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_28" id="D_28">
                                <span class="add-on">%</span>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="span11">
                  <div class="span4 pull-left" style="margin-left: 200px;">
                    <h2><small>Perm Salary Band</small></h2><hr>
                    <div class="control-group">
                                <input type="text" class="" name="C_30" id="C_30">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_31" id="C_31">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_32" id="C_32">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_33" id="C_33">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_34" id="C_34">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_35" id="C_35">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_36" id="C_36">
                          <div style="height: 3px;"></div>
                                <input type="text" class="" name="C_37" id="C_37">
                          <div style="height: 3px;"></div>
                                <input type="text" id="txt-permanent" class="disabled" style="font-size: 9px;" disabled="true"  value="Permanent Guarantee Period in Days">
                      </div>
                  </div>
                  <div class="span4">
                    <h2><small>Perm Fee as a%</small></h2><hr>
                    <div class="control-group">
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_30" id="D_30">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_31" id="D_31">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_32" id="D_32">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_33" id="D_33">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_34" id="D_34">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_35" id="D_35">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_36" id="D_36">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class=" txt" placeholder="0.00" name="D_37" id="D_37">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                                <input type="text" class=" txt" name="D_38" id="D_38">
                         
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
                          <input type="text" class="input-medium txt-grade"  id="payrate_1" name="payrate_1" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_2">Grade 2</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_2" name="payrate_2" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_3">Grade 3</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_3" name="payrate_3" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_4">Grade 4</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_4" name="payrate_4" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_5">Grade 5</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_5" name="payrate_5" placeholder="0.00">
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
                            <input type="text" class="input-medium txt-grade"  id="payrate_6" name="payrate_6" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_7">Grade 7</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_7" name="payrate_7" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_8">Grade 8</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_8" name="payrate_8" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_9">Grade 9</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_9" name="payrate_9" placeholder="0.00">
                        </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="payrate_10">Grade 10</label>
                    <div class="controls controls-row">
                        <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-medium txt-grade"  id="payrate_10" name="payrate_10" placeholder="0.00">
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
                            <input type="text" class=" txt" name="base_rate1" readonly="true" id="txt-base-rate-1" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate2" readonly="true" id="txt-base-rate-2" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate3" readonly="true" id="txt-base-rate-3" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate4" readonly="true" id="txt-base-rate-4" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate5" readonly="true" id="txt-base-rate-5" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate6" readonly="true" id="txt-base-rate-6" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate7" readonly="true" id="txt-base-rate-7" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate8" readonly="true" id="txt-base-rate-8" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate9" readonly="true" id="txt-base-rate-9" placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="base_rate10" readonly="true" id="txt-base-rate-10" placeholder="0.00">
                      </div>
                  </div>
              </div>
              <div class="span4">
                <h2><small>Casual Rates</small></h2><hr>
                <div class="control-group">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate1" readonly="true" id="txt-casual-rate-1"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate2" readonly="true" id="txt-casual-rate-2"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate3" readonly="true" id="txt-casual-rate-3"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate4" readonly="true" id="txt-casual-rate-4"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate5" readonly="true" id="txt-casual-rate-5"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate6" readonly="true" id="txt-casual-rate-6"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate7" readonly="true" id="txt-casual-rate-7"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate8" readonly="true" id="txt-casual-rate-8"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate9" readonly="true" id="txt-casual-rate-9"  placeholder="0.00">
                      </div>
                      <div style="height: 3px;"></div>
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class=" txt" name="casual_rate10" readonly="true" id="txt-casual-rate-10"  placeholder="0.00">
                      </div>
                  </div>
              </div>
            <div class="span11">
                <div class="span6">
                    <h3>Allowances</h3>
                    <hr>
                    <div class="control-group">
                      <input type="text" class="input-medium disabled" id="txt-standard" style="font-size: 10px;" disabled="true" value="STANDARD RATE FOR CALS :">
                      <input type="text" class="input-mini" disabled="true" value="%">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-small txt"  id="B_51"  name="B_51" placeholder="0.00">
                      </div>
                      <div style="height: 5px;"></div>
                      <input type="text" class="input-medium" id="allowance_caption1" name="allowance_caption1" style="font-size: 10px;" value="Meal">
                      <input type="text" class="input-mini" id="allowance_rate1"  name="allowance_rate1">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-small txt"  id="B_52"  name="B_52" placeholder="0.00">
                      </div>
                      <div style="height: 5px;"></div>
                      <input type="text" class="input-medium disabled" id="allowance_caption2"  name="allowance_caption2" style="font-size: 10px;" value="First-aid">
                      <input type="text" class="input-mini" id="allowance_rate2"  name="allowance_rate2">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-small txt" id="B_53"  name="B_53" placeholder="0.00">
                      </div>
                      <div style="height: 5px;"></div>
                      <input type="text" class="input-medium disabled" id="allowance_caption3"  name="allowance_caption3" style="font-size: 10px;" value="L/Hand 3-10 Emps">
                      <input type="text" class="input-mini" id="allowance_rate3"  name="allowance_rate3">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-small txt"  id="B_54"  name="B_54" placeholder="0.00">
                      </div>
                      <div style="height: 5px;"></div>
                      <input type="text" class="input-medium disabled" id="allowance_caption4"  name="allowance_caption4" style="font-size: 10px;" value="L/Hand 10-20 Emps">
                      <input type="text" class="input-mini" id="allowance_rate4"  name="allowance_rate4">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-small txt"  id="B_55"  name="B_55" placeholder="0.00">
                      </div>
                      <div style="height: 5px;"></div>
                      <input type="text" class="input-medium disabled" id="allowance_caption5"  name="allowance_caption5" style="font-size: 10px;" value="L/Hand 20+ Emps">
                      <input type="text" class="input-mini" id="allowance_rate5"  name="allowance_rate5">
                      <div class="input-prepend">
                            <span class="add-on">$</span>
                            <input type="text" class="input-small txt"  id="B_56"  name="B_56" placeholder="0.00">
                      </div>
                      <div style="height: 5px;"></div>
                      <input type="text" class="input-medium" id="m_allow_text" disabled="true" style="font-size: 10px;" value="MARGIN FOR M ALLOWANCE">
                      <input type="text" class="input-mini" id="m_allow_margin" name="m_allow_margin">
                      
                    </div>
                </div>
                <div class="span4">
                    <h3>Allowances Rules</h3>
                    <hr>
                    <input type="text" class="input-block-level" id="C_52"  name="C_52">
                    <div style="height: 5px;"></div>
                    <input type="text" class="input-block-level" id="C_53"  name="C_53">
                    <div style="height: 5px;"></div>
                    <input type="text" class="input-block-level" id="C_54"  name="C_54">
                    <div style="height: 5px;"></div>
                    <input type="text" class="input-block-level" id="C_55"  name="C_55">
                    <div style="height: 5px;"></div>
                    <input type="text" class="input-block-level" id="C_56"  name="C_56">
                    <div style="height: 5px;"></div>
                    <input type="text" class="input-block-level" id="C_57"  name="C_57">
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
        
        <!-- TAB 5 -->
        <div class="span12" id="tab5" style="display: none;">
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
                          <input type="checkbox" checked="true" id="grade1" name="grade1" value="1"> Grade 1                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade2" name="grade2" value="1"> Grade 2                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade3" name="grade3" value="1"> Grade 3                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade4" name="grade4" value="1"> Grade 4                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade5" name="grade5" value="1"> Grade 5                 
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade6" name="grade6" value="1"> Grade 6                 
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade7" name="grade7" value="1"> Grade 7                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade8" name="grade8" value="1"> Grade 8                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade9" name="grade9" value="1"> Grade 9                  
                      </label>
                      <label style="margin-left: 10px;" class="checkbox">
                          <input type="checkbox" checked="true" id="grade10" name="grade10" value="1"> Grade 10                  
                      </label>
                  </div>
              </div>
              <div class="span11">
                  <h4>Charge Rate</h4>
                  <table class="table table-bordered">
                      <tr>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="normal" name="normal" value="1"> Normal</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="early" name="early" value="1"> Early</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="afternoon" name="afternoon" value="1"> Afternoon</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="night" name="night" value="1"> Night</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="50_shift" name="50_shift" value="1"> 50% Shift</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="t_14" name="t_14" value="1"> T1/4</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="t_12" name="t_12" value="1"> T1/2</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="double" name="double" value="1"> Double</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="dt_12" name="dt_12" value="1"> DT1/2</th>
                          <th><input type="checkbox" class="tblCheckbox" checked="true" id="triple" name="triple" value="1"> Triple</th>
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
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_normal_time" name="p_normal_time"> Normal Time</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_t_14" name="p_t_14"> T1/4</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_time_and_half" name="p_time_and_half"> Time and Half</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_double_time" name="p_double_time"> Double Time</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_double_and_half" name="p_double_and_half"> Double and a Half</th>
                          <th colspan="2"><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_triple" name="p_triple"> Triple Time</th>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_day" name="p_day"> Day Shift</td>
                          <td>$ 0.04</td><td>$ 7.14</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_early" name="p_early"> Early Shift</td>
                          <td>$ 0.05</td><td>$ 7.16</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_afternoon" name="p_afternoon"> Afternoon Shift</td>
                          <td>$ 0.08</td><td>$ 7.19</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_night" name="p_night"> Night Shift</td>
                          <td>$ 0.04</td><td>$ 7.14</td>
                          <td>$ 0.09</td><td>$ 7.19</td>
                          <td>$ 0.12</td><td>$ 7.23</td>
                          <td>$ 0.15</td><td>$ 7.26</td>
                          <td>$ 0.18</td><td>$ 7.29</td>
                          <td>$ 0.08</td><td>$ 7.18</td>
                      </tr>
                      <tr>
                          <td><input type="checkbox" class="tblCheckbox" checked="true" value="1" id="p_half" name="p_half"> 50% Shift</td>
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
        <!-- END TAB 5-->    
        </form>
    </div>
    <!-- END CLIENT AGREEMENT FORM -->
</div>

<div class="row" id="agreementRow">
    
    <!-- Clients list navigation -->
    <?php echo $side_nav ?>
    
    <div class="span9">
        <h4><?php echo $client_info["client_no"]." - ".$client_info["company_name"] ?></h4>
        <hr>
    </div>
    <input type="hidden" id="hid_client_no" value="<?php echo $client_info["client_no"] ?>" />
    
    <div class="span9">
        <ul id="myTab" class="nav nav-tabs">
          <li><a href="<?php echo base_url("sales/home/view/".$client_info["client_no"]) ?>">Contacts</a></li>
          <li><a href="<?php echo base_url("sales/home/awards/".$client_info["client_no"]) ?>">Modern Awards</a></li>
          <li class="active"><a href="">Client Agreements</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="con">
                <button type="button" id="add-new-modern" class="btn"><i class="icon-plus"></i> Add new client agreement</button>
                <div class="input-append pull-right">
                    <input id="searchAgreementInput" type="text" style="width: 250px;" placeholder="Search by Agreement Name">
                    <button class="btn" id="searchAgreementBtn" type="button"><i class="icon-search"></i></button>
                    <div class="loading"></div>
                </div>
                <?php if($ok):?>
                <div class="alert alert-success" style="margin-top: 10px">
                    <?php echo $success_msg ?>
                </div>
                <?php endif;?>
                <table class="table table-bordered table-condensed table-hover" id="tblAgreement" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Trans No.</th>
                            <th>Agreement Name</th>
                            <th>Client</th>
                            <th>Date of Quotation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($agreements)) : ?>
                        <?php foreach ($agreements as $agreement) : ?>
                        <tr>
                            <td><?php echo $agreement["trans_no"] ?></td>
                            <td><?php echo $agreement["transaction_name"] ?></td>
                            <td><?php echo $agreement["company_name"] ?></td>
                            <td><?php echo $agreement["date_of_quotation"] ?></td>
                            <td>
                                <!-- <a target="_blank" href="<?php echo base_url("client_agreement/upcoming_rate_increase/".$agreement["trans_no"]) ?>" class="btn">Upcoming Rate Increase</a>
                                <a target="_blank" href="<?php echo base_url("client_agreement/rate_increase_history/".$agreement["trans_no"]) ?>" class="btn">Rate Increase History</a> -->
                                <button type="button" class="btn btn-mini edit-award-btn" edit-id="<?php echo $agreement["trans_no"] ?>"><i class="icon-edit"></i></button>
                                <button type="button" class="btn btn-mini btn-danger delete-award-btn" del-id="<?php echo $agreement["trans_no"] ?>"><i class="icon-trash icon-white"></i></button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                        <?php else : ?>
                        <tr>
                            <td colspan="5">Empty Record</td>
                        </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>

<?php echo $footer ?>