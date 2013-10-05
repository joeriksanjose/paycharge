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
                <li>
                    <a href="<?php echo base_url("client/pcs/rates/".$company_no)?>">
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
                <li class="active">
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
                
                <div class="tab-pane fade in active" id="client">
                    <h4>Application for Credit Account</h4>
                    
                    <div id="div1">
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Name of Organisation</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">ABN Number</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-inline">
                            <label class="radio inline">Sole Trader<input type="radio" /></label>
                            <label class="radio inline">Partnership<input type="radio" /></label>
                            <label class="radio inline">Proprietary Company<input type="radio" /></label>
                            <label class="radio inline">Trust<input type="radio" /></label>
                            <label class="radio inline">Others<input type="radio"/></label>
                            <input type="text inline" class="span2" placeholder="Please spercify..."/>
                        </div>
                        
                        <div class="form-horizontal" style="margin-top: 10px">
                            <div class="control-group">
                                <label class="control-label">Full Company Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Full Trading Name</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Postal Address</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Service Delivery Address</label>
                                <div class="controls">
                                    <input type="text" class="input-xlarge"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Telephone</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Fax</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Mobile</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Registered Office</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">E-mail</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn btn-primary" value="Next" id="btn-next1"/>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- END OF DIV1 -->
                     
                    <div id="div2" style="display: none">
                        <h6>Account Payable Details</h6>
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><b>1.</b> Full Name</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Email Address</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Direct Phone Number</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>2.</b> Full Name</label>
                                <div class="controls">
                                    <input type="text"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Email Address</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Direct Phone Number</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn" id="btn-back2" value="Back"/>
                                    <input type="button" class="btn btn-primary" id="btn-next2" value="Next"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF DIV2 -->
                
                
                    
                    <div id="div3" style="display: none">
                        <h6>Banking Details</h6>
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label">Bank Name</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">BSB</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Branch</label>
                                <div class="controls">
                                    <input type="text"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Account Number</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Account Name</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn" id="btn-back3" value="Back"/>
                                    <input type="button" class="btn btn-primary" id="btn-next3" value="Next"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF DIV3 -->
                    
                    <div id="div4" style="display: none">
                        <h6>Current Trade Referees(excluding Credit Cards, Fuel Suppliers, Landlord, Power & Phone)</h6>
                        <div class="form-horizontal">
                            <div class="control-group">
                                <label class="control-label"><b>1. </b>Company Name</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <input type="text"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>2. </b>Company Name</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <input type="text"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label"><b>3. </b>Company Name</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Address</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Contact</label>
                                <div class="controls">
                                    <input type="text" />
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Phone Number</label>
                                <div class="controls">
                                    <input type="text"/>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <div class="controls">
                                    <input type="button" class="btn" id="btn-back4" value="Back"/>
                                    <input type="button" class="btn btn-primary" id="btn-back4" value="Save"/>
                                </div>
                            </div>
                        </div>
                    </div>
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
