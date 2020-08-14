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
// OV500 Version 1.0.1
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
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>

<div class="">
    <div class="clearfix"></div>   

    <div class="col-md-12 col-sm-12 col-xs-12 right">        
        <div class="x_title">
            <h2>Currency Exchange Rate Config</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('currency/ExcRate') ?>"><button class="btn btn-danger" type="button" >Back to Currency Exchange Rate Listing Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ADD Currency Exchange Rate</h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />         
                    <form action="<?php echo base_url('currency/ExcRate'); ?>" method="post" name="add_form" id="add_form" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="button_action" id="button_action" value="">
                        <input type="hidden" name="action" value="OkSaveData">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-4 col-xs-12">Currency</label>
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                <select name="currency" id="currency" class="form-control data-search-field combobox">
                                    <option value="">Select Currency</option>
                                    <?php
                                    for ($i = 0; $i < $currency_dropdown['total']; $i++) {
                                        ?>
                                        <option value="<?php echo $currency_dropdown['result'][$i]['currency_id']; ?>" <?php if ($_SESSION['search_currency_data']['s_currency_id'] == $currency_dropdown['result'][$i]['currency_id']) echo 'selected'; ?>><?php echo $currency_dropdown['result'][$i]['detail_name'] . ' (' . $currency_dropdown['result'][$i]['name'] . '  ' . $currency_dropdown['result'][$i]['symbol'] . ')'; ?></option>
                                    <?php } ?>                         
                                </select>

                            </div>    
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-4 col-xs-12" for="first-name">Exchange Rate<span class="required">*</span></label>
                            <div class="col-md-4 col-sm-9 col-xs-12">
                                <input type="text" name="exc_rate" id="frm_name" value="<?php echo set_value('exc_rate'); ?>"  data-parsley-required="" data-parsley-length="[1, 10]" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <!--<a href="<?php echo base_url('tariffs') ?>"><button class="btn btn-primary" type="button">Cancel</button></a>-->				
                                <button type="button" id="btnSave" class="btn btn-success">Save</button>
                                <!--<button type="button" id="btnSaveClose" class="btn btn-info">Save & Close</button>-->
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
            <h2>Currency Exchange Rate Config</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('currency/ExcRate') ?>"><button class="btn btn-danger" type="button" >Back to Currency Exchange Rate Listing Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
</div>    
<script>
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
</script>