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
                        <li><a target="_blank" href="<?php echo base_url("client/pcs/forecasting/".$company["client_no"]."")?>">Forecasting</a></li>
                    </ul>
                </li>
            </ul>
        <?php endforeach ?>
        </ul>
    </div>
    
    <div class="span9">
        
        <?php if($ok): ?>
        <div class="tabbable">
            <div>
                <form method='post' action='<?php echo base_url("client/pcs/saveClientApplication")?>'>
                <div class="tab-pane fade in active" id="client">
                    <input type="hidden" name="client_no" value="<?php echo $company_no ?>">
                    <h4>Application for Credit Account</h4>
                    
                    <div id="div1">
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Name of Organisation</label>
                                <div class="controls">
                                    <input type="text" name='org_name'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">ABN Number</label>
                                <div class="controls">
                                    <input type="text"  name='abn_number'/>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-inline">
                            <label class="radio inline">Sole Trader<input type="radio"  name='business_type' value="Sole Trader"/></label>
                            <label class="radio inline">Partnership<input type="radio"  name='business_type' value="Partnership"/></label>
                            <label class="radio inline">Proprietary Company<input type="radio" value="Proprietary Company" name='business_type'/></label>
                            <label class="radio inline">Trust<input type="radio"  name='business_type' value="Trust"/></label>
                            <label class="radio inline">Others<input type="radio"  name='business_type'/></label>
                            <input type="text inline" class="span2"  name='txt_others' disabled="disabled" placeholder="Please spercify..."/>
                        </div>
                        
                        <div class="form-horizontal" style="margin-top: 10px">
                            <div class="control-group">
                                <label class="control-label">Full Company Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"  name='full_company_name'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Full Trading Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"  name='full_trading_name'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Postal Address</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"  name='postal_address'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Service Delivery Address</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"  name='service_delivery_address'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Telephone</label>
                                <div class="controls">
                                    <input type="text"  name='telephone'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Fax</label>
                                <div class="controls">
                                    <input type="text"  name='fax'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Mobile</label>
                                <div class="controls">
                                    <input type="text"  name='mobile'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Registered Office</label>
                                <div class="controls">
                                    <input type="text"  name='registered_office'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">E-mail</label>
                                <div class="controls">
                                    <input type="text"  name='email'/>
                                </div>
                            </div>
                            
                            <!-- <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn btn-primary" value="Next" id="btn-next1"/>
                                </div>
                            </div> -->
                        </div>
                    </div>
                     <!-- END OF DIV1 -->
                     
                    <div id="div2">
                        <h6>Account Payable Details</h6>
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><b>1.</b> Full Name</label>
                                <div class="controls">
                                    <input type="text"  name='apd_full_name'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Email Address</label>
                                <div class="controls">
                                    <input type="text"  name='apd_email'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Direct Phone Number</label>
                                <div class="controls">
                                    <input type="text"  name='apd_direct_phone_number'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>2.</b> Full Name</label>
                                <div class="controls">
                                    <input type="text"  name='apd_full_name2'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Email Address</label>
                                <div class="controls">
                                    <input type="text"  name='apd_email2'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Direct Phone Number</label>
                                <div class="controls">
                                    <input type="text"  name='apd_direct_phone_number2'/>
                                </div>
                            </div>
                            
                            <!-- <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn" id="btn-back2" value="Back"/>
                                    <input type="button" class="btn btn-primary" id="btn-next2" value="Next"/>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- END OF DIV2 -->
                
                
                    
                    <div id="div3" >
                        <h6>Banking Details</h6>
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Bank Name</label>
                                <div class="controls">
                                    <input type="text"  name='bd_bank_name'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text"  name='bd_address'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">BSB</label>
                                <div class="controls">
                                    <input type="text"  name='bd_bsb'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Branch</label>
                                <div class="controls">
                                    <input type="text"  name='bd_branch'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Account Number</label>
                                <div class="controls">
                                    <input type="text"  name='bd_account_number'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Account Name</label>
                                <div class="controls">
                                    <input type="text"  name='bd_account_name'/>
                                </div>
                            </div>
                            
                            <!-- <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn" id="btn-back3" value="Back"/>
                                    <input type="button" class="btn btn-primary" id="btn-next3" value="Next"/>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <!-- END OF DIV3 -->
                    
                    <div id="div4">
                        <h6>Current Trade Referees(excluding Credit Cards, Fuel Suppliers, Landlord, Power & Phone)</h6>
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><b>1. </b>Company Name</label>
                                <div class="controls">
                                    <input type="text"  name='ctr_company_name'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text"  name='ctr_address'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text"  name='ctr_contact'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <input type="text"  name='ctr_phone_number'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>2. </b>Company Name</label>
                                <div class="controls">
                                    <input type="text" name='ctr_company_name2'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text" name='ctr_address2'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" name='ctr_contact2'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <input type="text" name='ctr_phone_number2'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>3. </b>Company Name</label>
                                <div class="controls">
                                    <input type="text" name='ctr_company_name3'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text" name='ctr_address3'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" name='ctr_contact3'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <input type="text" name='ctr_phone_number3'/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                    <!-- <input type="button" class="btn" id="btn-back4" value="Back"/> -->
                                    <input type="submit" class="btn btn-primary" id="btn-back4" value="Save"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <!-- END OF DIV4 -->
                    
                </div>
                <!-- END OF CLIENT -->
            </div>
        </div>  
    </div>
    <?php endif; ?>

</div>
<?php echo $footer ?>
<script>

    $("#btn-next1, #btn-back3").click(function(){
        $(document).scrollTop(0);
        $("#div2").css("display", "");
        $("#div1").css("display", "none");
        $("#div3").css("display", "none");
    });
    
    $("#btn-back2").click(function(){
        $(document).scrollTop(0);
        $("#div1").css("display", "")
        $("#div2").css("display", "none")
    });

    $("#btn-next2, #btn-back4").click(function(){
        $(document).scrollTop(0);
        $("#div3").css("display", "");
        $("#div1").css("display", "none");
        $("#div2").css("display", "none");
        $("#div4").css("display", "none");
    });
    
    $("#btn-next3").click(function(){
        $(document).scrollTop(0);
        $("#div4").css("display", "");
        $("#div3").css("display", "none");
        $("#div2").css("display", "none");
    });
    
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
