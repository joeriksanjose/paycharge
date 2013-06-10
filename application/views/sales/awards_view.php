<?php echo $header ?>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_home2.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/sales/sales_award.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("public/js/transaction/sales_modern_award.js") ?>"></script>
<input type="hidden" id="base_url" value="<?php echo base_url() ?>">
<input type="hidden" id="base-url" value="<?php echo base_url() ?>">

<div class="topmargin"></div>

<div class="row">
    <!-- MODERN AWARD FORM -->
    <div class="span12" id="modern_form" style="display: none;">
        <form class="form-horizontal" id="frm" action="<?php echo base_url("sales_transaction/save")?>" method="post">
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
                            <input type="submit" class="btn btn-inverse pull-right" id="btn-save-update" value="SAVE">
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
                      <input type="text" id="trans_no" name="trans_no">
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
                      <input type="text" readonly="true" id="date_of_quotation" name="date_of_quotation" value="<?php echo date("d/m/Y", time()) ?>">
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
                                <option super-no="<?php echo $value["super_no"] ?>" value="<?php echo $value["super"]?>"><?php echo $value["super"]?></option>
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
                                <option work-cover-no="<?php echo $value["work_cover_no"] ?>" value="<?php echo $value["work_cover"]?>"><?php echo "(".$value["work_cover_code"].") - ".$value["work_cover"]?></option>
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
                                <option value="<?php echo $value["public_value"]?>"><?php echo $value["public_value"]?></option>
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
                                <option value="<?php echo $value["insurance"]?>"><?php echo $value["insurance"]?></option>
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
                                <option value="<?php echo $value["long_services"]?>"><?php echo $value["long_services"]?></option>
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
                    <div style="height: 20px;"></div>
                    <div class="span6">
                          <div class="control-group" style="width:200px;">
                            <label class="control-label" for="D_4">Standard Labour Hire/Transition/Limited Tenure</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_4" name="D_4">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_5">Which level do you want set up in FT</label>
                            <div class="controls">
                              <input type="text" class="" id="D_5" name="D_5">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no1">Position titles Level 1</label>
                            <div class="controls">
                              <select class="position_no" id="position_no1" name="position_no1">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no2">Position titles Level 2</label>
                            <div class="controls">
                              <select class="position_no" id="position_no2" name="position_no2">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no3">Position titles Level 3</label>
                            <div class="controls">
                              <select class="position_no" id="position_no3" name="position_no3">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no4">Position titles Level 4</label>
                            <div class="controls">
                              <select class="position_no" id="position_no4" name="position_no4">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no5">Position titles Level 5</label>
                            <div class="controls">
                              <select class="position_no" id="position_no5" name="position_no5">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no6">Position titles Level 6</label>
                            <div class="controls">
                              <select class="position_no" id="position_no6" name="position_no6">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no7">Position titles Level 7</label>
                            <div class="controls">
                              <select class="position_no" id="position_no7" name="position_no7">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no8">Position titles Level 8</label>
                            <div class="controls">
                              <select class="position_no" id="position_no8" name="position_no8">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no9">Position titles Level 9</label>
                            <div class="controls">
                              <select class="position_no" id="position_no9" name="position_no9">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="position_no10">Position titles Level 10</label>
                            <div class="controls">
                              <select class="position_no" id="position_no10" name="position_no10">
                                <option></option>
                                <?php foreach ($position as $value) : ?>
                                    <option value="<?php echo $value["id"]?>"><?php echo $value["position"]?></option>
                                <?php endforeach;?>
                              </select>
                              <button class="btn add_position"><i class="icon-plus"></i></button>
                            </div>
                          </div>
                      </div>
                      <div class="span5">
                          <div class="control-group">
                            <label class="control-label" for="D_15">Do you want shifts set up?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_15" name="D_15">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_16">How are you paying ordinary hours?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_16" name="D_16">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_17">Are lunch breaks deducted, what are they?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_17" name="D_17">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_18">Are there any exemptions to OT as above?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_18" name="D_18">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_19">Are there any exemptions to Saturday?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_19" name="D_19">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_20">Are there any exemptions to Sunday?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_20" name="D_20">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_21">Are there any exemptions to Public Holidays?</label>
                            <div class="controls controls-row">
                              <input type="text" class="" id="D_21" name="D_21">
                            </div>
                          </div>
                          <div class="control-group">
                            <label class="control-label" for="D_22">Other Information</label>
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
                    <div class="controls">
                        <label class="radio">
                            %<input type="radio" id="_percent" name="swi_peror_cur" value="1"/>
                        </label>
                        <label class="radio">
                            $<input type="radio" checked="true" id="_dollar" name="swi_peror_cur" value="0"/>
                        </label>
                        <label class="radio">
                            <input type="text" id="B_24" name="B_24">
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
                                <input type="text" class="input-medium txt" id="C_25" name="C_25">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_26" name="C_26">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_27" name="C_27">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_28" name="C_28">
                      </div>
                  </div>
                  <div class="span4">
                    <h2><small>Migration Fee as a%</small></h2><hr>
                    <div class="control-group">
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_25" name="D_25">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_26" name="D_26">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_27" name="D_27">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_28" name="D_28">
                                <span class="add-on">%</span>
                          </div>
                      </div>
                  </div>
              </div>
              
              <div class="span11">
                  <div class="span4 pull-left" style="margin-left: 200px;">
                    <h2><small>Perm Salary Band</small></h2><hr>
                    <div class="control-group">
                                <input type="text" class="input-medium txt" id="C_30" name="C_30">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_31" name="C_31">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_32" name="C_32">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_33" name="C_33">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_34" name="C_34">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_35" name="C_35">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_36" name="C_36">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="C_37" name="C_37">
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium disabled" style="font-size: 9px;" id="txt-permanent"
                                disabled="true"  value="Permanent Guarantee Period in Days">
                      </div>
                  </div>
                  <div class="span4">
                    <h2><small>Perm Fee as a%</small></h2><hr>
                    <div class="control-group">
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_30" name="D_30">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_31" name="D_31">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_32" name="D_32">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_33" name="D_33">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_34" name="D_34">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_35" name="D_35">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_36" name="D_36">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                          <div class="input-append">
                                <input type="text" class="input-medium txt" placeholder="0.00" id="D_37" name="D_37">
                                <span class="add-on">%</span>
                          </div>
                          <div style="height: 3px;"></div>
                                <input type="text" class="input-medium txt" id="D_38" name="D_38">
                         
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
                      <input type="text" class="input-medium disabled" style="font-size: 10px;" disabled="true" 
                      id="txt-standard" value="STANDARD RATE FOR CALS :">
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
                      <input type="text" class="input-medium" disabled="true" style="font-size: 10px;" 
                      id="txt-margin" value="MARGIN FOR M ALLOWANCE">
                      <input type="text" class="input-mini" name="m_allow_margin" id="m_allow_margin">
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
        </form>
    </div>  
    <!-- END MODERN AWARD FORM -->
</div>

<div class="row" id="awardRow">
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
          <li class="active"><a href="">Modern Awards</a></li>
          <li><a href="<?php echo base_url("sales/home/agreements/".$client_info["client_no"]) ?>">Client Agreements</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="con">
                <button type="button" id="add-new-modern" class="btn"><i class="icon-plus"></i> Add new modern award</button>
                <div class="input-append pull-right">
                    <input id="searchAwardtInput" type="text" style="width: 250px;" placeholder="Search by Award Name">
                    <button class="btn" id="searchAwardBtn" type="button"><i class="icon-search"></i></button>
                    <div class="loading"></div>
                </div>
                <?php if ($status === 0) : ?>
                <div class="alert alert-error">
                    <?php echo $status_msg ?>
                </div>
                <?php elseif ($status === 1) : ?>
                <div class="alert alert-success">
                    <?php echo $status_msg ?>
                </div>
                <?php endif ; ?>
                <table class="table table-condensed table-condensed table-hover table-bordered" style="font-size: 12px;" id="tblAwards">
                    <thead>
                        <tr>
                            <th>Trans No.</th>
                            <th>Award Name</th>
                            <th>Client</th>
                            <th>Date of Quotation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($awards)) : ?>
                        <?php foreach ($awards as $award) : ?>
                            <tr>
                                <td><?php echo $award["trans_no"] ?></td>
                                <td><?php echo $award["transaction_name"] ?></td>
                                <td><?php echo $award["company_name"] ?></td>
                                <td><?php echo date("d/m/Y", strtotime($award["date_of_quotation"])) ?></td>
                                <td>
                                    <button type="button" class="btn btn-mini edit-award-btn" edit-id="<?php echo $award["trans_no"] ?>">
                                        <i class="icon-edit"></i>
                                    </button>
                                    <a target="_blank" href="<?php echo base_url("reports/rate_confirmation/print_modern/".$award["trans_no"]."/".$award["modern_award_no"]) ?>" class="btn btn-mini">
                                        <i class="icon-print"></i>
                                    </a>
                                    <button type="button" del-id="<?php echo $award["trans_no"] ?>" class="btn btn-mini btn-danger delete-award-btn">
                                        <i class="icon-trash icon-white"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5">Empty Record.</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- DELETE MODAL -->
<div id="deleteModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p>Are you sure you want to delete this modern award?</p>
    </div>
    <div class="modal-footer">
        <button class="btn btn-danger" id="delete-award-btn-modal">Delete</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END DELETE MODAL -->

<!-- POSITION MODAL -->
<div id="positionModal" class="modal hide fade" tabindex="-1" role="dialog">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add Position</h3>
    </div>
    <div class="modal-body">
       
            <div class="alert alert-error" style="display: none" id="error_div"></div>
            <div class="alert alert-success" style="display: none" id="success_div"></div>
            
            <div class="form-horizontal">
              <div class="control-group">
                <label class="control-label" for="username">Position</label>
                <div class="controls">
                  <input type="text" id="position" name="position" class="input-medium">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="password">Description</label>
                <div class="controls">
                    <input type="text" id="description" name="description" class="input-medium">
                </div>
                  
                </div>
              
            </div>
            <hr>
       
    </div>
    <div class="modal-footer">
        <button class="btn btn-primary" id="btn-add-position">Add</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    </div>
</div>
<!-- END POSITION MODAL -->
<?php echo $footer ?>