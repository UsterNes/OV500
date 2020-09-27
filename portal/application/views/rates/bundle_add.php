<!--
// ##############################################################################
// OV500 - Open Source SIP Switch & Pre-Paid & Post-Paid VoIP Billing Solution
//
// Copyright (C) 2019-2020 Chinna Technologies   
// Seema Anand <openvoips@gmail.com>
// Anand <kanand81@gmail.com>
// http://www.openvoips.com  http://www.openvoips.org
//
//
// OV500 Version 1.0.3
// License https://www.gnu.org/licenses/agpl-3.0.html
//
//
// The Initial Developer of the Original Code is
// Anand Kumar <kanand81@gmail.com> & Seema Anand <openvoips@gmail.com>
// Portions created by the Initial Developer are Copyright (C)
// the Initial Developer. All Rights Reserved.
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program. If not, see <http://www.gnu.org/licenses/>.
// ##############################################################################
-->
<!-- Parsley -->
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>

<div class="">
    <div class="clearfix"></div>   

    <div class="col-md-12 col-sm-12 col-xs-12 right">       
        <div class="x_title">
            <h2>Bundle & Package Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('bundle') ?>"><button class="btn btn-danger" type="button" >Back to Bundle & Package Listing Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Bundle & Package</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">      
                    <form action="<?php echo base_url(); ?>bundle/addBP" method="post" name="add_form" id="add_form" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="button_action" id="button_action" value="">
                        <input type="hidden" name="action" value="OkSaveData">                  
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Bundle Name <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="bundle_package_name" id="bundle_package_name" value="<?php echo set_value('bundle_package_name'); ?>"  data-parsley-required="" data-parsley-length="[5, 30]" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <?php if (!check_logged_account_type(array('RESELLER'))) : ?>
                             
                            <div class="form-group">
                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Currency <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="bundle_package_currency_id" id="bundle_package_currency_id" class="form-control data-search-field" <?php if (get_logged_account_level() != 0) echo 'readonly'; ?>>
                                        <?php for ($i = 0; $i < count($currency_data); $i++) { ?>	
                                            <?php if (get_logged_account_level() == 0): ?>							
                                                <option value="<?php echo $currency_data[$i]['currency_id']; ?>" <?php if (set_value('bundle_package_currency_id', get_logged_account_currency()) == $currency_data[$i]['currency_id']) echo 'selected'; ?>><?php echo $currency_data[$i]['name']; ?></option>
                                            <?php elseif (get_logged_account_level() != 0 && get_logged_account_currency() == $currency_data[$i]['currency_id']): ?>
                                                <option value="<?php echo $currency_data[$i]['currency_id']; ?>" <?php if (set_value('bundle_package_currency_id', get_logged_account_currency()) == $currency_data[$i]['currency_id']) echo 'selected'; ?>><?php echo $currency_data[$i]['name']; ?></option>
                                            <?php endif; ?>

                                        <?php } ?>
                                    </select>
                                </div>
                            </div>    
                        <?php else: ?>
                            <input type="hidden" name="bundle_package_currency_id" id="bundle_package_currency_id" value="<?php echo get_logged_account_currency(); ?>" data-parsley-required="" class="form-control" />
                        <?php endif; ?>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="last-name">Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="bundle_package_description" id="bundle_package_description" class="form-control col-md-7 col-xs-12"><?php echo set_value('bundle_package_description'); ?></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Monthly Charges <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="monthly_charges" id="monthly_charges" value="<?php echo set_value('monthly_charges'); ?>"  data-parsley-required="" data-parsley-price="" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                                
                        <div class="form-group">
                            <label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Status</label>
                            <div class="col-md-9 col-sm-6 col-xs-12">
                                <div class="radio">
                                    <label><input type="radio" name="bundle_package_status" id="status1" value="1"  <?php echo set_radio('bundle_package_status', '1', TRUE); ?> /> Active</label>
                                    <label> <input type="radio" name="bundle_package_status" id="status0" value="0" <?php echo set_radio('bundle_package_status', '0'); ?> /> Inactive</label>
                                </div>                   
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                         <div class="form-group plan">
                            <label for="middle-name" class="control-label col-md-2 col-sm-3 col-xs-12">Has Bundle?</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="radio">
                                    <label><input type="radio" name="bundle_option" id="bundle_option1" value="1" <?php echo set_radio('bundle_option', '1' ); ?> /> Yes</label>
                                    <label><input type="radio" name="bundle_option" id="bundle_option2" value="0" <?php echo set_radio('bundle_option', '0', TRUE); ?> /> No</label>
                                </div>                    
                            </div>
                        </div> 
                        
                        <div class="form-group well bundle" style="padding: 5px;">	
                                <h4 style="padding-left: 7px;">Bundle 1</h4>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Type</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <div class="radio">
                                        <label><input type="radio" name="bundle1_type" value="MINUTE"  <?php echo set_radio('bundle1_type', 'MINUTE', TRUE); ?>     /> Fixed Minute</label>
                                        <label> <input type="radio" name="bundle1_type" value="COST" <?php echo set_radio('bundle1_type', 'COST'); ?> /> Fixed Cost</label>
                                    </div> 
                                </div><div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Value</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <input type="text" name="bundle1_value" id="bundle1_value" value="<?php echo set_value('bundle1_value'); ?>" class="form-control col-md-7 col-xs-12 bundle_required"  data-parsley-decimal="true">
                                </div><div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Prefix</label><br />
                                    <small>comma separated value,<br /> % can be used</small>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <textarea name="bundle1_prefix" id="bundle1_prefix" class="form-control col-md-7 col-xs-12 bundle_required"><?php echo set_value('bundle1_prefix'); ?></textarea>
                                </div>

                            </div>
                        
                        
                        
                        <div class="form-group well bundle" style="padding: 5px;">	
                                <h4 style="padding-left: 7px;">Bundle 2</h4>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Type</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <div class="radio">
                                        <label><input type="radio" name="bundle2_type" value="MINUTE"  <?php echo set_radio('bundle2_type', 'MINUTE', TRUE); ?>     /> Fixed Minute</label>
                                        <label> <input type="radio" name="bundle2_type" value="COST" <?php echo set_radio('bundle2_type', 'COST'); ?> /> Fixed Cost</label>
                                    </div> 
                                </div><div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Value</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <input type="text" name="bundle2_value" id="bundle2_value" value="<?php echo set_value('bundle2_value'); ?>" class="form-control col-md-7 col-xs-12"  data-parsley-decimal="true">
                                </div><div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Prefix</label><br />
                                    <small>comma separated value,<br /> % can be used</small>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <textarea name="bundle2_prefix" id="bundle2_prefix" class="form-control col-md-7 col-xs-12"><?php echo set_value('bundle2_prefix'); ?></textarea>
                                </div>

                            </div>
                        
                        
                        
                        <div class="form-group well bundle" style="padding: 5px;">	
                                <h4 style="padding-left: 7px;">Bundle 3</h4>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Type</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <div class="radio">
                                        <label><input type="radio" name="bundle3_type" value="MINUTE"  <?php echo set_radio('bundle3_type', 'MINUTE', TRUE); ?>     /> Fixed Minute</label>
                                        <label> <input type="radio" name="bundle3_type" value="COST" <?php echo set_radio('bundle3_type', 'COST'); ?> /> Fixed Cost</label>
                                    </div> 
                                </div><div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Value</label>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <input type="text" name="bundle3_value" id="bundle3_value" value="<?php echo set_value('bundle3_value'); ?>" class="form-control col-md-7 col-xs-12"  data-parsley-decimal="true">
                                </div><div class="clearfix"></div>
                                <div class="col-md-2 col-sm-3 col-xs-12" style="padding-bottom: 12px;">
                                    <label for="heard">Prefix</label><br />
                                    <small>comma separated value,<br /> % can be used</small>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12" style="padding-bottom: 12px;">
                                    <textarea name="bundle3_prefix" id="bundle3_prefix" class="form-control col-md-7 col-xs-12"><?php echo set_value('bundle3_prefix'); ?></textarea>
                                </div>

                            </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">			
                                <button type="button" id="btnSave" class="btn btn-success">Save</button>
                                <button type="button" id="btnSaveClose" class="btn btn-info">Save & Go Back to Listing Page</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="ln_solid"></div>
        <div class="x_title">
            <h2>Bundle & Package Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('bundle') ?>"><button class="btn btn-danger" type="button" >Back to Bundle & Package Listing Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
</div>    
<script>
	window.Parsley
	  .addValidator('decimal', {
		validateString: function(value) {
		  return true == (/^\d+(?:[.]\d+)*$/.test(value));
		},
		messages: {
		  en: 'This value should be in decimal format'
		}
	}); 

    $('#btnSave, #btnSaveClose').click(function () {
        var is_ok = $("#add_form").parsley().isValid();
        if (is_ok === true)
        {
            var clicked_button_id = this.id;
            if (clicked_button_id == 'btnSaveClose')
                $('#button_action').val('save_close');
            else
                $('#button_action').val('save');

            $("#add_form").submit();
        } else
        {
            $('#add_form').parsley().validate();
        }
    })
	
	function bundle_package_status_changed()
	{
		var bundle_package_status = $("input[name='bundle_option']:checked"). val();
		//console.log(bundle_package_status);
		
		if(bundle_package_status==0)
		{
			$(".bundle").addClass('hide');
			
			$('.bundle_required').attr('data-parsley-required', 'false');
		}
		else
		{
			$(".bundle").removeClass('hide');		
			$('.bundle_required').attr('data-parsley-required', 'true');
		}
		//$('#tax1').attr('data-parsley-required', 'false');
	
	}
	
	$('#bundle_option1, #bundle_option2').change(function () {
       bundle_package_status_changed();
    })
	
	$(document).ready()
	{
		bundle_package_status_changed();
	}
	
	
	
	
</script>