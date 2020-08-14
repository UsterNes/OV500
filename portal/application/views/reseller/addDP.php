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
<script src="<?php echo base_url() ?>theme/vendors/combo-box-typeahead/js/bootstrap-combobox.js"></script>
<link href="<?php echo base_url() ?>theme/vendors/combo-box-typeahead/css/bootstrap-combobox.css" rel="stylesheet" type="text/css">
<script>
    $(document).ready(function () {
        $('.combobox').combobox()
    });
</script>
<script src="<?php echo base_url() ?>theme/vendors/parsleyjs/dist/parsley.min.js"></script>
<?php
//	echo '<pre>';print_r($data);echo '</pre>';
?>

<div class="">
    <div class="clearfix"></div> 
    
   <div class="col-md-12 col-sm-12 col-xs-12 right">      
        <div class="x_title">
            <h2>Reseller User Dialplan Configuration Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php $tab_index=0; echo base_url('resellers'). '/edit/' . param_encrypt($data['account_id']) ?>"><button class="btn btn-danger" type="button" tabindex="<?php echo $tab_index++; ?>">Back to Reseller Edit Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo ucfirst($reseller_type); ?> Dialing Routes(ADD)</h2>
                <ul class="nav navbar-right panel_toolbox">
                    
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form action="" method="post" name="dialplan_form" id="dialplan_form" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="button_action" id="button_action" value="">
                    <input type="hidden" name="action" value="OkSaveData">                 
                    <input type="hidden" name="account_id" value="<?php echo $data['account_id']; ?>"/>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Account Code</label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <input type="text" name="user_name_display" id="user_name_display" value="<?php echo $data['account_id'] . ' (' . $data['name'] . ')'; ?>"  disabled="disabled"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Routes <span class="required">*</span></label>
                        <div class="col-md-7 col-sm-6 col-xs-12">
                            <select name="dialplan_id" id="dialplan_id_name" data-parsley-required="" class="combobox form-control">
                                <option value="">Select Route</option>                    
                                <?php
                                $str = '';
                                if (count($route_data) > 0) {
                                    foreach ($route_data as $route_array) {
                                        $selected = ' ';
                                        if (set_value('dialplan_id') == $route_array['dialplan_id'])
                                            $selected = '  selected="selected" ';
                                        $str .= '<option value="' . $route_array['dialplan_id'] . '" ' . $selected . '>' . $route_array['dialplan_name'] . ' (' . $route_array['dialplan_id'] . ')</option>';
                                    }
                                }
                                echo $str;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-4">
                            <!--<a href="<?php echo base_url($reseller_type . 's') . '/edit/' . param_encrypt($data['account_id']); ?>"><button class="btn btn-primary" type="button">Cancel</button></a>-->		
                            <button type="button" id="btnSave" class="btn btn-success">Save & add More</button>
                            <!--<button type="button" id="btnSaveClose" class="btn btn-info">Save & Close</button>-->

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

   <div class="col-md-12 col-sm-12 col-xs-12 right">
        <div class="ln_solid"></div>
        <div class="x_title">
            <h2>Reseller User Dialplan Configuration Management</h2>
            <ul class="nav navbar-right panel_toolbox">     
                <li><a href="<?php echo base_url('resellers'). '/edit/' . param_encrypt($data['account_id']) ?>"><button class="btn btn-danger" type="button" tabindex="<?php echo $tab_index++; ?>">Back to Reseller Edit Page</button></a> </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</div>  


<script>

    $('#btnSave, #btnSaveClose').click(function () {
        var is_ok = $("#dialplan_form").parsley().isValid();
        if (is_ok === true)
        {
            var clicked_button_id = this.id;
            if (clicked_button_id == 'btnSaveClose')
                $('#button_action').val('save_close');
            else
                $('#button_action').val('save');

            if (is_ok === true)
            {
                $("#dialplan_form").submit();
            }
        } else
        {
            $('#dialplan_form').parsley().validate();
        }
    })
</script>